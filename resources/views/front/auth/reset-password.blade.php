@section('title','Reset Password')
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
              <h4 class="mb-2">Reset Password? 🔒</h4>
              <p class="mb-4">Enter New Password for your Account</p>
              
              <form id="formAuthentication" class="mb-3" action="{{ route('password.store') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="mb-3">
                  <label for="email" :value="__('Email')"  class="form-label">Email</label>
                  <input
                    type="email"
                     name="email" 
                     value=" {{$request->email}}"
                    class="form-control"
                    id="email"
                    autofocus
                  />
                </div>
                 <x-input-error :messages="$errors->get('email')" class="mt-2" /> 
                  <!-- Password -->
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
                  <hr>
                <button class="btn btn-primary d-grid w-100">Reset Password</button>
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
