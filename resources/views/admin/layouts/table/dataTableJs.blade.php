
@if($table)
<!-- JS -->
<script src={{ url("https://code.jquery.com/jquery-3.7.1.min.js")}}></script>
<script src={{ url("https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js")}}></script>
<script src={{ url("https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js")}}></script>
<script src={{ url("https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js")}}></script>
<script src={{ url("https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js")}}></script>
<script src={{ url("https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js")}}></script>
<script src={{ url("https://cdn.datatables.net/buttons/2.4.1/js/buttons.flash.min.js")}}></script>
<script src={{ url("https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js")}}></script>
<script src={{ url("https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js")}}></script>
<script src={{ url("https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js")}}></script>

<script>
    $(document).ready(function () {
        var table = $('.table').DataTable({
            paging: false,
            scrollX: true,
            scrollY: 400,
            info: false,
            dom: '<"d-flex justify-content-between align-items-center mb-3 px-3"<"custom-export-area pe-3"B><"f"f>>t',
            buttons: [
                {
                    extend: 'collection',
                    text: '<i class="fa fa-upload me-1"></i> Export',
                    className: 'btn btn-light border shadow-sm px-3 py-2 fw-semibold',
                    buttons: [
                        { extend: 'copy', className: 'dropdown-item' },
                        { extend: 'csv', className: 'dropdown-item' },
                        { extend: 'excel', className: 'dropdown-item' },
                        { extend: 'pdf', className: 'dropdown-item' },
                        { extend: 'print', className: 'dropdown-item' }
                    ]
                }
            ]
        });

        // إضافة زر التصدير في مكانه المخصص
        table.buttons().container().appendTo('.custom-export-area');
    });
</script>
@endif

