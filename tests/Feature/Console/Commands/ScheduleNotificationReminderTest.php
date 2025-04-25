<?php

declare(strict_types=1);

namespace Tests\Feature\Console\Commands;

use App\Mail\InternalCRMEmail;
use App\Models\Customer;
use App\Models\Lead;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ScheduleNotificationReminderTest extends TestCase
{
    /** @test */
    public function it_can_send_notifications(): void
    {
        Mail::fake();

        $timezone = 'Europe/Madrid';
        $today = Carbon::today($timezone)->toDateString();

        $lead = Lead::factory()->create(['schedule_contact' => $today]);
        $customer = Customer::factory()->create(['schedule_contact' => $today]);

        $this->artisan('crm:notification-reminder:send')
            ->expectsOutputToContain('Remember contact')
            ->assertSuccessful();

        Mail::assertSent(InternalCRMEmail::class, 2);

        Mail::assertSent(InternalCRMEmail::class, function (InternalCRMEmail $mail) use ($lead) {
            return $mail->hasTo($lead->seller->email) &&
                $mail->hasSubject('Remember contact to: '.$lead->name);
        });

        Mail::assertSent(InternalCRMEmail::class, function (InternalCRMEmail $mail) use ($customer) {
            return $mail->hasTo($customer->seller->email) &&
                $mail->hasSubject('Remember contact to: '.$customer->name);
        });
    }

    /** @test */
    public function it_can_store_notifications(): void
    {
        $timezone = 'Europe/Madrid';
        $today = Carbon::today($timezone)->toDateString();

        $lead = Lead::factory()->create(['schedule_contact' => $today, 'seller_id' => auth()->id()]);
        $customer = Customer::factory()->create(['schedule_contact' => $today, 'seller_id' => auth()->id()]);

        $this->artisan('crm:notification-reminder:send')
            ->expectsOutputToContain('Remember contact')
            ->assertSuccessful();

        $this->assertDatabaseHas('notification', [
            'company_id' => $lead->company_id,
            'user_id' => $lead->seller_id,
            'message' => 'Remember contact to: '.$lead->name,
            'link' => url('/lead/update/'.$lead->id),
            'read' => 0,
        ]);

        $this->assertDatabaseHas('notification', [
            'company_id' => $customer->company_id,
            'user_id' => $customer->seller_id,
            'message' => 'Remember contact to: '.$customer->name,
            'link' => url('/customer/update/'.$customer->id),
            'read' => 0,
        ]);
    }
}
