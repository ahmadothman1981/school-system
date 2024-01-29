<!doctype html>
<html lang="en">
@include('admin.partials.head')


<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
        @include('admin.partials.aside')
s
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('admin.partials.header')
      
      <!--  Header End -->
      <div class="container-fluid">
        @yield('content')
        <!--  Row 1 -->
       
        @include('admin.partials.footer')
       
      </div>
    </div>
  </div>
  @include('admin.partials.scripts')
</body>

</html>