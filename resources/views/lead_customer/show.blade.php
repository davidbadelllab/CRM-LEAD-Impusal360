@php
if(empty($customer)) $customer = null;
$item = $lead ?? $customer;
$url = isset($lead) ? 'lead' : 'customer';
@endphp

@extends('layouts.app')

@section('content')
@include('layouts.partials._header', ['title' => $item->name])

<div class="card mb-2">
    <div class="card-body">
        <div class="row mb-1">
            <div class="col-md-2">
                <div>{{ __('Name') }}:</div>
                <strong>{{ $item->name }}</strong>
            </div>
            <div class="col-md-2">
                <div>{{ __('Business name') }}:</div>
                <strong>{{ $item->business_name }}</strong>
            </div>
            <div class="col-md-2">
                <div>{{ __('Seller') }}:</div>
                @isset($item->seller)
                    <strong>{{ $item->seller->first_name }}</strong>
                @endisset
            </div>
            <div class="col-md-2">
                <div>{{ __('Status') }}:</div>
                <span class="badge {{ App\Helpers\LeadStatus::renderBadge($item->status) }}">{{ __(ucfirst($item->status)) }}</span>
            </div>
            <div class="col-md-1">
                <a class="btn btn-warning" href="{{ url("/$url/update/$item->id") }}">
                    <i class="las la-pen"></i> {{ __('Edit') }}
                </a>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-md-2">
                <div>{{ __('Phone') }}:</div>
                @isset($item->phone)
                    <strong>
                        <a href="tel:{{ $item->phone }}">{{ \App\Helpers\PhoneHelper::format($item->phone) }}</a>
                    </strong>
                @endisset
            </div>
            <div class="col-md-2">
                <div>{{ __('Mobile') }}:</div>
                @isset($item->mobile)
                <strong>
                    <a href="https://api.whatsapp.com/send/?phone={{ $item->mobile }}">{{ $item->mobile }}</a>
                </strong>
                @endisset
            </div>
            <div class="col-md-2">
                <div>{{ __('E-mail') }}:</div>
                @isset($item->email)
                    <strong>
                        <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                    </strong>
                @endisset
            </div>
            <div class="col-md-2">
                <div>{{ __('Identity number') }}:</div>
                <strong>{{ $item->vat }}</strong>
            </div>
            <div class="col-md-3">
                <div>{{ __('Website') }}:</div>
                @isset($item->website)
                <strong>
                    <a href="{{ $item->website }}" rel="noopener" target="_blank">{{ $item->website }}</a>
                </strong>
                @endisset
            </div>
        </div><!--./row-->
        <div class="row mb-1">
            <div class="col-md-2">
                <div>{{ __('Country') }}:</div>
                <strong>{{ ($item->country) ? $item->country->name : '' }}</strong>
            </div>
            <div class="col-md-2">
                <div>{{ __('Province') }}:</div>
                <strong>{{ $item->province }}</strong>
            </div>
            <div class="col-md-2">
                <div>{{ __('City') }}:</div>
                <strong>{{ $item->city }}</strong>
            </div>
            <div class="col-md-2">
                <div>{{ __('Street') }}:</div>
                <strong>{{ $item->street }}</strong>
            </div>
            <div class="col-md-2">
                <div>{{ __('Zipcode') }}:</div>
                <strong>{{ $item->zipcode }}</strong>
            </div>
        </div><!--./row-->
        <div class="row mb-1">
            <div class="col-12">
                <div>{{ __('Social networks') }}:</div>
                @if($item->facebook)
                    <a href="{{ $item->facebook }}" rel="noopener" target="_blank" class="text-decoration-none link-secondary">
                        <i class="lab la-facebook-square fs-3"></i>
                    </a>
                @endif

                @if($item->instagram)
                    <a href="{{ $item->instagram }}" rel="noopener" target="_blank" class="text-decoration-none link-secondary">
                        <i class="lab la-instagram fs-3"></i>
                    </a>
                @endif

                @if($item->linkedin)
                    <a href="{{ $item->linkedin }}" rel="noopener" target="_blank" class="text-decoration-none link-secondary">
                        <i class="lab la-linkedin fs-3"></i>
                    </a>
                @endif

                @if($item->youtube)
                    <a href="{{ $item->youtube }}" rel="noopener" target="_blank" class="text-decoration-none link-secondary">
                        <i class="lab la-youtube-square fs-3"></i>
                    </a>
                @endif

                @if($item->twitter)
                    <a href="{{ $item->twitter }}" rel="noopener" target="_blank" class="text-decoration-none link-secondary">
                        <i class="lab la-twitter-square fs-3"></i>
                    </a>
                @endif

                @if($item->tiktok)
                    <a href="{{ $item->tiktok }}" rel="noopener" target="_blank" class="text-decoration-none link-secondary">
                        <span class="tiktok"><i class="fa-brands fa-tiktok"></i></span>
                    </a>
                @endif

                @if($item->mobile)
                    <a href="https://api.whatsapp.com/send/?phone={{ $item->mobile }}&text={{ __('Hello') }}"
                       rel="noopener" target="_blank" class="text-decoration-none link-secondary">
                        <i class="lab la-whatsapp fs-3"></i>
                    </a>
                @endif
            </div>
        </div><!--./row-->
        @if(!empty($item->notes))
        <div class="row">
            <div>{{ __('Notes') }}:</div>
            <div class="col">{{ $item->notes }}</div>
        </div><!--./row-->
        @endif
        @if(isset($item->latitude) && isset($item->longitude))
        <div class="row">
            <div class="col mt-3">
                <x-geolocalization.map :latitude="$item->latitude" :longitude="$item->longitude" />
            </div><!--./row-->
        </div>
        @endif
    </div>
