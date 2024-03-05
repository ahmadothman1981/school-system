@section('title','Create Subject')
@include('admin.partials.head-arabic')
@section('header','اضافة مادة دراسية  ')

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
                        <form method="POST" action="{{route('admin.store-subject')}}">
                            @csrf
                            <div class="c-field col-md-6">
                                <label class="title"> المادة الدراسية</label>
                                
                                <input type="text" name="name" class="c-input u-mb-medium" placeholder="المادة الدراسية  " id="title">
                                @if($errors->has('name'))
                                <span class="text-danger">*{{ $errors->first('name') }}</span>
                                 @endif
                            </div>
                            <button class="c-btn  c-btn--info">إضافة </button>
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