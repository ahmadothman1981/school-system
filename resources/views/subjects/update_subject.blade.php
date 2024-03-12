@section('title','Create Student')
@include('admin.partials.head-arabic')
@section('header','اضافة مادة دراسية ')

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
                        <form method="POST" action="{{route('admin.update-subject')}}">
                            @csrf
                            <div class="c-field col-md-6">
                                <input type="hidden" name="id" value="{{$subject->id}}">

                                <label class="title"> المادة الدراسية</label>
                                <input type="text" name="name" value="{{$subject->name}}" class="c-input u-mb-medium" placeholder="المادة الدراسية  " id="title">
                            </div>
                            <div class="c-field col-md-6">
                                <label class="status"> مدرس المادة</label>
                                
                                <select name="teacher_id" id="" class="c-input u-mb-small">
                                    @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="c-field col-md-6">
                                <label class="status"> الفصل الدراسى</label>
                                
                                <select name="semester_id" id="" class="c-input u-mb-small">
                                    @foreach($semesters as $semester)
                                    <option value="{{$semester->id}}">{{$semester->name}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <button class="c-btn  c-btn--info">تعديل </button>
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
	<script src="js/neat.js"></script>