<script>
  // Pass the route URL from Blade to a JavaScript variable
  const existingAttachments= "{{ $attachment ?? null }}";
  const existingAttachmentsSizes= "{{ $filesSize ?? null }}";
</script>
<div  class="dropzone needsclick" id="dropzone-mlutiple">
    <div class="dz-message needsclick">
        {{ __('Drop files here or click to upload')  }} 
        <span class="note needsclick">({{ __('Maximum file size allowed is 4 MB') }})  </span>
    </div>
    <div class="fallback">
      <input name="file" type="file" multiple />

    </div>
</div>
