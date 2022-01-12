<!doctype html>
<html lang="en">
    <head>
        <title>{{isset($service['title'])? $service['title'] : "PSM"}}</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @if(isset($service['description']))
        <meta name="description" content="{{$service['description']}}">
        <!-- Facebook Meta-->
        <meta property="og:title" content="{{isset($service['title'])? $service['title'] : 'PSM'}}"/>
        <meta property="og:type" content="Product"/>
        <meta property="og:description" content="{{$service['description']}}"/>
        <!-- Twitter Meta-->
        <meta name="twitter:card" content="summary"></meta>
        @endif
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <base href="{{url('/')}}"> @yield('before-base-css')
        <link href="{{url('/css/front/app.css')}}" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="{{asset('images/favicon-32x32.png')}}" /> @yield('before-base-js')
        <script type="text/javascript">
            if (window.devicePixelRatio > 1) { document.cookie = 'HTTP_IS_RETINA=1;path=/'; }
            var successMessage = '<?php echo isset($success) ? $success : ''; ?>';
            var errorMessage = '<?php echo isset($error) ? $error : ''; ?>';
            var resetEmail = '<?php echo isset($email) ? $email : ''; ?>';
            var stripeKey = '<?php echo config('services.stripe.key'); ?>';
            var socketPort = '<?php echo config('broadcasting.connections.socket.port'); ?>';
            var googleApiKey = '<?php echo config('services.google_api_key'); ?>';
            var facebookApiKey = '<?php echo config('services.facebook_api_key'); ?>';
        </script>
        @yield('after-base-js')
    </head>
    <body>
        <div id="app" class="frontlayout">

            @if(isset($page_not_found) && $page_not_found)
                <page-not-found anchor="true"></page-not-found>
            @else
                <front-header></front-header>
                <router-view></router-view>
                <front-footer></front-footer>
            @endif
        </div>
        <!-- <script src="https://js.stripe.com/v3/"></script> -->
        <script src="{{ url('/js/front-app.js') }}"></script>
    </body>

    <script src="//www.refersion.com/tracker/v3/pub_abc12300000000000000.js"></script>

    <script>
        console.log(2222);
        _refersion(function(){
            console.log(23456);
            _rfsn._addTrans({
                'order_id': '12345',
                'shipping': '11.90',
                'tax': '5.23',
                'discount': '2.32',
                'discount_code': 'TESTCOUPON',
                'currency_code': 'USD'
            });

            _rfsn._addCustomer({
                'first_name': 'Nancy',
                'last_name': 'Parker',
                'email': 'parker.nancy@refersion.com',
                'ip_address': '808.53.77.22'
            });

            _rfsn._addItem({
                'sku': 'DD23444',
                'quantity': '2',
                'price': '100'
            });

            _rfsn._addItem({
                'sku': 'XJ66778',
                'quantity': '3',
                'price': '50'
            });

            _rfsn._addItem({
                'sku': 'MP39592',
                'quantity': '2',
                'price': '1000'
            });

            _rfsn._sendConversion();

        });



    </script>



</html>
