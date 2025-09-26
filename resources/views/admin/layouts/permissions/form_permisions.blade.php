@php
$types = ['index', 'show', 'store', 'update', 'active', 'destroy'];
@endphp

<div class="col-12">
    <h5>@lang('site.permissions')</h5>
    <div class="table-responsive">
        <table class="table table-flush-spacing">
            <thead>
                <tr>

                    <th>
                        <input type="checkbox" class="selectAll form-check-input" />
                        <label class="fw-bold">@lang('site.select_all')</label>
                    </th>
                    @foreach ($types as $type)
                    <th>
                        <input type="checkbox" class="form-check-input select-type " data-type="{{ $type }}" />
                        <label class="fw-bold">@lang('site.'.$type)</label>
                    </th>

                    @endforeach
                </tr>
            </thead>

            <tbody>


                @foreach ($groupedPermissions as $module => $modulePermissions)
                <tr>
                    <td class="text-nowrap fw-medium">
                        <input type="checkbox" class="form-check-input select-module" data-module="{{ $module }}" />
                        {{ __('site.'.$module) }}
                    </td>

                    @foreach ($types as $type)
                    @php
                    $permission = $modulePermissions->first(function ($perm) use ($type) {
                    return explode('.', $perm->name)[1] === $type;
                    });
                    @endphp
                    <td>
                        @if ($permission)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" data-type="{{ $type }}"
                                value="{{ $permission->name }}" name="permissions[]" @isset($edit) {{
                                in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''
                            }}
                            @endisset
                            />
                            <label class="form-check-label d-flex align-items-center">
                                <span class="text-dark fw-bold">
                                    @lang('site.' . $type)
                                </span>
                            </label>
                        </div>
                        @endif
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
