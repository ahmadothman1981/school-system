<!doctype html>
<html lang="en">
@include('admin.partials.head-arabic')


<body>

	<div class="o-page">
		<div class="o-page__sidebar js-page-sidebar">
            @include('admin.partials.aside-arabic')
			
		</div>

		<main class="o-page__content">
            @include('admin.partials.header-arabic')
			
            @yield('content')
			
		</main>
	</div>

	<!-- Main JavaScript -->
	<script src="{{asset('admin-arabic')}}/js/neat.js"></script>
</body>

</html>