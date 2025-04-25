<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\MainController;
use App\Models\Customer;
use App\Models\Industry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Squire\Models\Country;

class CustomerIndexController extends MainController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $term = $request->term;

            $customers = Customer::where('company_id', (int) Auth::user()->company_id)
                ->where('name', 'LIKE', "%$term%")
                ->get(['id', 'name as label']);

            return response()->json($customers);
        }

        $filters = [];
        $order_by = null;
        $search = $request->search;
        $user = new User();
        $industry = new Industry();

        if ($request->country_id) {
            $filters['country_id'] = $request->country_id;
            $data['country_id'] = $request->country_id;
        }

        if ($request->seller_id) {
            $filters['seller_id'] = $request->seller_id;
            $data['seller_id'] = $request->seller_id;
        }

        if ($request->status) {
            $filters['status'] = $request->status;
        }

        if ($request->industry_id) {
            $filters['industry_id'] = $request->industry_id;
        }

        if (Auth::user()->hasRole('Seller')) {
            $filters['seller_id'] = Auth::user()->id;
        }

        if ($request->filled('phone')) {
            $filters['phone'] = $request->phone;
        }

        if ($request->filled('province')) {
            $filters['province'] = $request->province;
        }

        if ($request->filled('external_id')) {
            $filters['external_id'] = $request->external_id;
        }

        if ($request->filled('vat')) {
            $filters['vat'] = $request->vat;
        }

        if ($request->filled('order_by')) {
            $order_by = $request->order_by;
        }

        $customer = new Customer();
        $data['colors'] = config('color');
        $data['bootstrap_colors'] = ['text-bg-primary', 'text-bg-secondary', 'text-bg-success', 'text-bg-danger', 'text-bg-warning', 'text-bg-info'];
        $data['countries'] = Country::orderBy('name')->get();
        $data['customer_count'] = Customer::where('company_id', (int) Auth::user()->company_id)->count();
        $data['customers'] = $customer->getAllByCompanyId((int) Auth::user()->company_id, $search, $filters, $order_by);
        $data['search'] = $search;
        $data['sellers'] = $user->getAllActiveByCompany((int) Auth::user()->company_id);
        $data['statuses'] = $customer->getStatus();
        // Temporary fix get this from configuration
        $data['industries'] = ((int) Auth::user()->company_id == 3) ? $industry->getAllByCompany((int) Auth::user()->company_id) : $industry->getAll();

        return view('customer.index', $data);
    }
}
