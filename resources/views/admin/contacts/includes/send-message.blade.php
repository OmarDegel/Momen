<div class="card">
    <div class="card-header">
        <h3 class="card-title">@lang('site.message_response')</h3>
    </div>
    <div class="card-body p-0">
        <form method="POST" action="{{ route('dashboard.contacts.sendMessage', ['contact' => $contact->id]) }}">
            @csrf
            <div class="card-body">
                @include('admin.layouts.forms.fields.text', [
                    'text_name' => 'title',
                    'text_value' => old('title') ?? null,
                    'label_name' => __('site.title'),
                    'label_req' => true,
                ])
                @include('admin.layouts.forms.fields.textarea', [
                    'text_name' => 'body',
                    'text_value' => old('body') ?? null,
                    'label_name' => __('site.body'),
                    'not_req' => true,
                    'text_id' => 'my-textarea',
                ])
                <div class="mt-3">
                    @include('admin.layouts.forms.buttons.save', [
                        "save" => __('site.send'),
                    ])

                </div>
            </div>
        </form>
    </div>
</div>
