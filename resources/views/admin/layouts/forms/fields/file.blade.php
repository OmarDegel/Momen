<div class="row g-3 mt-2">
    <label class="form-label">@lang('site.image')</label>
    <span class="note needsclick btn bg-label-primary d-inline" id="btnBrowse">
        @lang('site.image')
    </span>
    <input type="file" id="imageInput" name="image" style="display: none;" accept="image/*">
    <div id="imagePreview" style="margin-top: 20px;">
        @if ($image)
            {{ $image }}
            <div style="display: flex; justify-content: center;">
                <img id="previewImg" src="{{ asset('../' . $image) }}" alt="Image Preview" style="max-width: 50%;">
            </div>
        @else
            <img id="previewImg" src="" alt="Image Preview" style="max-width: 50%; display: none;">
        @endif
    </div>
</div>
