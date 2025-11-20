<label class="switch switch-lg">
    <input type="hidden" name="active" value="0">

    <input type="checkbox" class="switch-input" id="status" name="active" value="1" {{ isset($var) && $var->active ?
    'checked' : '' }}>

    <span class="switch-toggle-slider">
        <span class="switch-on checked">
            <i class="ti ti-check"></i>
        </span>
        <span class="switch-off">
            <i class="ti ti-x"></i>
        </span>
    </span>
    <span class="switch-label">@lang("site.status")</span>

</label>