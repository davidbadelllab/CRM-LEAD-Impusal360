<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Customer;
use App\Models\Lead;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth']);
        if (auth()->check() && !$request->is('login')) {
            $this->middleware(['locked']);
        }
        //$locale = 'es';//App::getLocale();
        //App::setLocale($locale);
    }

    public function index(Request $request)
    {
        $order = new Order();
        $lead = new Lead();
        $customer = new Customer();
        $data['order_count'] = $order->getPendingCount((int) Auth::user()->company_id);
        $data['leads'] = $lead->getLatestByCompany((int) Auth::user()->company_id, 4);
        $data['customers'] = $customer
            ->whereCompanyId(Auth::user()->company_id)
            ->whereStatus(Customer::IN_PROGRESS)
            ->limit(4)
            ->get();

        $date = Carbon::now();
        $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::MONDAY);
        $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SUNDAY);

        $data['events'] = Calendar::whereUserId(auth()->id())
            ->whereBetween('start_date', [$startOfCalendar, $endOfCalendar])
            ->get();
        $data['startOfCalendar'] = $startOfCalendar;
        $data['endOfCalendar'] = $endOfCalendar;

        return view('dashboard', $data);
    }
}
