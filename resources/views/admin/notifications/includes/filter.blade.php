@include('admin.layouts.modals.filter.header', ['model' => 'notifications'])

<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.date', [
        'date_name' => 'date_start',
        'date_value' => old('date_start') ?? request('date_start'),
        'placeholder' => 'YYYY-MM-DD HH:MM',
        'date_id' => 'flatpickr-datetime-start',
        'date_class' => ' flatpickr-datetime',
        'label_name' => __('site.date_start'),
        'not_req' => true
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.forms.fields.date', [
        'date_name' => 'date_end',
        'date_value' => old('date_end')?? request('date_end'),
        'placeholder' => 'YYYY-MM-DD HH:MM',
        'date_id' => 'flatpickr-datetime-end',
        'date_class' => ' flatpickr-datetime',
        'label_name' => __('site.date_end'),
        'not_req' => true
        ])
    </div>
</div>
<div class="col-md-6">
      @include('admin.layouts.forms.fields.select', [
        'select_name' => 'user_id',
        'select_function' => ['all' => __('site.all')] + $users,
        'select_value' => old('user_id') ?? request('user_id'),
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
<div class="col-md-6">
      @include('admin.layouts.forms.fields.select', [
        'select_name' => 'action',
        'select_function' =>App\Helpers\ActionNotificationHelper::getActions(),
        'select_value' => old('action') ?? request('action'),
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>


















{{-- buttons --}}
@include('admin.layouts.modals.filter.buttons', ['model' => 'notifications'])

{{-- Footer --}}
@include('admin.layouts.modals.filter.footer')
