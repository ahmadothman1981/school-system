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