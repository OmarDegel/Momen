
<tr>
    <td class="text-lg-center">{{ $log->log_name }}</td>
    <td class="text-lg-center">{{ $log->event ?? __('site.null') }}</td>
    <td class="text-lg-center">{{ class_basename($log->subject_type) }}</td>
    <td class="text-lg-center">{{  App\Models\User::find($log->causer_id)?->name_first ?? __('site.null') }}</td>

    @include('admin.layouts.tables.actions', [
        'model' => 'activity_logs',
        'show' => true,
        'item' => $log,
    ])

</tr>


