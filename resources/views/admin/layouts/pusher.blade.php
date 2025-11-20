<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {
        cluster: '{{config('broadcasting.connections.pusher.options.cluster')}}'
    });
    var channel_order = pusher.subscribe('order-channel');
    var channel_contact = pusher.subscribe('contact-channel');
    var language = $('body').attr('data-language');


    channel_order.bind('request-order', function(data) {
        toastr.options.positionClass = "toast-bottom-left";
        toastr.options.closeButton = true;
        toastr.options.timeOut = 30000;
        toastr.options.onclick = function() {
            window.location = '{{url('admin/orders/')}}/' + data.id;
        };
        var order_text = " New Order ";
        if(language == "ar"){
            toastr.options.rtl = true;
            var order_text = "طلب جديد ";
        }
        toastr.warning('<h3 style="text-align"> ' + order_text + ' <span> # '+ data.id + ' </span></h3> ');
        var sound = new Audio("{{asset('js/cartoon-telephone_daniel_simion.mp3')}}");
        //var sound = new Audio("{{asset('js/sharp.mp3')}}");
        sound.play();
    });

    channel_contact .bind('request-contact', function(data) {
        toastr.options.positionClass = "toast-bottom-left";
        toastr.options.closeButton = true;
        toastr.options.timeOut = 30000;
        toastr.options.onclick = function() {
            window.location = '{{url('admin/contacts/')}}/' + data.id;
        };
        var order_text = " New Contact Us ";
        if(language == "ar"){
            toastr.options.rtl = true;
            var order_text = "اتصل بنا جديد ";
        }
        toastr.info('<h3 style="text-align"> ' + order_text + ' <span> # '+ data.id + ' </span></h3> ');
        var sound = new Audio("{{asset('js/cartoon-telephone_daniel_simion.mp3')}}");
        //var sound = new Audio("{{asset('js/sharp.mp3')}}");
        sound.play();
    });

</script>
