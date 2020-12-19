<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Metas -->
    <title>Graphics Learn</title>
    <base href="{{asset('')}}">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="main_public/css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="main_public/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="main_public/css/style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="main_public/css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="main_public/css/colors.css" rel="stylesheet">

    <!-- Version Tech CSS for this template -->
    <link href="main_public/css/version/tech.css" rel="stylesheet">


    <!-- Đăng nhập -->
    <link rel="stylesheet" type="text/css" href="main_public/css/dangnhap.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('css')

</head>

<body>

    <div id="wrapper">
        <!-- HEADER -->
       
        @include('layout.header')

        <!-- SLIDE -->
        @include('layout.slide')

        <!-- CONTENT SECTION -->
        <section class="section" style="background-color:silver;">
            <div class="container">
                <div class="row">
                    @yield('content')

                </div><!-- end row -->
             </div><!-- end container -->
        </section><!-- end section -->

        <!-- FOOTER  -->
         @include('layout.footer')

         <!-- CHATBOT -->
         <div id="webchat">  </div>

        <!-- <div class="dmtop">Scroll to Top</div> -->
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript ========================================================================= -->
    
    <script src="main_public/js/jquery.min.js"></script>
    <script src="main_public/js/tether.min.js"></script>
    <script src="main_public/js/bootstrap.min.js"></script>
    <script src="main_public/js/custom.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/rasa-webchat/lib/index.min.js"></script>

    <!-- CHATBOT JS -->
    <script >
          WebChat.default.init({
              selector:"#webchat",
              customData:{"language": "en"},
              socketUrl: "http://localhost:5005",
              socketPath:"/socket.io/",
              title:"BotLaravel",
              subtitle:"Your Questions",
          })
    </script>
   
    @yield('script')

    
</body>
</html>