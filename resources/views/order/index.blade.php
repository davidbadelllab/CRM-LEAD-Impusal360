@extends('layouts.app')

@section('content')
@include('layouts.partials._header', ['title' =>  __('Orders')])

<div class="mb-2">
    <a href="{{ url('order/create') }}" class="btn btn-primary">{{ __('New') }}</a>
</div>

<div class="card">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-condensed">
            <thead>
            <tr>
                <th>#ID</th>
                <th>{{ __('Number') }}</th>
                <th>{{ __('Customer') }}</th>
                <th>{{ __('Item count') }}</th>
                <th>{{ __('Amount') }}</th>
                <th>{{ __('Created at') }}</th>
                <th>{{ __('Updated at') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <td>
                    <a href="{{ url('order/show/'.$order->id) }}">{{ $order->id }}</a>
                </td>
                <td>
                    {{ $order->orderNumber() }}
                </td>
                <td>{{ (!empty($order->customer)) ? $order->customer->name : '' }}</td>
                <td class="text-center">
                    {{ (!empty($order->items)) ? $order->items->count() : 0 }}
                </td>
                <td>
                    {{ $order->getAmountFormated() }}
                </td>
                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $order->updated_at->format('d/m/Y H:i') }}</td>
                <td>{{ $order->status }}</td>
                <td class="text-nowrap">
                    <a href="{{ url('order/show/'.$order->id) }}" title="{{ __('View') }}"
                       class="btn btn-xs btn-primary text-white">
                        <i class="las la-eye"></i>
                    </a>

                    @if($order->status == App\Models\Order::PENDING)
                    <a href="{{ url('/order/update/'.$order->id) }}" title="{{ __('Edit') }}"
                       class="btn btn-xs btn-warning text-white">
                        <i class="las la-pen"></i>
                    </a>

                    <a href="{{ url('/order/confirm/'.$order->id) }}" title="{{ __('Confirm') }}"
                       class="btn btn-xs btn-success text-white">
                        <i class="las la-check-circle"></i>
                    </a>
                    @endif

                    <a href="{{ url('/order/download/'.$order->id) }}" title="{{ __('Download') }}"
                       class="btn btn-xs btn-secondary">
                        <i class="las la-file-pdf"></i>
                    </a>

                    @can('delete order')
                    <a href="#" onclick="Order.delete({{ $order->id }},'{{ __('Are you sure you want to delete the order: :id?', ['id' => $order->id ]) }}')" title="{{ __('Delete') }}"
                       class="btn bt-xs btn-danger">
                        <i class="las la-trash-alt"></i>
                    </a>
                    @endcan
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>

            <div>
                {{ $orders->links() }}
            </div>
        </div>
    </div><!--./card-body-->
</div><!--./card-->
@push('scripts')
    <script src="{{ asset('/asset/js/Order.js') }}"></script>
@endpush
@endsection

