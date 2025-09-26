<div class="form-group">
    <label>{{ __('site.password') }}</label>
    {{
        html()->password('password')
            ->class('form-control')
            ->id('password')
            ->attribute('data-parsley-minlength', '8')
            ->when($new == 1, fn($field) => $field->required())
    }}
    <!-- <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
</div>

<div class="form-group">
    <div id="meter_wrapper">
        <div id="meter"></div>
    </div>
</div>
