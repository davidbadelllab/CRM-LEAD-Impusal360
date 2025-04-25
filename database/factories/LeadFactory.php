<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Company;
use App\Models\Industry;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Squire\Models\Country;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_id' => Company::factory(),
            'external_id' => fake()->randomNumber(5),
            'name' => fake()->name(),
            'business_name' => fake()->name(),
            'dob' => fake()->date(),
            'vat' => fake()->bothify('??#########'),
            'phone' => fake()->numerify('6########'),
            'phone_verified' => rand(0, 1),
            'extension' => null,
            'phone2' => fake()->numerify('6########'),
            'phone2_verified' => rand(0, 1),
            'mobile' => fake()->numerify('6########'),
            'mobile_verified' => rand(0, 1),
            'email' => fake()->email(),
            'email_verified' => 0,
            'email2' => fake()->email(),
            'website' => 'https://'.fake()->domainName(),
            'source_id' => null,
            'linkedin' => 'https://'.fake()->domainName(),
            'facebook' => 'https://'.fake()->domainName(),
            'instagram' => 'https://'.fake()->domainName(),
            'twitter' => 'https://'.fake()->domainName(),
            'youtube' => 'https://'.fake()->domainName(),
            'tiktok' => 'https://'.fake()->domainName(),
            'notes' => fake()->text(),
            'seller_id' => User::factory(),
            'country_id' => Country::all()->random(),
            'province' => fake()->word(),
            'city' => fake()->city(),
            'locality' => fake()->word(),
            'street' => fake()->streetAddress(),
            'zipcode' => fake()->numerify('#####'),
            'schedule_contact' => fake()->dateTimeBetween('-2 weeks', 'now')->format('Y-m-d H:i'),
            'industry_id' => Industry::factory(),
            'latitude' => str_pad((string) fake()->randomFloat(8, 40.3, 40.5), 11, '0'),
            'longitude' => str_pad((string) fake()->randomFloat(8, -3.5, -3.9), 11, '0'),
            'opt_in' => 1,
            'tags' => [fake()->word(), fake()->word()],
            'status' => fake()->randomElement(['open', 'first_contact', 'recall', 'quote', 'quoted', 'waiting_for_answer', 'standby', 'closed']),
        ];
    }
}
