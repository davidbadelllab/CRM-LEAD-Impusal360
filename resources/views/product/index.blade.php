@extends('layouts.app')

@section('content')
@include('layouts.partials._header', ['title' =>  __('Products'), 'count' => $product_count])

<div class="mb-2">
  <a href="{{ url('/product/create') }}" class="btn btn-primary">{{ __('New') }}</a>

  <a href="{{ url('/product/import') }}" class="btn btn-success">
      {{ __('Import') }} <i class="las la-file-csv"></i>
  </a>
</div>

<div class="row mt-2">
    <div class="col">
    <form method="post" action="{{ url('/product') }}" class="form-inline mb-2">
        @csrf
        <div class="input-group">
            <input type="search" name="search" placeholder="{{ __('Search') }}" value="{{ !empty($search) ? $search : '' }}" class="form-control">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit" id="btn-search"><i class="las la-search"></i></button>
            </div>
        </div>
    </form>
    </div><!--./col-->
</div><!--./row-->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-condensed">
            <thead>
            <tr>
                <th>#ID</th>
                <th>{{ __('Photo') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Name') }}</th>
                <th>SKU</th>
                <th class="d-none d-sm-table-cell">{{ __('Brand') }}</th>
                <th class="text-center">{{ __('Quantity') }}</th>
                <th>{{ __('Price') }}</th>
                <th>{{ __('Tax') }}</th>
                <th>{{ __('Created at') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                @if($product->photo)
                  <img src="{{ asset("/asset/upload/product/$product->id/$product->photo")}}" alt="" width="100" class="img-fluid img-thumbnail">
                @endif
                </td>
                <td>{{ (!empty($product->category)) ? $product->category->name : '' }}</td>
                <td><a href="{{ url("/product/update/$product->id") }}">{{ $product->name }}</a></td>
                <td class="text-nowrap">{{ $product->sku }}</td>
                <td class="text-nowrap d-none d-sm-table-cell">{{ (!empty($product->brand)) ? $product->brand->name : '' }}</td>
                <td class="text-center">
                <span class="@if($product->quantity < $product->min_stock_quantity) text-danger @else text-success @endif">
                    {{ $product->quantity }}
                </span>
                </td>
                <td class="text-nowrap">
                    {{ number_format($product->price, 2, ',', '.') }}
                    {{ (auth()->user()->company->country) ? auth()->user()->company->country->currency?->symbol : null }}
                </td><!--Money::format(-->
                <td>{{ $product->tax }}%</td>
                <td class="text-nowrap">{{ $product->created_at->format('d/m/Y H:i') }}</td>
                <td class="text-nowrap">
                    <a href="{{ url("/product/update/$product->id") }}" class="btn bt-xs btn-warning text-white">
                        <i class="las la-pen"></i>
                    </a>

                    @can('delete product')
                    <a href="{{ url("/product/delete/$product->id") }}" class="btn bt-xs btn-danger">
                        <i class="las la-trash-alt"></i>
                    </a>
                    @endcan
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>

            <div>
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
    </div><!--./card-body-->
</div><!--./card-->
@endsection
