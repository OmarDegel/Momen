<script>
    $(document).ready(function () {

    function updateOfferFields($row) {}
    function validateOfferPrice($row) { }
    function validateUniqueSizes() { }
    function validateAll() { }




    function initializeDropzone(element) {
        const $dropzoneElement = $(element);
        const $hiddenInput = $dropzoneElement.closest('.form-group').find('.dropzone-hidden-input');

        if ($dropzoneElement.hasClass('dz-main-container')) {
            return;
        }
            const existingImages = $dropzoneElement.data('existing-images') || [];
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
        new Dropzone($dropzoneElement[0], {
            url: "/", 
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 10,
            maxFiles: 10,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
                    previewTemplate: previewTemplate,

            init: function() {
                console.log(existingImages);
                const myDropzoneInstance = this;
                 if (existingImages && Array.isArray(existingImages) && existingImages.length > 0) {
                    existingImages.forEach(imageUrl => {
                        const mockFile = { name: "Existing Image", size: 1 };
                        this.emit("addedfile", mockFile);
                        this.emit("thumbnail", mockFile, imageUrl);
                        this.emit("complete", mockFile);
                        this.files.push(mockFile);
                    });
                }
                $dropzoneElement.addClass('dz-main-container'); // نضيف كلاس لمنع إعادة التفعيل

                this.on("addedfile", function(file) {
                    let dataTransfer = new DataTransfer();
                    myDropzoneInstance.files.forEach(f => dataTransfer.items.add(f));
                    $hiddenInput[0].files = dataTransfer.files;
                });

                this.on("removedfile", function(file) {
                    let dataTransfer = new DataTransfer();
                    myDropzoneInstance.files.forEach(f => {
                        if (f.upload.uuid !== file.upload.uuid) {
                            dataTransfer.items.add(f);
                        }
                    });
                    $hiddenInput[0].files = dataTransfer.files;
                });
            }
        });
    }


    // =================================================================
    // 3. تعريف الـ Repeater (مرة واحدة فقط)
    // =================================================================
    $('.form-repeater').repeater({
        initEmpty: false,

        show: function () {
            // أ. تنظيف Select2
            $(this).find('.select2-container').remove();
            $(this).find('select.select2-hidden-accessible')
                .removeClass('select2-hidden-accessible')
                .removeAttr('data-select2-id tabindex aria-hidden');

            // ب. إظهار العنصر وتحديث حقول العرض
            $(this).slideDown();
            updateOfferFields($(this));
            
            // ج. تفعيل Select2 مع ID فريد
            $(this).find('select').each(function() {
                const randomSuffix = Math.floor(Math.random() * 1000000);
                const originalName = $(this).attr('name').replace(/\[|\]/g, '');
                const newId = originalName + '_' + randomSuffix;
                $(this).closest('.col-12').find('label').attr('for', newId);
                $(this).attr('id', newId);
                $(this).select2({
                    placeholder: '{{ __("site.select_option") }}',
                    allowClear: true
                });
            });

            // د. [الجديد] تفعيل Dropzone على العنصر الجديد فقط
            initializeDropzone($(this).find('.my-dropzone-area'));
        },

        hide: function (deleteElement) {
            if (confirm('{{ __("site.confirm_delete") }}')) {
                $(this).slideUp(deleteElement, function() {
                    $(this).remove();
                    validateUniqueSizes();
                });
            }
        }
    });



    $('.my-dropzone-area').each(function() {
        if ($(this).closest('[data-repeater-item]').css('display') !== 'none') {
            initializeDropzone(this);
        }
    });

    $('[data-repeater-item]').not('[style*="display: none"]').find('select').each(function() {
        $(this).select2({
            placeholder: '{{ __("site.select_option") }}',
            allowClear: true
        });
    });

    $('form').on('submit', function (e) { });
    $(document).on('change', '[name*="[is_offer]"]', function () { });
    $(document).on('input', '[name*="[offer_price]"], [name*="[price]"]', function () { });
    $(document).on('change', '.form-repeater [name*="[size_id]"]', function () {});

    $('[data-repeater-item]').each(function () {
        updateOfferFields($(this));
        validateOfferPrice($(this));
    });
    validateUniqueSizes();


    function updateOfferFields($row) {
        const offerVal = $row.find('[name*="[is_offer]"]').val();
        const offerEnabled = offerVal === '1' || offerVal === 'true';
        const $offerPrice = $row.find('[name*="[offer_price]"]');
        if (!offerEnabled) {
            $offerPrice.prop('disabled', true).val('').removeClass('is-invalid');
            $row.find('.offer-error, .offer-price-error').remove();
            return;
        }
        $offerPrice.prop('disabled', false);
        validateOfferPrice($row);
    }
    function validateOfferPrice($row) {
        const $offerPriceInput = $row.find('[name*="[offer_price]"]');
        const $priceInput = $row.find('[name*="[price]"]');
        const offerPrice = parseFloat($offerPriceInput.val());
        const price = parseFloat($priceInput.val());
        $row.find('.offer-price-error').remove();
        if (!isNaN(offerPrice) && !isNaN(price) && offerPrice >= price) {
            $offerPriceInput.addClass('is-invalid');
            $offerPriceInput.after(
                `<div class="invalid-feedback offer-price-error" style="display:block;">{{ __('validation.offer_price_must_be_less_than') }} (${price})</div>`
            );
            return false;
        } else {
            $offerPriceInput.removeClass('is-invalid');
            return true;
        }
    }
    function validateUniqueSizes() {
        let isValid = true;
        const sizes = [];
        $('.form-repeater [name*="[size_id]"]').each(function () {
            const $select = $(this);
            const val = $select.val();
            const $select2Container = $select.next('.select2-container');
            $select2Container.removeClass('is-invalid');
            $select.closest('.col-12').find('.invalid-feedback.size-error').remove();
            if (val && sizes.includes(val)) {
                $select2Container.addClass('is-invalid');
                $select.closest('.col-12').append(`<div class="invalid-feedback size-error" style="display: block;">{{ __('validation.duplicate_size') }}</div>`);
                isValid = false;
            } else if (val) {
                sizes.push(val);
            }
        });
        return isValid;
    }
    function validateAll() {
        let allValid = true;
        $('[data-repeater-item]').each(function () { if (!validateOfferPrice($(this))) allValid = false; });
        if (!validateUniqueSizes()) allValid = false;
        return allValid;
    }
    $('form').on('submit', function (e) {
        if (!validateAll()) {
            e.preventDefault();
            alert('{{ __("validation.check_form_before_submit") }}');
        }
    });
    $(document).on('change', '[name*="[is_offer]"]', function () { updateOfferFields($(this).closest('[data-repeater-item]')); });
    $(document).on('input', '[name*="[offer_price]"], [name*="[price]"]', function () { validateOfferPrice($(this).closest('[data-repeater-item]')); });
    $(document).on('change', '.form-repeater [name*="[size_id]"]', function () { validateUniqueSizes(); });

});
</script>