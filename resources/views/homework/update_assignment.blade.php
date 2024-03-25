@section('title','Edit Home work')
<!doctype html>
<html lang="en">

@include('admin.partials.head-arabic')
@section('header',' تعديل الواجب المدرسى')

<body>

	<div class="o-page">
		<div class="o-page__sidebar js-page-sidebar">
      @include('admin.partials.aside-arabic')
		</div>

		<main class="o-page__content">
      @include('admin.partials.header-arabic')
      <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="c-alert c-alert--info u-mb-medium">

                    <div class="c-alert__content">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{{$assignment->id}}">
                            @csrf
                            <div class="row">
                                <div class="c-field col-md-6">
                                    <label class="title">الاختبار</label>
                                    <input type="text" name="name" value="{{$assignment->name}}" class="c-input u-mb-small" placeholder="اسم الطالب كاملا" id="title">
                                @if($errors->has('name'))
                                    <span class="text-danger">*{{ $errors->first('name') }}</span>
                                @endif
                                </div>
                               
                                <div class="c-field col-md-6">
                                  <label class="status">مدرس الفصل  </label>
                                  
                                  <select name="teacher_id"  class="c-input u-mb-small">
                                      @foreach($teachers as $teacher)
                                      <option value="{{$teacher->id}}" {{(old('teacher_id',$assignment->teacher_id) == $teacher->id) ? 'selected' : ''}}>{{$teacher->name}}</option>
                                      @endforeach
                                  </select>
                                  
                              </div>
                                <div class="c-field col-md-6">
                                    <label class="title"> تاريخ الواجب المدرسى</label>
                                    <input type="date" value="{{$assignment->exam_date}}" name="exam_date" class="c-input u-mb-small" placeholder="تاريخ الواجب"id="title">
                                    @if($errors->has('exam_date'))
                                    <span class="text-danger">*{{ $errors->first('exam_date') }}</span>
                                @endif
                                </div>
                                <div class="c-field col-md-6">
                                  
                                    <label class="status">الفصل الدراسى</label>
                                    
                                    <select name="semester_id"  class="c-input u-mb-small">
                                        @foreach($semesters as $semester)
                                        <option value="{{$semester->id}}" {{old('semester_id') == $semester->id ? 'selected' : ''}}>{{$semester->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="c-field col-md-6">
                              <label class="status"> المادة الدراسية  </label>
                              
                              <select name="subject_id"  class="c-input u-mb-small">
                                  @foreach($subjects as $subject)
                                  <option value="{{$subject->id}}"{{old('sujbect_id') == $subject->id ? 'selected' : ''}} >{{$subject->name}}</option>
                                  @endforeach
                              </select>
                              
                          </div>
                            <div class="c-field ">
                                <label class="title"> ملاحظات </label>
                                <textarea  name="notes"  class="c-input u-mb-small" placeholder="ملاحظات" id="title">{{$assignment->notes}}</textarea>
                                @if($errors->has('notes'))
                                <span class="text-danger">*{{ $errors->first('notes') }}</span>
                            @endif
                            </div>
                          
                            <div class="c-field">
                                @if($errors->has('image'))
                                <span class="text-danger">*{{ $errors->first('image') }}</span>
                                 @endif
                                <label class="Image">الصورة</label>
                                
                                <input type="file" name="image" class="c-input u-mb-small" placeholder="الصوره" id="Image">
                               
                            </div>
                            

                            <button class="c-btn c-btn--fullwidth c-btn--info">حفظ </button>
                        </form>

        </div>

                
            </div>
        </div>
    </div>
      <div class="row">
        <div class="col-12">
@include('admin.partials.footer-arabic')
        </div>
    </div>
</div>
</main>
</div>

<!-- Main JavaScript -->
<script src="{{asset('admin-arabic/js/neat.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('admin-arabic/js/alert.js')}}"></script>
</body>

</html>