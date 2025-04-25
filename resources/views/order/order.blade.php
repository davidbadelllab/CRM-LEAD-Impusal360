@extends('layouts.app')

@section('content')
<header>
   <h1>{{ __('Order') }}</h1>
</header>

<div class="card">
    <div class="card-body">
    <form method="post" id="order-form" action="{{ url('/order/save') }}">
    @csrf
    <input type="hidden" name="id" value="{{ ($order->getId()) ?? $order->getId() }}">
    <div class="row">
        <div class="col">
            <label for="customer_name">{{ __('Customer') }}</label>
            <input id="customer_name" required="required" class="form-control form-control-lg">
            <input type="hidden" name="customer_id" id="customer_id" value="{{ isset($order->customer_id) ?? $order->customer_id }}">
        </div>

    </div>
    </form>
    <div class="row">
        <div class="col">
            <label for="product_name">{{ __('Product') }}</label>
            <input id="product_name" required="required" class="form-control form-control-lg">
            <input type="hidden" name="product_id" id="product_id">
        </div>
        <div class="col">
            <label for="quantity">{{ __('Quantity')}}</label>
            <input type="number" name="quantity" id="quantity" required="required" placeholder="{{ __('Quantity') }}" min="1" step="1" class="form-control form-control-lg">
        </div>
        <div class="col">
            <label for="price">{{ __('Price')}}</label>
            <input type="number" name="price" id="price" required="required" placeholder="{{ __('Price') }}" min="0" step="0.01" class="form-control form-control-lg">
        </div>
        <div class="col">
            <label for="discount">{{ __('Discount') }}</label>
            <input type="number" name="discount" id="discount" placeholder="" min="0" step="0.01" class="form-control form-control-lg">
        </div>
        <div class="col">
            <button type="button" name="btn-add-product" id="btn-add-product" onclick="Order.addItem()" class="btn btn-primary btn-lg btn-primary-outlined mt-4">
                <i class="las la-plus"></i>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col mt-2">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="60%">{{ __('Product') }}</th>
                        <th>{{ __('Price') }}</th>
                        <th>{{ __('Quantity') }}</th>
                        <th>{{ __('Discount') }}</th>
                        <th>{{ __('Subtotal') }}</th>
                    </tr>
                </thead>
                <tbody id="order-items">
                @if($order->items()->count() == 0)
                <tr id="row-no-data">
                    <td colspan="5">{{ __('No items') }}</td>
                </tr>
                @else
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ (!empty($item->product)) ? $item->product->name : '' }}</td>
                        <td>{{ $item->unit_price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->discount }}%</td>
                        <td>{{ $item->getSubtotal() }}</td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">&nbsp;</th>
                        <th class="text-right">{{ __('Taxes') }}</th>
                        <th>{{ $order->getTax() }}</th>
                    </tr>
                    <tr>
                        <th colspan="3">&nbsp;</th>
                        <th class="text-right">{{ __('Total') }}</th>
                        <th>
                            <input type="number" name="total" id="total" value="{{ $order->getTotal() }}" readonly="readonly" step="0.01" class="form-control form-control-lg" style="max-width: 200px">
                        </th>
                    </tr>
                </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div>
        <a href="{{ url('/order')}}" class="btn btn-lg btn-outline-secondary">{{ __('Cancel') }}</a>
        <button type="submit" form="order-form" class="btn btn-lg btn-primary">{{ __('Save') }}</button>
    </div>
    </div>
</div><!--./card-->

<template id="product-row">
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
</template>

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-ui-dist@1.13.2/jquery-ui.min.css" integrity="sha256-Els0hoF6/l1WxcZEDh4lQsp7EqyeeYXMHCWyv6SdmX0=" crossorigin="anonymous">
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery-ui-dist@1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    <script>
        $('#customer_name').autocomplete({
            source: "{{ url('customer') }}",
            minLength: 2,
            select: function( event, ui ) {
                document.getElementById('customer_id').value = ui.item.id;
            },
            search: function(){
                document.getElementById('customer_id').removeAttribute('value');
            }
        });

        $('#product_name').autocomplete({
            source: "{{ url('product') }}",
            minLength: 2,
            select: function( event, ui ) {
                document.getElementById('product_id').value = ui.item.id;
                document.getElementById('price').value = ui.item.price;
            },
            search: function(){
                document.getElementById('product_id').removeAttribute('value');
                document.getElementById('price').value = '';
            }
        });
    </script>
    <script src="{{ asset('/asset/js/Order.js') }}"></script>
@endpush

@endsection
