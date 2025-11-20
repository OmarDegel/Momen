<script type="text/javascript">
    $(document).ready(function () {

        $("body").on('change', '.orders-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var class_id = obj.attr('data-class');
            var status = obj.val();
            $.ajax({
                type: "POST",
                url: "{{ URL::route('admin.orders.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status,
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    $("#"+class_id+" option").remove();
                    $.each( data, function(k, v) {
                        $("#"+class_id).append($('<option>', {value:k, text:v}));
                   });
                   if(status == "delivered" || status == "rejected" || status == "returned" || status == "cancelled"){
                       obj.parent().next().find('#cancel').remove();
                   }
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.products-code', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var code = obj.parent().parent().find('.product_code').val();
            $.ajax({
                type: "POST",
                url: "{{ URL::route('admin.products.code') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    code: code,
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    obj.parent().parent().find('.product_code').val(data.code);
                    obj.parent().find('span').text(data.code);
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.products-max', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var max_amount = obj.parent().parent().find('.max_amount').val();
            $.ajax({
                type: "POST",
                url: "{{ URL::route('admin.products.max') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    max_amount: max_amount,
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    obj.parent().parent().find('.max_amount').val(data.max_amount);
                    obj.parent().find('span').text(data.max_amount);
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.products-price', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var price = obj.parent().parent().find('.price').val();
            var offer_price = obj.parent().find('.offer_price').val();
            $.ajax({
                type: "POST",
                url: "{{ URL::route('admin.products.price') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    price: price,
                    offer_price: offer_price
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    obj.parent().parent().find('.price').val(data.price);
                    obj.parent().find('.offer_price').val(data.offer_price);
                    obj.parent().parent().find('.product_price span').text(data.price);
                    obj.parent().find('span').text(data.offer_price);
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.products-offer', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var offer = obj.attr('data-offer');
            var offer_update = 1;
            if(offer == 1){
                offer_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.products.offer') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    offer: offer
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,offer_update,obj,'data-offer')
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.products-sale', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var sale = obj.attr('data-sale');
            var sale_update = 1;
            if(sale == 1){
                sale_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.products.sale') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    sale: sale
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,sale_update,obj,'data-sale')
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.products-filter', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var filter = obj.attr('data-filter');
            var filter_update = 1;
            if(filter == 1){
                filter_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.products.filter') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    filter: filter
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,filter_update,obj,'data-filter')
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.products-feature', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var feature = obj.attr('data-feature');
            var feature_update = 1;
            if(feature == 1){
                feature_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.products.feature') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    feature: feature
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,feature_update,obj,'data-feature')
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.products-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.products.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.order_rejects-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.order_rejects.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.brands.status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.brands.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.units-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.units.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.sizes-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.sizes.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.branches-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.branches.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.pages-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.pages.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.reviews-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.reviews.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.payments-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "POST",
                url: "{{ URL::route('admin.payments.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.coupons-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "POST",
                url: "{{ URL::route('admin.coupons.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.coupons-finish', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var finish = obj.attr('data-finish');
            var finish_update = 1;
            if(finish == 1){
                finish_update = 0;
            }
            $.ajax({
                type: "POST",
                url: "{{ URL::route('admin.coupons.finish') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    finish: finish
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,finish_update,obj,'data-finish')
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.users-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "POST",
                url: "{{ URL::route('admin.users.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.categories-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.categories.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.cities-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.cities.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.regions-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.regions.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.contacts-read', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.contacts.read') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getReadData(data,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.contacts-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.contacts.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.groups-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.groups.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        $("body").on('click', '.additions-status', function () {

            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;
            }
            $.ajax({
                type: "post",
                url: "{{ URL::route('admin.additions.status') }}", // URL
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    getStatusData(data,status_update,obj)
                },
                complete: function (data) {

                }});
            return false;
        });

        function getStatusData(data,status_update,obj,data_status = 'data-status'){
            if (data !== "" && data == true) {
                if(status_update == 1){
                   obj.removeClass('btn-success fa-check');
                   obj.addClass('btn-danger fa-remove');
                   obj.attr(data_status, status_update);
                }else{
                   obj.removeClass('btn-danger fa-remove');
                   obj.addClass('btn-success fa-check');
                   obj.attr(data_status, status_update);
                }
               }
        }

        function getReadData(data,obj){
            if (data !== "" && data == true) {
                obj.removeClass('btn-danger fa-remove');
                obj.addClass('btn-success fa-check');
               }
        }

    });
</script>


