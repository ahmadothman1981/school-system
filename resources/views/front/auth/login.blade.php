@section('title','Login Page')
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
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              @include('front.partials.AuthLogo')
            
              <!-- /Logo -->
              <h4 class="mb-2">Welcome to User DashBoard👋</h4>
              <p class="mb-4">Please sign-in to your account and start the adventure</p>
              <x-auth-session-status class="mb-4" :status="session('status')" />

              <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
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
                    <a href="{{route('password.request')}}">
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
                <a href="{{route('register')}}">
                  <span>Create an account</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    @include('front.partials.AuthScripts')
   
  </body>
</html>
