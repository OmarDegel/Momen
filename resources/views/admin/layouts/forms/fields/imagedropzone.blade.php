<script>
  // Pass the route URL from Blade to a JavaScript variable
  const existingImage= "{{ $image ?? null }}";
  const existingImageSize= "{{ $imagesize ?? null }}";
</script>
<div  class="dropzone needsclick" id="dropzone-image">
    <div class="dz-message needsclick">
        {{ __('Drop image here or click to upload')  }} 
    </div>
    <div class="fallback">
      <input name="file" type="file" multiple />
    </div>
</div>