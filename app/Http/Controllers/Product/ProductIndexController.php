<?php

declare(strict_types=1);

namespace App\Http\Controllers\Product;

use App\Http\Controllers\MainController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductIndexController extends MainController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $term = $request->term;

            $products = Product::where('company_id', (int) Auth::user()->company_id)
                ->where('name', 'LIKE', "%$term%")
                ->orWhere('sku', 'LIKE', "%$term%")
                ->get(['id', 'name as label', 'price']);

            return response()->json($products);
        }

        $filters = [];
        $search = $request->search;
        $product = new Product();
        $category = new Category();
        $brand = new Brand();
        $data['search'] = $search;
        $data['product_count'] = Product::where('company_id', (int) Auth::user()->company_id)->count();
        $data['products'] = $product->getAllByCompanyId((int) Auth::user()->company_id, $search, $filters);
        $data['categories'] = $category->getAllActiveByCompany((int) Auth::user()->company_id);
        $data['brands'] = $brand->getAllActiveByCompany((int) Auth::user()->company_id);

        return view('product/index', $data);
    }
}
