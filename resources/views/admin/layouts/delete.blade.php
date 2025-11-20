<div class="modal fade" id="cancel-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{ __('Cancel Order') }}</h4>
                </div>
                <div class="modal-body">
                    {{ __('Confirm Cancel ?') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('No') }}</button>
                    <button id="confirm-cancel" type="button" class="btn btn-danger">{{ __('Yes') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{ __('Delete') }}</h4>
                </div>
                <div class="modal-body">
                    {{ __('Confirm Delete ?') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('No') }}</button>
                    <button id="confirm-delete" type="button" class="btn btn-danger">{{ __('Yes') }}</button>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="restore-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{ __('Restore Data') }}</h4>
            </div>
            <div class="modal-body">
                {{ __('Confirm Restore Data ?') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('No') }}</button>
                <button id="confirm-restore" type="button" class="btn btn-danger">{{ __('Yes') }}</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="force-delete-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{ __('Delete') }}</h4>
            </div>
            <div class="modal-body">
                {{ __('Confirm Delete ?') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('No') }}</button>
                <button id="confirm-force-delete" type="button" class="btn btn-danger">{{ __('Yes') }}</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('body').on('click', '#delete', function () {
            $('#delete-modal').modal('show');
            $('#confirm-delete').attr('data-id', $(this).attr('data-id'));
        });

        $('body').on('click', '#confirm-delete', function () {

            $('#delete-modal').modal('hide');

            $('[data-delete-id="' + $(this).attr('data-id') + '"]').click();

        });

        $('body').on('click', '#force-delete', function () {
            $('#force-delete-modal').modal('show');
            $('#confirm-force-delete').attr('data-id', $(this).attr('data-id'));
        });

        $('body').on('click', '#confirm-force-delete', function () {

            $('#force-delete-modal').modal('hide');

            $('[data-force-delete-id="' + $(this).attr('data-id') + '"]').click();

        });
        $('body').on('click', '#restore', function () {
            $('#restore-modal').modal('show');
            $('#confirm-restore').attr('data-id', $(this).attr('data-id'));
        });

        $('body').on('click', '#confirm-restore', function () {

            $('#restore-modal').modal('hide');

            $('[data-restore-id="' + $(this).attr('data-id') + '"]').click();
        });

    });
</script>
