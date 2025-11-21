<script>
    $(document).ready(function() {

        function updateOfferFields($row) {}

        function validateOfferPrice($row) {}

        function validateUniqueSizes() {}

        function validateAll() {}


        function initializeDropzone(element) {
            const $dropzoneElement = $(element);

            // منع تهيئة العنصر مرتين
            if ($dropzoneElement.hasClass('dz-main-container')) {
                return;
            }

            const existingImages = $dropzoneElement.data('existing-images') || [];

            // مصفوفة لتخزين المحذوفات لهذا العنصر
            let localDeletedIDs = [];

            let previewTemplate = `
    <div class="dz-preview dz-file-preview">
        <div class="dz-photo">
            <img class="dz-thumbnail" data-dz-thumbnail />
        </div>
        <button class="dz-delete border-0 p-0" type="button" data-dz-remove>
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path fill="#FFFFFF" d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"></path>
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
                    const myDropzoneInstance = this;

                    // ==========================================
                    // دالة لتحديث الصور الجديدة فقط في الـ Input
                    // تستقبل الـ input الحي كـ parameter لضمان الدقة
                    // ==========================================
                    const updateHiddenFileInput = ($liveInput = null) => {
                        // إذا لم يمرر input، نحاول العثور عليه (كاحتياطي)
                        if (!$liveInput) {
                            $liveInput = $(myDropzoneInstance.element).closest('.form-group')
                                .find('.dropzone-hidden-input');
                        }

                        let dataTransfer = new DataTransfer();
                        myDropzoneInstance.files.forEach(f => {
                            // الشرط الذهبي: نضيف الملف فقط إذا لم يكن صورة قديمة
                            if (!f.isExisting) {
                                dataTransfer.items.add(f);
                            }
                        });

                        if ($liveInput.length > 0) {
                            $liveInput[0].files = dataTransfer.files;
                            // console.log('New Files Count:', $liveInput[0].files.length); // Debug
                        }
                    };

                    // ==========================================
                    // 1. عرض الصور القديمة
                    // ==========================================
                    if (Array.isArray(existingImages) && existingImages.length > 0) {
                        existingImages.forEach(imgData => {
                            let url = typeof imgData === 'object' ? imgData.url : imgData;
                            let id = typeof imgData === 'object' ? imgData.id : null;

                            let mockFile = {
                                name: "Existing Image",
                                size: 12345,
                                dataURL: url,
                                isExisting: true, // علامة مميزة
                                id: id // نحفظ الـ ID
                            };

                            this.emit("addedfile", mockFile);
                            this.emit("thumbnail", mockFile, url);
                            this.emit("complete", mockFile);
                            this.files.push(mockFile);
                        });
                    }

                    // وضع كلاس لمنع إعادة التهيئة
                    $dropzoneElement.addClass('dz-main-container');

                    // ==========================================
                    // 2. عند إضافة صورة جديدة
                    // ==========================================
                    this.on("addedfile", function(file) {
                        if (file.isExisting) return; // تجاهل الصور القديمة

                        // نستخدم Input الحي دائماً
                        const $liveFileInput = $(this.element).closest('.form-group').find(
                            '.dropzone-hidden-input');
                        updateHiddenFileInput($liveFileInput);
                    });

                    // ==========================================
                    // 3. عند الحذف (المنطق المُحدث)
                    // ==========================================
                    this.on("removedfile", function(file) {
                        console.log("Removing file:", file);

                        // أ) إذا كانت صورة قديمة ولديها ID
                        if (file.isExisting && file.id) {
                            // 1. منع التكرار
                            if (!localDeletedIDs.includes(file.id)) {
                                localDeletedIDs.push(file.id);
                            }

                            // 2. ⭐ البحث عن الـ Input الحي (Live) لضمان التحديث الصحيح داخل Repeater
                            const $liveDeleteInput = $(this.element).closest('.form-group')
                                .find('.dropzone-delete-old-input');

                            // 3. التحديث
                            if ($liveDeleteInput.length > 0) {
                                $liveDeleteInput.val(localDeletedIDs.join(','));
                                console.log("Live Delete Input Updated:", $liveDeleteInput
                                    .val());
                            } else {
                                console.error("Delete Input Not Found!");
                            }
                        }

                        // ب) تحديث قائمة الملفات الجديدة
                        const $liveFileInput = $(this.element).closest('.form-group').find(
                            '.dropzone-hidden-input');
                        updateHiddenFileInput($liveFileInput);
                    });
                }
            });
        }


        // =================================================================
        // 3. تعريف الـ Repeater (مرة واحدة فقط)
        // =================================================================
        $('.form-repeater').repeater({
            initEmpty: false,

           show : function() {
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
                        placeholder: '{{ __('site.select_option') }}',
                        allowClear: true
                    });
                });

                // د. [الجديد] تفعيل Dropzone على العنصر الجديد فقط
                initializeDropzone($(this).find('.my-dropzone-area'));
            },

            hide: function(deleteElement) {
                if (confirm('{{ __('site.confirm_delete') }}')) {
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
                placeholder: '{{ __('site.select_option') }}',
                allowClear: true
            });
        });

        $('form').on('submit', function(e) {});
        $(document).on('change', '[name*="[is_offer]"]', function() {});
        $(document).on('input', '[name*="[offer_price]"], [name*="[price]"]', function() {});
        $(document).on('change', '.form-repeater [name*="[size_id]"]', function() {});

        $('[data-repeater-item]').each(function() {
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
            $('.form-repeater [name*="[size_id]"]').each(function() {
                const $select = $(this);
                const val = $select.val();
                const $select2Container = $select.next('.select2-container');
                $select2Container.removeClass('is-invalid');
                $select.closest('.col-12').find('.invalid-feedback.size-error').remove();
                if (val && sizes.includes(val)) {
                    $select2Container.addClass('is-invalid');
                    $select.closest('.col-12').append(
                        `<div class="invalid-feedback size-error" style="display: block;">{{ __('validation.duplicate_size') }}</div>`
                    );
                    isValid = false;
                } else if (val) {
                    sizes.push(val);
                }
            });
            return isValid;
        }

        function validateAll() {
            let allValid = true;
            $('[data-repeater-item]').each(function() {
                if (!validateOfferPrice($(this))) allValid = false;
            });
            if (!validateUniqueSizes()) allValid = false;
            return allValid;
        }
        $('form').on('submit', function(e) {
            if (!validateAll()) {
                e.preventDefault();
                alert('{{ __('validation.check_form_before_submit') }}');
            }
        });
        $(document).on('change', '[name*="[is_offer]"]', function() {
            updateOfferFields($(this).closest('[data-repeater-item]'));
        });
        $(document).on('input', '[name*="[offer_price]"], [name*="[price]"]', function() {
            validateOfferPrice($(this).closest('[data-repeater-item]'));
        });
        $(document).on('change', '.form-repeater [name*="[size_id]"]', function() {
            validateUniqueSizes();
        });

    });
</script>
