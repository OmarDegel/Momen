<div id="site-links" class="content">
    <div class="row g-3">
        <div class="col-sm-6">
            @include('admin.layouts.forms.fields.text', [
            'text_name' => 'facebook',
            'text_value' => $facebook ?? null,
            'label_name' => __('facebook'),
            'not_req' => true,
            ])
        </div>
        <div class="col-sm-6">
            @include('admin.layouts.forms.fields.text', [
            'text_name' => 'youtube',
            'text_value' => $youtube ?? null,
            'label_name' => __('youtube'),
            'not_req' => true,
            ])
        </div>
        <div class="col-sm-6">
            @include('admin.layouts.forms.fields.text', [
            'text_name' => 'whatsapp',
            'text_value' => $whatsapp ?? null,
            'label_name' => __('whatsapp'),
            'not_req' => true,
            ])
        </div>
        <div class="col-sm-6">
            @include('admin.layouts.forms.fields.text', [
            'text_name' => 'snapchat',
            'text_value' => $snapchat ?? null,
            'label_name' => __('snapchat'),
            'not_req' => true,
            ])
        </div>
        <div class="col-sm-6">
            @include('admin.layouts.forms.fields.text', [
            'text_name' => 'twitter',
            'text_value' => $twitter ?? null,
            'label_name' => __('twitter'),
            'not_req' => true,
            ])
        </div>
        <div class="col-sm-6">
            @include('admin.layouts.forms.fields.text', [
            'text_name' => 'instagram',
            'text_value' => $instagram ?? null,
            'label_name' => __('instagram'),
            'not_req' => true,
            ])
        </div>

    </div>
</div>