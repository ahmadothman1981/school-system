@section('title','Show All Classes')
<!doctype html>
<html lang="en">

@include('admin.partials.head-arabic')
@section('header','الفصل الدراسى ')

<body>

	<div class="o-page">
		<div class="o-page__sidebar js-page-sidebar">
      @include('admin.partials.aside-arabic')
		</div>

		<main class="o-page__content">
      @include('admin.partials.header-arabic')

			<div class="container">
				<div class="row">
					<div class="col-12">
						<a href="{{route('admin.create-class')}}" class="c-btn c-btn--info has-icon">إضافة فصل دراسى  </a>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="c-table-responsive@wide">
							<table class="c-table">
								<thead class="c-table__head">
									<tr class="c-table__row">
										<th class="c-table__cell c-table__cell--head">#</th>
										<th class="c-table__cell c-table__cell--head">الفصل الدراسى</th>
										<th class="c-table__cell c-table__cell--head"> تعديل </th>

									</tr>
								</thead>

								<tbody>
									@foreach ($classes as $class)
									<tr class="c-table__row">
										<td class="c-table__cell">1</td>
										<td class="c-table__cell">
											<div class="o-media">
												<div class="o-media__body">
													<a href="article-view.html">
														<h6>  {{$class->name}}</h6>
													</a>
												</div>
											</div>
										</td>
										<td class="c-table__cell">
											<a href="{{route('admin.edit-class',$class->id)}}" class="c-btn c-btn--success has-icon">
												تعديل <i class="feather icon-wranch"></i>
											</a>
											<a href="{{route('admin.delete-class',$class->id)}}" class="c-btn c-btn--danger has-icon">
												حذف <i class="feather icon-wranch"></i>
											</a>
										</td>
									</tr>	
									@endforeach
									
								</tbody>
							</table>
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
</body>

</html>