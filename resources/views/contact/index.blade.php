<table class="table table-hover table-striped table-sm">
<thead>
<tr>
    <th>{{ __('First name') }}</th>
    <th>{{ __('Last name') }}</th>
    <th>{{ __('Job title') }}</th>
    <th class="text-center">{{ __('Phone') }}</th>
    <th class="text-center">{{ __('Mobile') }}</th>
    <th class="text-center">E-mail</th>
    <th>{{ __('Notes') }}</th>
    <th>Social</th>
    <th>{{ __('Created at') }}</th>
    <th>{{ __('Updated at') }}</th>
    <th colspan="text-nowrap">{{ __('Actions') }}</th>
</tr>
</thead>
<tbody>
@if($contacts)
    @foreach($contacts as $contact)
    <tr>
        <td>{{ $contact->first_name }}</td>
        <td>{{ $contact->last_name }}</td>
        <td>{{ $contact->job_title }}</td>
        <td class="text-center">
            @if($contact->phone)
                <a href="tel:{{ $contact->phone }}@isset($contact->extension),{{$contact->extension}}@endisset"
                   title="{{ $contact->phone }}">
                    <i class="las la-phone fs-4"></i>
                </a>
            @endif
        </td>
        <td class="text-center">
            @if($contact->mobile)
                <a href="https://api.whatsapp.com/send/?phone={{ $contact->mobile }}&text={{ __('Hello') }}"
                   title="{{ $contact->mobile }}" class="link-secondary text-decoration-none">
                    <i class="las la-mobile fs-4"></i>
                </a>
            @endif
        </td>
        <td class="text-center">
            @if($contact->email)
                <a href="mailto:{{ $contact->email }}" title="{{ $contact->email }}" class="link-secondary text-decoration-none">
                    <i class="las la-envelope fs-4"></i>
                </a>
                @if($contact->email_verified == 1)
                <i class="las la-check-circle text-success"></i>
                @elseif($contact->email_verified == 3)
                <i class="las la-times-circle text-danger"></i>
                @endif
            @endif
        </td>
        <td>{{ $contact->notes }}</td>
        <td>
            @if($contact->linkedin)
                <a href="{{ $contact->linkedin }}" rel="noopener" target="_blank"><i class="lab la-linkedin fs-3"></i></a>
            @endif

            @if($contact->twitter)
                <a href="{{ $contact->twitter }}" rel="noopener" target="_blank"><i class="lab la-twitter fs-3"></i></a>
            @endif
        </td>
        <td class="">{{ ($contact->created_at) ? $contact->created_at->format('d/m/Y H:i') : '' }}</td>
        <td>{{ ($contact->updated_at) ? $contact->updated_at->format('d/m/Y H:i') : '' }}</td>
        <td colspan="text-nowrap">
            <a href="{{ url('contact/update/'.$contact->id) }}"
               data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{ __('Update') }}"
               class="btn btn-xs btn-warning text-white">
                <i class="las la-pen"></i>
            </a>
            <a href="{{ url('/contact/export-vcard/'.$contact->id) }}" rel="noopener" target="_blank"
               data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{ __('Download').' vCard' }}"
               class="btn btn-xs btn-primary text-white">
                <i class="las la-address-card"></i>
            </a>
            <a href="#"
               onclick="Contact.delete({{ $contact->id }}, '{{ __('Do you want to delete the contact: :name', ['name' => $contact->first_name]) }}')"
               data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{ __('Delete') }}"
               class="btn btn-xs btn-danger text-white">
                <i class="las la-trash"></i>
            </a>
        </td>
    </tr>
    @endforeach
@else
    <tr>
        <td colspan="8">{{ __('No contacts') }}</td>
    </tr>
@endif
</tbody>
</table>
@push('scripts')
<script src="/asset/js/Contact.js"></script>
@endpush
