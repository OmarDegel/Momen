<script>
    $(document).ready(function () {

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
                    `<div class="invalid-feedback offer-price-error">
                        {{ __('validation.offer_price_must_be_less_than') }} (${price})
                    </div>`
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

            $('[name*="[size_id]"]').each(function () {
                const $input = $(this);
                const val = $input.val();
                $input.removeClass('is-invalid');
                $input.next('.invalid-feedback.size-error').remove();

                if (val && sizes.includes(val)) {
                    $input.addClass('is-invalid');
                    $input.after(`<div class="invalid-feedback size-error">
                        {{ __('validation.duplicate_size') }}
                    </div>`);
                    isValid = false;
                } else if (val) {
                    sizes.push(val);
                }
            });

            return isValid;
        }


        function validateAll() {
            let allValid = true;

            $('[data-repeater-item]').each(function () {
                const $row = $(this);

                if (!validateOfferPrice($row)) allValid = false;
            });

            if (!validateUniqueSizes()) allValid = false;

            return allValid;
        }


        $('form').on('submit', function (e) {
            if (!validateAll()) {
                e.preventDefault();
                alert('{{ __("validation.check_form_before_submit") }}');
            }
        });

        $('.form-repeater').repeater({
            initEmpty: false,
            show: function () {
                $(this).slideDown();
                updateOfferFields($(this));
            },
            hide: function (deleteElement) {
                if (confirm('{{ __("site.confirm_delete") }}')) {
                    $(this).slideUp(deleteElement, function () {
                        $(this).remove();
                    });
                }
            }
        });

        /**
         * events
         */
        $(document).on('change', '[name*="[is_offer]"]', function () {
            updateOfferFields($(this).closest('[data-repeater-item]'));
        });

        $(document).on('input', '[name*="[offer_price]"], [name*="[price]"]', function () {
            validateOfferPrice($(this).closest('[data-repeater-item]'));
        });

        $(document).on('change', '[name*="[size_id]"]', function () {
            validateUniqueSizes();
        });

        /**
         * initialization
         */
        $('[data-repeater-item]').each(function () {
            updateOfferFields($(this));
            validateOfferPrice($(this));
        });

        validateUniqueSizes();
    });
</script>
