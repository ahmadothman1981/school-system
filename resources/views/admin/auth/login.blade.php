@section('title','Admin LOGIN')
<!doctype html>
<html lang="en">
@include('admin.partials.AuthHead')


<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{asset('asset-admin')}}/assets/images/logos/logo-no-background.svg" width="100" alt="">
                </a>
                <p class="text-center fs-3 fw-bolder">Admin Login</p>
                <form  class="mb-3" action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" :value="__('Email')" class="form-label">Email or Username</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                   name="email"
                   :value="old('email')"
                    placeholder="Enter your email or username"
                    autofocus
                  />
                   <x-input-error :messages="$errors->get('email')" class="mt-2" />  
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password" :value="__('Password')">Password</label>
                    <a href="{{route('admin.password.request')}}">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>

                  </div>
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me"   name="remember"/>
                    <label class="form-check-label" for="remember_me"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>
               <p class="text-center">
                <span>New on our platform?</span>
                <a href="{{route('admin.register')}}">
                  <span>Create an account</span>
                </a>
              </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('asset-admin')}}/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="{{asset('asset-admin')}}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>