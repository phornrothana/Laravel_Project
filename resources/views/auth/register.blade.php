<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="m-0 row w-100">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="mx-auto card col-lg-4">
              <div class="px-5 py-5 card-body">
                <h3 class="mb-3 text-left card-title">Register</h3>
                <form method="POST" action="{{ route('register') }}">
                    @csrf



                  <div class="form-group">
                    <label for="name">Name</label>
                  <input type="text" class="form-control p_input" name="name" value="{{old('name') }}"  required autofocus autocomplete="name" placeholder="name" >
                  @if ($errors->has('name'))
                        <span class="dangger">
                            {{ $errors->first('name') }}
                        </span>
                  @endif
                  </div>

                  <div class="form-group">
                    <label for="username">Username</label>
                  <input type="text" class="form-control p_input" name="username" value="{{old('username') }}"  required  autocomplete="username" placeholder="username" >
                  @if ($errors->has('username'))
                        <span class="dangger">
                            {{ $errors->first('username') }}
                        </span>
                  @endif
                  </div>


                  <div class="form-group">
                    <label for="email">Email</label>
                  <input type="email" class="form-control p_input" name="email" value="{{old('email') }}"   required  autocomplete="email" placeholder="Email" >
                  @if ($errors->has('email'))
                        <span class="dangger">
                            {{ $errors->first('email') }}
                        </span>
                  @endif
                  </div>

                  <div class="form-group">
                    <label for="password_confirmation">Password Confirm</label>
                  <input type="password" class="form-control p_input" name="password_confirmation" required  autocomplete="password_confirmation" placeholder="password_confirmation" >
                  @if ($errors->has('password_confirmation'))
                        <span class="dangger">
                            {{ $errors->first('password_confirmation') }}
                        </span>
                  @endif
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                  <input type="password" class="form-control p_input" name="password"  required  autocomplete="password" placeholder="password" >
                  @if ($errors->has('password'))
                        <span class="dangger">
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
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
                  </div>
                  <div class="d-flex">
                    <button class="mr-2 btn btn-facebook col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="text-center sign-up">Already have an Account?<a href="#"> Sign Up</a></p>
                  <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
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
    <script src="{{ asset('backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('backend/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('backend/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('backend/assets/js/misc.js') }}"></script>
    <script src="{{ asset('backend/assets/js/settings.js') }}"></script>
    <script src="{{ asset('backend/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
  </body>
</html>
