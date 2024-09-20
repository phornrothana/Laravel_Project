<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->

    <link href="{{asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('backend/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href=" {{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('backend/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('backend/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    {{--toastr  --}}
    <link rel="stylesheet" type="text/css"
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href=" {{ asset('backend/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href=" {{ asset('backend/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
            @include('admin.sidebar')
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
            @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
                @yield('admin')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            @include('admin.footer')
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="  {{ asset('backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="  {{ asset('backend/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="  {{ asset('backend/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="  {{ asset('backend/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="  {{ asset('backend/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="  {{ asset('backend/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="  {{ asset('backend/assets/js/off-canvas.js') }}"></script>
    <script src="  {{ asset('backend/assets/js/hoverable-collapse.js') }}"></script>
    <script src="  {{ asset('backend/assets/js/misc.js') }}"></script>
    <script src="  {{ asset('backend/assets/js/settings.js') }}"></script>
    <script src="  {{ asset('backend/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
     <script src="{{ asset('backend/assets/js/dashboard.js') }}"></script>
    {{-- <script src="assets/js/dashboard.js"></script> --}}
    <!-- End custom js for this page -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var datatype = "{{ Session::get('alert-type','info') }}";
            switch(datatype){
                case 'info' :
                    toastr.info("{{ Session::get('message')}}");
                    break;
                case 'success' :
                    toastr.success("{{ Session::get('message')}}");
                    break;
                case 'warning' :
                    toastr.warning("{{ Session::get('message')}}");
                    break;
                case 'error' :
                    toastr.error("{{ Session::get('message')}}");
                    break;
            }
        @endif
    </script>
    <style>
        .toast-info{
            background: rgb(222, 212, 100) ;
        }
        .toast-success{
            background: rgb(27, 66, 236) ;
        }
        .toast-warning{
            background: rgb(94, 206, 144) ;
        }
        .toast-error{
            background: rgb(214, 21, 21) ;
        }
    </style>
  </body>
</html>
