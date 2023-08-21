<!doctype html>
<html lang="en" dir="ltr">

<head>

  <!-- META DATA -->
  <meta charset="UTF-8">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Ridwan-Startrer Pack">
  <meta name="author" content="Ridwan">

  <!-- FAVICON -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/admin/images/brand/favicon.ico') }}" />

  <!-- TITLE -->
  <title>Ridwan-Startrer Pack</title>

  <!-- BOOTSTRAP CSS -->
  <link id="style" href="{{ asset('/assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

  <!-- STYLE CSS -->
  <link href="{{ asset('/assets/admin/css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('/assets/admin/css/dark-style.css') }}" rel="stylesheet" />
  <link href="{{ asset('/assets/admin/css/transparent-style.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/admin/css/skin-modes.css') }}" rel="stylesheet" />

  <!--- FONT-ICONS CSS -->
  <link href="{{ asset('/assets/admin/css/icons.css') }}" rel="stylesheet" />

  <!-- COLOR SKIN CSS -->
  <link id="theme" rel="stylesheet" type="text/css" media="all"
    href="{{ asset('/assets/admin/colors/color1.css') }}" />

</head>

<body class="app sidebar-mini ltr">

  <!-- BACKGROUND-IMAGE -->
  <div class="login-img">

    <!-- GLOABAL LOADER -->
    <div id="global-loader">
      <img src="{{ asset('/assets/admin/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOABAL LOADER -->

    <!-- PAGE -->
    <div class="page">
      <div class="">
        <!-- CONTAINER OPEN -->
        <div class="col col-login mx-auto mt-7">
          <div class="text-center">
            <img src="{{ asset('/assets/admin/images/brand/logo-white.png') }}" class="header-brand-img m-0"
              alt="">
          </div>
        </div>
        @yield('content')

        <!-- CONTAINER CLOSED -->
      </div>
    </div>
    <!-- END PAGE -->

  </div>
  <!-- BACKGROUND-IMAGE CLOSED -->

  <!-- JQUERY JS -->
  <script src="{{ asset('/assets/admin/js/jquery.min.js') }}"></script>

  <!-- BOOTSTRAP JS -->
  <script src="{{ asset('/assets/admin/plugins/bootstrap/js/popper.min.js') }}"></script>
  <script src="{{ asset('/assets/admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

  <!-- SHOW PASSWORD JS -->
  <script src="{{ asset('/assets/admin/js/show-password.min.js') }}"></script>

  <!-- Perfect SCROLLBAR JS-->
  <script src="{{ asset('/assets/admin/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

  <!-- Color Theme js -->
  <script src="{{ asset('/assets/admin/js/themeColors.js') }}"></script>

  <!-- CUSTOM JS -->
  <script src="{{ asset('/assets/admin/js/custom.js') }}"></script>

</body>

</html>
