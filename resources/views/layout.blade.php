<!doctype html>
<html lang="en">
    <head>
        <title>PSM</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <base href="{{url('/')}}"> @yield('before-base-css')
        <link href="{{url(mix('css/app.css'))}}" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="{{asset('images/favicon.png')}}" /> @yield('before-base-js')
        <script type="text/javascript">
            if (window.devicePixelRatio > 1) { document.cookie = 'HTTP_IS_RETINA=1;path=/'; }
        </script>
        @yield('after-base-js')
    </head>
    <body>
        <div id="app">
            <navigation v-show="$route.name==='login' === false" ></navigation>
            <div class="panel">
               <left-panel v-show="$route.name==='login' === false"></left-panel>
               <breadcrumb v-show="$route.name==='login' === false" ></breadcrumb>
               <router-view></router-view>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
