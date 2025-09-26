<script type="text/javascript">
    var language = $('body').attr('data-language');
    $(document).ready(function () {

        $('.children-repeater').repeater({
            defaultValues: {
            'price' : '',
            'active' : '',
            'size_id' : '',
            'id' : 0,
            },
            show: function () {
                $(this).fadeIn();
                $(this).find(".select2-container--default").remove();
                if (language == 'ar') {
                    $(this).find(".select2").select2({
                        dir: 'rtl'
                    });
                } else {
                    $(this).find(".select2").select2();
                }
            },
            hide: function (deleteElement) {
                $(this).fadeOut(deleteElement);
            },
            isFirstItemUndeletable: true
        });

        $('.image-repeater').repeater({
            defaultValues: {
            'image_link' : '',
            'id' : '0',
            },
            show: function () {
                $(this).fadeIn();
                $(this).find('img').attr('src', '').hide();
                var value = $(this).prev().find('.image_number').val();
                        var value_sum = Number(value) + Number(1);
                        var href = $(this).find('.iframe-btn').attr("href");
                        var id_key = 'image_link_0_' + value_sum;
                        $(this).find('.iframe-btn').attr("href", href + "_" + value_sum);
                        $(this).find('#image_link_0').attr('id', id_key);
                        $(this).find('.image_number').val(value_sum);
                        $(this).find('.iframe-btn').click();
            },
            hide: function (deleteElement) {
                $(this).fadeOut(deleteElement);
            }
        });

    });

</script>
