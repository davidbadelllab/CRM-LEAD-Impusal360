@extends('layouts.app')

@section('content')
    @include('layouts.partials._header', ['title' =>  __('Bank')])

    <div class="card">
        <div class="card-body">
            <form action="{{ url('bank/save') }}" method="post">
            @csrf
            <input type="hidden" name="uuid" value="{{ (!empty($bank->uuid)) ? $bank->uuid : '' }}">
            <div class="row">
                <div class="col">
                    <label for="name">
                        {{ __('Name') }}
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ $bank->name }}" required="required" class="form-control">
                </div>
                <div class="col">
                    <label for="phone">{{ __('Phone') }}</label>
                    <input type="text" name="phone" id="phone" value="{{ $bank->phone }}" maxlength="15" class="form-control">
                </div>
                <div class="col">
                    <label for="bic">
                        {{ __('BIC') }}
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="bic" id="bic" value="{{ $bank->bic }}" maxlength="11" required="required"
                           class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $bank->email }}" class="form-control">
                </div>
                <div class="col">
                    <label for="website">{{ __('Website') }}</label>
                    <input type="url" name="website" id="website" value="{{ $bank->website }}" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @include('components.country', ['country_id' => $bank->country_id])
                </div>
            </div>
            <div class="row">
                <div class="col mt-2">
                    <a href="{{ url('/bank') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
