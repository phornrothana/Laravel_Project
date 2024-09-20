<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Log in</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/css/vendor.bundle.base.css')}}">

     {{--toastr  --}}
     <link rel="stylesheet" type="text/css"
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.png')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="m-0 row w-100">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="mx-auto card col-lg-4">
              <div class="px-5 py-5 card-body">
                <h3 class="mb-3 text-left card-title">Login</h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="form-group">
                    <label for="username">Username or email *</label>
                    <input type="text" name="username" class="form-control p_input" value="{{old('username') }}"  required  autocomplete="username" placeholder="username" autofocus>
                    @if ($errors->has('username'))
                        <span class="danger">
                            {{ $errors->first('username') }}
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control p_input"   required  autocomplete="password" placeholder="password" >
                    @if ($errors->has('password'))
                        <span class="danger">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="{{url('forgot-password')  }}" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <div class="d-flex">
                    <button class="mr-2 btn btn-facebook col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('backend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('backend/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('backend/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('backend/assets/js/misc.js')}}"></script>
    <script src="{{asset('backend/assets/js/settings.js')}}"></script>
    <script src="{{asset('backend/assets/js/todolist.js')}}"></script>
    <!-- endinject -->

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
