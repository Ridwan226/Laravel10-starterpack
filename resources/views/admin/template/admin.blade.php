<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Star Template - Ridwan">
    <meta name="author" content="Star Template - Ridwan">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/admin/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>Star Template - Ridwan </title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('/assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('/assets/admin/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/admin/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/admin/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/admin/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('/assets/admin/css/icons.css') }}" rel="stylesheet" />

    <!-- Flash Css -->
    <link href="{{ asset('/assets/admin/plugins/flashmessage/flash.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('/assets/admin/colors/color1.css') }}" />
    <!-- summernote -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    @yield('app-css')
</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('/assets/admin/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            @include('admin.template.header')
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            @include('admin.template.sidebar')

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    @yield('content')

                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->

        </div>





        <!-- FOOTER -->
        @include('admin.template.footer')

        <!-- FOOTER END -->

    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('/assets/admin/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('/assets/admin/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ asset('/assets/admin/js/jquery.sparkline.min.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('/assets/admin/js/sticky.js') }}"></script>

    <!-- Flash js -->
    <script src="{{ asset('/assets/admin/plugins/flashmessage/flash.min.js') }}"></script>

    <script src="{{ asset('/assets/admin/plugins/flashmessage/flash.jquery.min.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('/assets/admin/plugins/sidebar/sidebar.js') }}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('/assets/admin/plugins/select2/select2.full.min.js') }}"></script>


    <!-- SIDE-MENU JS-->
    <script src="{{ asset('/assets/admin/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- Sweet-Alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.all.min.js"></script>
    <!-- Color Theme js -->
    <script src="{{ asset('/assets/admin/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('/assets/admin/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('app-js')

</body>

</html>
