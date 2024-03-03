@section('title','Create Student')
@include('admin.partials.head-arabic')
@section('header','اضافة طالب ')

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
                        <form method="POST" action="{{route('admin.store-student')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="c-field col-md-6">
                                    <label class="title">اسم الطالب كاملا</label>
                                    <input type="text" name="name" class="c-input u-mb-small" placeholder="اسم الطالب كاملا" id="title">
                                @if($errors->has('name'))
                                    <span class="text-danger">*{{ $errors->first('name') }}</span>
                                @endif
                                </div>
                                <div class="c-field col-md-6">
                                    <label class="title">البريد الالكترونى</label>
                                    <input type="email" name="email" class="c-input u-mb-small" placeholder="البريد الالكترونى" id="title">
                                    @if($errors->has('email'))
                                          <span class="text-danger">*{{ $errors->first('email') }}</span>
                                    @endif

                                </div>
                                <div class="c-field col-md-6">
                                    <label class="title">الهاتف المحمول</label>
                                    <input type="tel" name="phone" class="c-input u-mb-small" placeholder="الهاتف المحمول" id="title">
                                    @if($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                     @endif
                                </div>
                                <div class="c-field col-md-6">
                                    <label class="title">العنوان </label>
                                    <input type="text" name="address" class="c-input u-mb-small" placeholder="العنوان" id="title">
                                </div>
                            
                                <div class="c-field col-md-6">
                                    <label class="title"> تاريخ الميلاد</label>
                                    <input type="date" name="date_of_birth" class="c-input u-mb-small" placeholder="تاريخ الميلاد" id="title">
                                    @if($errors->has('date_of_birth'))
                                    <span class="text-danger">*{{ $errors->first('date_of_birth') }}</span>
                                @endif
                                </div>
                                <div class="c-field col-md-6">
                                    <label class="status">الفصل الدراسى</label>
                                    
                                    <select name="class" id="" class="c-input u-mb-small">
                                        @foreach($classes as $class)
                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="c-field">
                                <label class="title"> ملاحظات </label>
                                <textarea  name="notes" class="c-input u-mb-small" placeholder="ملاحظات" id="title"></textarea>

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