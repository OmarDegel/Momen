<script>
    Dropzone.autoDiscover = false;

    let previewTemplate = `
        <div class="dz-preview dz-file-preview">
            <div class="dz-photo">
                <img class="dz-thumbnail" data-dz-thumbnail />
            </div>
            <button class="dz-delete border-0 p-0" type="button" data-dz-remove>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="#FFFFFF"
                        d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z">
                    </path>
                </svg>
            </button>
        </div>`;

    let myDropzone = new Dropzone("#myDropzoneArea", {
        url: "/", 
        autoProcessQueue: false,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        previewTemplate: previewTemplate,
        addRemoveLinks: true,
        dictDefaultMessage: "Drop files here or click to upload",
        uploadMultiple: true,      
        parallelUploads: 10,     
        maxFiles: 10,            
        init: function() {
            const dz = this;

@if (!empty($existingImages))
    @foreach ($existingImages as $img)
        const mockFile{{ $loop->index }} = {
            name: "Image {{ $loop->index }}",
            size: 123456,
            type: "image/jpeg"
        };
        dz.emit("addedfile", mockFile{{ $loop->index }});
        dz.emit("thumbnail", mockFile{{ $loop->index }}, "{{ asset($img->image) }}");
        dz.emit("complete", mockFile{{ $loop->index }});
        dz.files.push(mockFile{{ $loop->index }});
    @endforeach
@endif

            this.on("addedfile", function(file) {
                let fileInput = document.getElementById('hiddenImageInput');
                let dataTransfer = new DataTransfer();

                dz.files.forEach(f => dataTransfer.items.add(f)); 
                fileInput.files = dataTransfer.files;
            });

            this.on("removedfile", function(file) {
                let fileInput = document.getElementById('hiddenImageInput');
                let dataTransfer = new DataTransfer();

                dz.files.forEach(f => {
                    if (f !== file) dataTransfer.items.add(f);
                });

                fileInput.files = dataTransfer.files;
            });
        }
    });

    /**
     * Form on submit
     */
    $('#formSubmit').on('click', function(event) {
        event.preventDefault();
        var $this = $(this);

        $this.children('.spinner-border').removeClass('d-none');

        if ($('#formDropzone')[0].checkValidity() === false) {
            event.stopPropagation();
            $('#formDropzone').addClass('was-validated');
            $this.children('.spinner-border').addClass('d-none');

            if (!myDropzone.getQueuedFiles().length > 0) {
                $('.dropzone-drag-area').addClass('is-invalid').next('.invalid-feedback').show();
            }
        } else {
            myDropzone.processQueue();
        }
    });
</script>