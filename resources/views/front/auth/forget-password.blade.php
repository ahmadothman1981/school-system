@section('title','Forget Password')
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('asset-front')}}/"
  data-template="vertical-menu-template-free"
>
@include('front.partials.AuthHead')
  

  <body>
    <!-- Content -->

    
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Forgot Password -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              @include('front.partials.AuthLogo')
              <!-- /Logo -->
              <h4 class="mb-2">Forgot Password? 🔒</h4>
              <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
              <x-auth-session-status class="mb-4" :status="session('status')" />
              <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" :value="__('Email')"  class="form-label">Email</label>
                  <input
                    type="email"
                     name="email" 
                     :value="old('email')"
                    class="form-control"
                    id="email"
                   
                    placeholder="Enter your email"
                    autofocus
                  />
                </div>
                 <x-input-error :messages="$errors->get('email')" class="mt-2" /> 
                <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
              </form>
              <div class="text-center">
                <a href="{{route('login')}}" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Back to login
                </a>
              </div>
            </div>
          </div>
          <!-- /Forgot Password -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    @include('front.partials.AuthScripts')
   
  </body>
</html>
