<div class="card mb-4">
    <div class="card-header">
        <h3 class="card-title">@lang('site.message_details')</h3>
    </div>
    <div class="card-body">
        <table class="table table-md">
            <tbody>

                <tr>
                    <th>@lang('site.email')</th>
                    <td>
                        {{ $notification->user->email }}
                    </td>
                </tr>
                <tr>
                    <th>@lang('site.user')</th>
                    <td>
                        {{ $notification->user->name }}
                    </td>
                </tr>
                <tr>
                    <th>@lang('site.title')</th>
                    <td>
                        {{ $notification->nameLang() }}
                    </td>
                </tr>
                <tr>
                    <th>@lang('site.body')</th>
                    <td>
                        {{ $notification->descriptionLang() }}
                    </td>
                </tr>
                <tr>
                    <th>@lang('site.created_at')</th>
                    <td>
                        {{ formatDate($notification->created_at) }}
                    </td>
                </tr>
                <tr>
                    <th>@lang('site.read_at')</th>
                    <td>
                        {{ formatDate($notification->read_at) ?? '-' }}
                    </td>
                </tr>

            </tbody>
        </table>

    </div>
    <!-- </card body> -->
</div>
