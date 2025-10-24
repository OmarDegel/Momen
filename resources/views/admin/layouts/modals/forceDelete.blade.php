<div class="modal fade" id="deleteModal{{ $id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $id }}" aria-hidden="true">
    {{ html()->form('DELETE', route($main_name . '.forceDelete', [$name => $id])) }}

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $id }}">@lang('site.are_you_sure_from_delete')</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                {{ html()->button(__('site.close'))->class('btn btn-secondary')->attribute('data-bs-dismiss', 'modal')->type('button') }}
                {{ html()->button(__('site.delete'))->class('btn btn-primary')->type('submit') }}
            </div>
        </div>
    </div>

    {{ html()->closeModelForm() }}
</div>
