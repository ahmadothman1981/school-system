@section('title','Register Page')
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
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              @include('front.partials.AuthLogo')
              <!-- /Logo -->
              <h4 class="mb-2">Adventure starts here 🚀</h4>
              <p class="mb-4">Make your app management easy and fun!</p>

              <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                 @csrf
                <div class="mb-3">
                  <label for="name" :value="__('Name')" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="name"
                    :value="old('name')"
                    placeholder="Enter your name"
                    autofocus
                  />
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label" :value="__('Email')">Email</label>
                  <input type="email" name="email" :value="old('email')" class="form-control" id="email"  placeholder="Enter your email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password" :value="__('Password')">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      autocomplete="new-password" 
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                     
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>

                  </div>
                   <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password_confirmation" :value="__('Confirm Password')"> Confirm Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password_confirmation"
                      class="form-control"
                      name="password_confirmation"
                      autocomplete="new-password" 
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                     <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                      I agree to
                      <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                  </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{route('admin.login')}}">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>
    <!-- / Content -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    @include('front.partials.AuthScripts')
   
  </body>
</html>
