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
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{$assignment->getFirstMediaUrl('assignments')}}"><span class="font-weight-bold">{{$assignment->name}}</span><span class="text-black-50"></span><span> </span><a href="{{route('admin.download',$assignment->id)}}" class="c-btn c-btn--info has-icon">Download</a></div>
                
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right fw-bold">تفاصيل الاختبار </h4>
                    </div>
                    <div class="row mt-2 float-right">
                        <div class="col-md-12 font-weight-bold"><label class="labels "><span class="font-weight-bold">المادة الدراسية :</span></label>{{$assignment->subject->name}}</div>
                    </div>
                    
                    <hr>
                    
                    <table class="table caption-top table table-success table-striped">                
                     
                      <tbody>
                       
                        <tr>
                          <th scope="row"> اسم الاختبار</th>
                          <td>{{$assignment->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row"> اسم المدرس</th>
                            <td>{{$assignment->teacher->name}}</td>
                          </tr>
                          <tr>
                            <th scope="row">  تاريخ الاختبار </th>
                            <td>{{$assignment->exam_date}}</td>
                          </tr>
                          <tr>
                            <th scope="row"> ملاحظات </th>
                            <td>{{$assignment->notes}}</td>
                          </tr>
                         
                       
                      
                        <tr>
                          <th scope="row">المرحلة الدراسية</th>
                          
                          <td>{{$assignment->semester->name}}</td>
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