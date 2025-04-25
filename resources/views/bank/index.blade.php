@extends('layouts.app')

@section('content')
    @include('layouts.partials._header', ['title' =>  __('Banks')])
<div class="mb-2">
    <a href="{{ url('bank/create') }}" class="btn btn-primary">{{ __('New') }}</a>
</div>

<div class="card">
    <div class="card-body">
    <form method="post" class="form-inline">
        @csrf
        <div class="row">
            <div class="col">
                @include('components.country')
                <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
            </div>
        </div>
    </form>
    </div>
</div>

<div class="card mt-2">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered table-stiped">
        <thead>
        <tr>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Country') }}</th>
            <th>{{ __('Phone') }}</th>
            <th>Email</th>
            <th>Website</th>
            <th>BIC/SWIFT</th>
            <th>{{ __('Updated at') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($banks as $bank)
        <tr>
            <td>
                <a href="/bank/update/{{ $bank->uuid }}">{{ $bank->name }}</a>
            </td>
            <td class="text-center">
                @if(!empty($bank->country))
                    {{ $bank->country->flag }}
                @endif
            </td>
            <td>
                @isset($bank->phone)
                <a href="tel:{{ $bank->phone }}" target="_blank">{{ $bank->phone }}</a>
                @endisset
            </td>
            <td>
                @isset($bank->email)
                <a href="mailto:{{ $bank->email }}" title="{{ $bank->email }}">{{ $bank->email }}</a>
                @endisset
            </td>
            <td>
                @isset($bank->website)
                    <a href="{{ $bank->website }}" rel="noopener" target="_blank">{{ $bank->website }}</a>
                @endisset
            </td>
            <td>{{ $bank->bic }}</td>
            <td>
                {{ $bank->updated_at }}
            </td>
            <td>
                <a href="{{ url('bank/update'.$bank->uuid) }}" class="btn btn-warning btn-sm">
                    <i class="las la-pen text-white"></i>
                </a>
                <a href="{{ url('bank/delete'.$bank->uuid) }}" class="btn btn-danger btn-sm">
                    <i class="las la-trash-alt"></i>
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        </div>

        <div>
            {{ $banks->appends(request()->query())->links() }}
        </div>
    </div><!--./card-body-->
</div>
@endsection
