<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/ico" href="{{asset('/images/logo/'. $setting->favicon)}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!--[if IE]>
    <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
    <![endif]-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{$setting->welcome_txt}}</title>

    <!-- Styles -->
    @yield('head')

</head>
<body>
    <div id="app" style="position: relative;">
        @yield('top_bar')
        @yield('content')
        <br>
        <br>
    </div>
    @php
     $ct = App\copyrighttext::where('id','=',1)->first();
    @endphp
   <div style="padding:15px;color: #FFF;background-color:#86af49; z-index: -10;  position: fixed; width: 100%; bottom: 0;">
        <div class="container" >
            <div class="row">
                <div class="col-md-6">
                    {{ $ct->name }}
                </div>
                
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
