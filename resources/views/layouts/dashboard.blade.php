<!DOCTYPE /html>

</html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard|Admin</title>

    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/html/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/html/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/html/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/html/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/html/assets/css/demo.css" />
    <link rel="stylesheet" href="/html/assets/css/custom.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/html/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="/html/assets/vendor/libs/apex-charts/apex-charts.css" />
    <style>
        .btn-link {
            color: #696cff;
            background: transparent;
            border: 0;
            display: inline;
            padding: 0;
        }
    </style>
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/html/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/html/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
         @include('dashboard.leftbar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

        @include('dashboard.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            @yield('content')
            <!-- / Content -->

            <!-- Footer -->
            @include('dashboard.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/html/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/html/assets/vendor/libs/popper/popper.js"></script>
    <script src="/html/assets/vendor/js/bootstrap.js"></script>
    <script src="/html/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/html/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/html/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="/html/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/html/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
     $(document).ready(function() {
       $(".licensing_row").click(function(){
        $('.licensing tr:last').after('<tr><td><select class="form-select investigator_profile_state"><option>--select--</option><option value="1">California</option><option value="2">Texas</option><option value="3">Florida</option></select></td> <td><input type="text" class="form-control" name="license_number"> </td><td><input class="form-control" type="date" name="expiration_date"></td><td><input class="form-check-input" type="checkbox" value="1" name="insurance"></td><td><input class="form-check-input" type="checkbox" value="1" name="bonded"></td><td><button type="button" class="btn btn-primary licensing_row_remove">Remove</button></td></tr>');
       });

       $(".workvehicle_row").click(function(){
        $('.workvehicle tr:last').after('<tr><td><input type="text" class="form-control investigator_profile_vechile_year" name="year"></td> <td><input type="text" class="form-control investigator_profile_vechile_make" name="make"></td><td><input class="form-control investigator_profile_vechile_model" type="text" name="model"></td><td><input class="form-control investigator_profile_picture" type="file" name="picture"></td><td><input class="form-control" type="text" name="insurance_company_name"></td><td><input class="form-control" type="text" name="policy_number"></td><td><input class="form-control" type="date" name="expiration_date"></td> <td><input class="form-control investigator_profile_proof_of_insurance" type="file" name="proof_of_insurance"></td><td><button type="button" class="btn btn-primary workvehicle_row_remove">Remove</button></td></tr>');
       });

       $(".languages_row").click(function(){
        $('.languages tr:last').after('<tr><td><select id="defaultSelect" class="form-select"><option>--select--</option> <option value="1">English</option><option value="2">Spanish</option><option value="3">French</option></select></td> <td><select id="defaultSelect" class="form-select"><option>--select--</option><option value="1">Beginner</option><option value="2">Moderate</option><option value="3">Fluent</option></select></td><td><button type="button" class="btn btn-primary languages_row_remove">Remove</button></td></tr>');
       });

       $(".licensing").on('click', '.licensing_row_remove', function () {
        $(this).closest('tr').remove();
       });

       $(".workvehicle").on('click', '.workvehicle_row_remove', function () {
        $(this).closest('tr').remove();
       });

       $(".languages").on('click', '.languages_row_remove', function () {
        $(this).closest('tr').remove();
       });

     });
    </script>
  </body>
<//html>
