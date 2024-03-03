@section('title','Show All Students')
<!doctype html>
<html lang="en">

@include('admin.partials.head-arabic')
@section('header','المدرسين  ')

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
						<a href="{{route('admin.teacher-create')}}" class="c-btn c-btn--info has-icon float-right">إضافة مدرس   </a>
					</div>
				</div>
				@include('admin.partials.flash-message')
				<div class="row">
					<div class="col-12">
						<div class="c-table-responsive@wide">
							<table class="c-table">
								<thead class="c-table__head">
									<tr class="c-table__row">
										<th class="c-table__cell c-table__cell--head">#</th>
										<th class="c-table__cell c-table__cell--head">المدرس </th>
                                        <th class="c-table__cell c-table__cell--head">التليفون </th>
										<th class="c-table__cell c-table__cell--head">الفصل الدراسى </th>
										<th class="c-table__cell c-table__cell--head"> تعديل </th>

									</tr>
								</thead>

								<tbody>
									@foreach ($teachers as $teacher)
									<tr class="c-table__row">
										<td class="c-table__cell">{{ $loop->iteration }}</td>
										<td class="c-table__cell">
											<div class="o-media">
												<div class="o-media__body">
													<a href="article-view.html">
														<h6>  {{$teacher->name}}</h6>
													</a>
												</div>
											</div>
										</td>
										<td class="c-table__cell">
											<div class="o-media">
												<div class="o-media__body">
													<a href="article-view.html">
														<h6>  {{$teacher->phone}}</h6>
													</a>
												</div>
											</div>
										</td>
										<td class="c-table__cell">
											<div class="o-media">
												<div class="o-media__body">
													<a href="article-view.html">
														<h6>  {{$teacher->id}}</h6>
													</a>
												</div>
											</div>
										</td>
										<td class="c-table__cell">
											<a href="{{route('admin.edit-teacher',$teacher->id)}}" class="c-btn c-btn--success has-icon">
												تعديل <i class="feather icon-wranch"></i>
											</a>
											<a href="{{route('admin.delete-teacher',$teacher->id)}}" id="delete" class="c-btn c-btn--danger has-icon">
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
				{{$teachers->links()}}

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