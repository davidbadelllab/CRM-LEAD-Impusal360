@extends('layouts.app')

@section('content')
<header>
    <h1>{{ __('Ticket') }}</h1>
</header>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <form method="post" action="{{ url('/ticket/save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" value="{{ $ticket->title }}" maxlength="80" required="required" class="form-control">
                        </div>
                    </div>
                    <!--./row-->
                    <div class="row">
                        <div class="col">
                            <label for="customer_id">{{ __('Customer') }}</label>
                            <select name="customer_id" id="customer_id" class="form-select form-control-lg">
                                <option value=""></option>
                                @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" @if ($ticket->customer_id == $customer->id) selected="selected" @endif>
                                    {{ $customer->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!--./col-->
                        <div class="col">
                            <label for="assigned_to">{{ __('Assigned to') }} <span class="text-danger">*</span></label>
                            <select name="assigned_to" id="assigned_to" required="required" class="form-select form-control-lg">
                                <option value=""></option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" @if ($ticket->assigned_to == $user->id) selected="selected" @endif>
                                    {{ $user->first_name . ' ' . $user->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--./col-->
                        <div class="col">
                            <label for="order_id">{{ __('Order') }}</label>
                            <input type="number" name="order_id" id="order_id" step="1" min="1" value="{{ ($ticket->order_id) ? $ticket->order_id : null }}" class="form-control form-control-lg">
                        </div>
                    </div>
                    <!--./row-->
                    <div class="row">
                        <div class="col">
                            <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" required="required" class="form-control">
                            {{ $ticket->description }}
                            </textarea>
                        </div>
                    </div>
                    <!--./row-->
                    <div class="row">
                        <div class="col">
                            <label for="type">{{ __('Type') }} <span class="text-danger">*</span></label>
                            <select name="type" id="type" required="required" class="form-select form-control-lg">
                                <option value=""></option>
                                @foreach ($ticket->types() as $type)
                                <option value="{{ $type }}" @if (!empty($ticket->type) && $ticket->type == $type) selected="selected" @endif>
                                    {{ __(ucfirst($type)) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!--./col-->
                        <div class="col">
                            <label for="priority">{{ __('Priority') }} <span class="text-danger">*</span></label>
                            <select name="priority" id="priority" required="required" class="form-select form-control-lg">
                                <option value=""></option>
                                @foreach ($ticket->priorities() as $priority)
                                <option value="{{ $priority }}" @if (!empty($ticket->priority) && $ticket->priority == $priority)
                                    selected="selected"
                                    @endif
                                    >{{ __(ucfirst($priority)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--./col-->
                        <div class="col">
                            <label for="status">{{ __('Status') }}</label>
                            <select name="status" id="status" class="form-select form-control-lg">
                                <option value=""></option>
                                @foreach ($ticket->statuses() as $status)
                                <option value="{{ $status }}" @if (!empty($ticket->status) && $ticket->status == $status)
                                    selected="selected"
                                    @endif
                                    >{{ __(ucfirst($status)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--./col-->
                    </div>
                    <!--./row-->
                    <div class="row">
                        <div class="col">
                            <label for="attachment">{{ __('Attachments') }}</label>
                            <input type="file" name="attachment[]" id="attachment" class="form-control" multiple>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-2">
                            <a href="{{ url('/ticket') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            <button class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                    <!--./row-->
                    <input type="hidden" name="id" value="{{ $ticket->id }}">
                </form>
            </div>
            <div class="col-4">
                <div class="card h-100">
                    <div class="card-header">
                        {{ __('Attachments') }}
                    </div>
                    <div class="card-body">
                        @isset($attachments)
                        <div class="row">
                            @foreach ($attachments as $attachment)
                            <div class="col-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        {{ $attachment['name'] }}
                                    </div>
                                    <div class="card-body text-center p-1">
                                        @switch($attachment['mimeType'])

                                        @case('image/jpeg')
                                        <img class="img-fluid" src="{{ $attachment['url'] }}">
                                        @break

                                        @default
                                        <a href="{{ $attachment['url'] }}" target="_blank">
                                            <i class="las la-file-alt fs-1"></i>
                                        </a>

                                        @endswitch
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($ticket->id)
<div class="row mt-2">
    <div class="col">
        <a href="#" onclick="$('#new-message').removeClass('d-none');" class="btn btn-primary">{{ __('New message') }}</a>
    </div>
</div>

<div id="new-message" class="card mt-3 d-none">
    <div class="card">

        <div class="card-body">
            <form method="post" action="{{ url('/ticket/message/save') }}">
                @csrf
                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
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
@endif

<div class="card mt-3">
    <div class="card-header">
        {{ __('Messages') }}
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">{{ __('Author') }}</th>
                    <th scope="col">{{ __('Message') }}</th>
                    <th scope="col">{{ __('Created at') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ticket->messages as $message)
                <tr>
                    <td>{{ $message->author->first_name }}</td>
                    <td>{{ $message->body }}</td>
                    <td>{{ $message->created_at->format('d/m/Y h:m') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
