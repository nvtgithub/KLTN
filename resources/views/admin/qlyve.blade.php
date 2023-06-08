@extends('admin.layout')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-4">
					<div class="card">
						<div class="card-header">
							<h6 class="text-uppercase mb-0">Quản Lý Vé</h6>
							<a href="" title="Thêm mới" style="position: absolute;right: 35px;top: 22px;"><i class="fas fa-plus-square text-success" style="font-size: 24px"></i></a>
						</div>
						<div class="card-body">
                            
							<table class="table table-hover card-text">
								<thead>
									<tr>
										<th>STT</th>
										<th>Tên KH</th>
										<th>Tên Phim</th>
										<th>Lịch chiếu</th>
										<th>Ghế</th>
										<th>Combo</th>
										<th>Chức năng</th>
									</tr>
								</thead>
								<tbody>
									@php
									$stt=0;
									if (isset($_GET['page'])) {
										$a=$_GET['page'];
									}
									else{
										$a=1;
									}
									$stt=($a-1)*10;
									@endphp
									@foreach ($ve as $v)
									@php
									$stt++;
									@endphp
									<tr>
										<td>{{$stt}}</td>

										<td>{{$v->user->name}}</td>

										<td>@foreach ($v['id_lichchieu'] as $l)
											{{$l->lichchieu->phim->tenphim}}
										</td>
										<td>{{date('d-m-y',strtotime($l->lichchieu->ngay))}}&nbsp;|&nbsp;{{date('G:i',strtotime($l->lichchieu->time))}}</td>
										<td>
											@foreach ($l['id_ghe'] as $ghe)
											{{$ghe->ghe->row}}{{$ghe->ghe->number}};
											@endforeach
										</td>

										@endforeach

									</tr>
									@endforeach
								</tbody>
							</table>
							{{ $ve->links()}}
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 text-center text-md-left text-primary">
					<p class="mb-2 mb-md-0">Your company &copy; 2018-2020</p>
				</div>
				<div class="col-md-6 text-center text-md-right text-gray-400">
					<p class="mb-0">Design by <a href="https://bootstrapious.com/admin-templates" class="external text-gray-400">Bootstrapious</a></p>

				</div>
			</div>
		</div>
	</footer>
</div>
@endsection
