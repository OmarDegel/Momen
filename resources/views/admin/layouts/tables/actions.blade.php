<td class="text-lg-center">
    <div class="dropdown">
        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
            <i class="ti ti-dots-vertical"></i>
        </button>
        <div class="dropdown-menu">


            <li>
                @if (isset($edit))

                @if (auth()->user()->hasPermission($model.'.update'))
                <a class="dropdown-item" href="{{ route('dashboard.'.$model.'.edit', $item->id) }}">
                    <i class="ti ti-pencil me-1"></i> @lang('site.Edit')
                </a>
                @else
                <button disabled class="dropdown-item" disabled>
                    <i class="ti ti-pencil me-1"></i> @lang('site.Edit')
                </button>
                @endif

                @endif

                @if (isset($show))

                @if (auth()->user()->hasPermission($model.'.show'))
                <a class="dropdown-item" href="{{ route('dashboard.'.$model.'.show', $item->id) }}">
                    <i class="ti ti-eye me-1"></i> @lang('site.show')
                </a>
                @else
                <button disabled class="dropdown-item" disabled>
                    <i class="ti ti-eye me-1"></i> @lang('site.show')
                </button>
                @endif

                @endif

                @if (isset($delete))

                @if (auth()->user()->hasPermission($model.'.destroy'))
                <button class="dropdown-item delete-btn" data-bs-toggle="modal"
                    data-bs-target="#deleteModal{{ $item->id }}">
                    <i class="ti ti-trash me-1"></i> @lang('site.delete')
                </button>
                @else
                <button class="dropdown-item" disabled>
                    <i class="ti ti-trash me-1"></i> @lang('site.delete')
                </button>
                @endif
                @endif
            </li>

            </li>
        </div>
    </div>
</td>
