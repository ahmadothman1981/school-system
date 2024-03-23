@section('title','Show All Students')
<!doctype html>
<html lang="en">

@include('admin.partials.head-arabic')
@section('header','الصفحة الرئيسية')

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
						<a href="{{route('admin.student-create')}}" class="c-btn c-btn--info has-icon float-right">إضافة طالب  </a>
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
										<th class="c-table__cell c-table__cell--head">اسم المستخدم</th>
										<th class="c-table__cell c-table__cell--head">التليفون</th>
										<th class="c-table__cell c-table__cell--head">الفصل الدراسى </th>										
										<th class="c-table__cell c-table__cell--head"> تاريخ الميلاد </th>
										<th class="c-table__cell c-table__cell--head"> تعديل </th>

									</tr>
								</thead>

								<tbody>
									@foreach($users as $user)
									
									
									<tr class="c-table__row">

										<td class="c-table__cell">{{ $loop->iteration }}</td>
										<td class="c-table__cell">
											<div class="o-media">
												<div class="o-media__body">
													<a href="{{route('admin.show-student',$user->id)}}">
														<h6>  {{$user->name}}</h6>
													</a>
												</div>
											</div>
										</td>
										
										<td class="c-table__cell">
											<div class="o-media">
												<div class="o-media__body">
													
														<h6> {{$user->phone}}</h6>
													
												</div>
											</div>
										</td>
										
										@foreach($semesters as $semester )
										@if($semester->id == $user->semester)
										
										
										<td class="c-table__cell">
											<a href="{{route('admin.show-class',$semester->id)}}"><span class="c-badge c-badge--small c-badge--danger">{{$semester->name}} </span></a>
										</td>
										@endif
										@endforeach
										<td class="c-table__cell">
											<div class="o-media__body">
												
													{{$user->date_of_birth}}
												
											</div>
										</td>
										
										<td class="c-table__cell">
											<a href="{{route('admin.show-student',$user->id)}}" class="c-btn c-btn--info has-icon">
												عرض <i class="feather icon-wranch"></i>
											</a>
											<a href="{{route('admin.edit-student',$user->id)}}" class="c-btn c-btn--success has-icon">
												تعديل <i class="feather icon-wranch"></i>
											</a>
											<a href="{{route('admin.delete-student',$user->id)}}" id="delete" class="c-btn c-btn--danger has-icon">
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
				{{$users->links()}}

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