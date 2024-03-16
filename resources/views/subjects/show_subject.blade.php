@section('title','Show SUbject Data')
<!doctype html>
<html lang="en">

@include('admin.partials.head-arabic')
@section('header','التفاصيل  ')

<body>
  <div class="o-page">
		<div class="o-page__sidebar js-page-sidebar">
      @include('admin.partials.aside-arabic')
		</div>

		<main class="o-page__content">
      @include('admin.partials.header-arabic')

      <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{$subject->name}}</span><span class="text-black-50"></span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right fw-bold">Profile Settings</h4>
                    </div>
                    <div class="row mt-2 float-right">
                        <div class="col-md-12 font-weight-bold"><label class="labels "><span class="font-weight-bold">المادة الدراسية :</span></label>{{$subject->name}}</div>
                    </div>
                    
                    <hr>
                    
                    <table class="table caption-top table table-success table-striped">                
                     
                      <tbody>
                       
                        <tr>
                          <th scope="row">الفصل الدراسى</th>
                          <td>{{$subject->semesters->name}}</td>
                        </tr>
                        
                      
                        <tr>
                          <th scope="row">إسم المدرس</th>
                          
                          <td>{{$subject->teachers->name}}</td>
                        </tr>
                        
                        
                      </tbody>
                        </table>
                        
                </div>
            </div>



      <div class="col-12">
        @include('admin.partials.footer-arabic')
      </div>
  </div>
</div>
</div>
</div>

  <!-- Main JavaScript -->
  <script src="{{asset('admin-arabic/js/neat.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{asset('admin-arabic/js/alert.js')}}"></script>
</body>

</html>