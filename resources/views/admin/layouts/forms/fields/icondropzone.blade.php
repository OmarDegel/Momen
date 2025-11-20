<script>
    // Pass the route URL from Blade to a JavaScript variable
    const existingIcon= "{{ $icon ?? null }}";
    const existingIconSize= "{{ $iconsize ?? null }}";
  </script>
  <div  class="dropzone needsclick" id="dropzone-icon">
      <div class="dz-message needsclick">
          {{ __('Drop icon here or click to upload')  }} 
      </div>
      <div class="fallback">
        <input name="file" type="file" multiple />
      </div>
  </div>