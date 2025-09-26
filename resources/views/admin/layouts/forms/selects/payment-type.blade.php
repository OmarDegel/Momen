<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Type') }}</label>
    @endif
    ::select('type',paymentType() ,null, array('class' => 'select2','required'=>'')) !!}
</div>