<div class="card mb-4">
    <div class="card-header">
        <h3 class="card-title">@lang('site.message_details')</h3>
    </div>
    <div class="card-body">
        <table class="table table-md">
            <tbody>
                <tr>
                    <th>@lang('site.name')</th>
                    <td>{{ $contact->name }}</td>
                </tr>
                <tr>
                    <th>@lang('site.email')</th>
                    <td>{{ $contact->email }}</td>
                </tr>
                <tr>
                    <th>@lang('site.phone')</th>
                    <td>{{ $contact->phone }}</td>
                </tr>
                <tr>
                    <th>@lang('site.title')</th>
                    <td>{{ $contact->title }}</td>
                </tr>
                <tr>
                    <th>@lang('site.body')</th>
                    <td>{{ $contact->content }}</td>
                </tr>
                <tr>
                    <th>@lang('site.type')</th>
                    <td>{{ $contact->type_label }}</td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
