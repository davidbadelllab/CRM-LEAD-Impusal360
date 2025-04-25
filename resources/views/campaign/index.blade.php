@extends('layouts.app')

@section('content')
    @include('layouts.partials._header', ['title' =>  __('Campaigns')])

    <div class="row">
        <div class="col">
            <a href="{{ url('/campaign/create') }}" class="btn btn-primary">{{ __('New') }}</a>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
            <caption></caption>
            <thead>
            <tr>
                <th>{{ __('Subject') }}</th>
                <th>{{ __('From') }}</th>
                <th>{{ __('Tags') }}</th>
                <th>{{ __('Created at') }}</th>
                <th>{{ __('Updated at') }}</th>
                <th>{{ __('Schedule at') }}</th>
                <th>{{ __('Delivered at') }}</th>
                <th>{{ __('Emails sent') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($campaigns as $campaign)
            <tr>
                <td>
                    <a href="{{ url("campaign/update/$campaign->id") }}">{{ $campaign->subject }}</a>
                </td>
                <td>{{ $campaign->from }}</td>
                <td>
                    @if($campaign->tags)
                        @foreach($campaign->tags as $tag)
                            <a href="{{ url("/lead?search=$tag") }}" class="badge {{ $bootstrap_colors[array_rand($bootstrap_colors)] }} text-decoration-none">{{ $tag }}</a>
                        @endforeach
                    @endif
                </td>
                <td>{{ $campaign->created_at }}</td>
                <td>{{ $campaign->updated_at }}</td>
                <td>{{ $campaign->schedule_send_date }} {{ $campaign->schedule_send_time }}</td>
                <td>{{ (isset($campaign->send_at)) ? $campaign->send_at : '-' }}</td>
                <td>{{ (isset($campaign->emails_count)) ? $campaign->emails_count : '-'  }}</td>
                <td>
                    {{ (isset($campaign->status)) ? __($campaign->status) : __('Draft')  }}
                </td>
                <td>
                    <a href="{{ url("/campaign/update/$campaign->id") }}" title="{{ __('Update') }}" class="btn btn-xs btn-warning text-white">
                        <i class="las la-pen"></i>
                    </a>
                    <a onclick="Campaign.delete({{ $campaign->id }}, '{{ $campaign->subject }}');" title="{{ __('Delete') }}" class="btn btn-xs btn-danger">
                        <i class="las la-trash-alt"></i>
                    </a>
                    <a onclick="Campaign.send({{ $campaign->id }}, '{{ $campaign->subject }}')" title="{{ __('Send') }}" class="btn btn-primary">
                        <i class="las la-play-circle"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    <script>
        const Campaign = {
            delete : function(id, name) {
                let res = confirm("{{ __('Are you sure you want to delete the campaign?') }}");
                if(res)
                    window.location = '{{ url('/campaign/delete') }}/'+id;
            }
        };
    </script>
@endsection