</div>

{{-- ORDERS --}}
@if($url === 'customer')
@php
    $orders = $item->orders
@endphp
<div class="card mb-2">
    <div class="card-header">{{ __('Products') }}</div>
    <div class="card-body">
        @if(isset($orders) && count($orders) > 0)
            <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('Product') }}</th>
                <th scope="col">SKU</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                @foreach($order->items as $item_detail)
                    @isset($item_detail->product)
                    <tr>
                    <td>{{ $item_detail->product->id }}</td>
                    <td>
                        @isset($item_detail->product->photo)
                        <div>
                        <img src="{{ App\Helpers\ImageHelper::render(public_path('/asset/upload/product/'.$item_detail->product->id.'/'.$item_detail->product->photo)) }}" alt="" width="100" class="img-fluid img-thumbnail">
                        </div>
                        @endif
                        {{ $item_detail->product->name }}
                    </td>
                    <td>{{ $item_detail->product->sku }}</td>
                    </tr>
                    @endisset
                @endforeach
            @endforeach
            </tbody>
            </table>
        @endif
    </div>
</div>

<div class="card mb-2">
    <div class="card-header">
        <div class="row">
            <div class="col">
                {{ __('Orders') }}
                <a class="btn btn-primary btn-sm" style="border-radius: 40px;" href="{{ url('/order/create') }}">
                    <i class="las la-plus fw-bold"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if(isset($orders) && count($orders) > 0)
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Amount') }}</th>
                    <th scope="col">{{ __('Status') }}</th>
                    <th scope="col">{{ __('Created at') }}</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->amount }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ url('/order/show/'.$order->id) }}" title="{{ __('View') }}"
                           class="btn btn-sm btn-primary text-white">
                            {{ __('View') }}
                        </a>

                        <a href="{{ url("/order/update/$order->id") }}" class="btn btn-warning btn-sm">
                            {{ __('Edit') }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endif

{{-- CONTACTS --}}
@if($item->id)
<div class="card mt-2 mb-5">
    <div class="card-header">
        <div class="row">
            <div class="col">
                {{ __('Contacts') }}

                <a class="btn btn-primary btn-sm" style="border-radius: 40px;" href="{{ url('/contact/create', [$url, $item->id]) }}">
                    <i class="las la-plus fw-bold"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="card-body bg-white">
        <div class="mt-2 table-responsive">
            @include('contact.index', ['contacts' => $item->contacts])
        </div>
    </div><!--./card-body-->
</div>
@endif

<div id="new-message" class="card mt-3 d-none">
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ url("/$url/message/save") }}">
                @csrf
                <input type="hidden" name="{{ $url }}_id" value="{{ $item->id }}">
                <div class="row">
                    <div class="col">
                        <label for="message">{{ __('Message') }}</label>
                        <textarea name="message" id="message" required class="form-control form-control-lg"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col pt-2">
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('lead_customer.partials.messages', ['messages' => $item->messages, 'url' => $url])

@if($url === 'customer')
    <div class="card mt-2 mb-2">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    {{ __('Tickets') }}
                </div>
            </div>
        </div>
        <div class="card-body bg-white">
            <div class="mt-2 table-responsive">
                @include('ticket.grid', ['tickets' => $item->tickets])
            </div>
        </div><!--./card-body-->
    </div>
@endif

@endsection
