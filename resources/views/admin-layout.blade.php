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
        <link rel="shortcut icon" type="image/png" href="{{asset('images/favicon-32x32.png')}}" /> @yield('before-base-js')
        <script type="text/javascript">
            if (window.devicePixelRatio > 1) { document.cookie = 'HTTP_IS_RETINA=1;path=/'; }
             var successMessage = '<?php echo isset($success) ? $success : ''; ?>';
             var errorMessage = '<?php echo isset($error) ? $error : ''; ?>';
             var resetEmail = '<?php echo isset($email) ? $email : ''; ?>';
             var appName = '<?php echo config('app.app_name'); ?>';
        </script>
        @yield('after-base-js')
    </head>
    <body>
        <div id="app">
            <navigation  v-if="$auth.isAuthenticated()" v-show="$route.meta.noHeader===true === false"></navigation>
            <div class="panel">
               <left-panel v-show="$route.meta.noHeader===true === false"></left-panel>
               <breadcrumb v-show="$route.meta.noHeader===true === false" ></breadcrumb>
               <router-view></router-view>
               <vue-progress-bar></vue-progress-bar>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
