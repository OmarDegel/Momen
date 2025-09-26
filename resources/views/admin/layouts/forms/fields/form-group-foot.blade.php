@if (count($errors) > 0)
<span class="help-block"><strong id="{{$field_name}}_error" style="color: rgb(243, 106, 106)">{{$errors->first($field_name)}}</strong></span>
@endif
</div>
