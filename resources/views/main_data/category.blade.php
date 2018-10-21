@extends('layouts.app_offic')
@section('script')
<script type="text/javascript" src="{{asset('js/food/category.js')}}"></script>
@endsection
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">
                {{@trans('content.food_drink_menu')}}
        </h6>
   
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
				
				<table class="table datatable-sorting">
					<thead>
						<tr>
							<th>#</th>
							<th>เมนูอาหาร</th>
							<th>หมวดหมู่</th>
							<th>ราคา</th>
							<th>Status</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						@php 
						$i=0;
						@endphp
							@foreach ($category as $val_category)
							@php 
							$i++;
							@endphp
						<tr>
							<td>{{$i}}</td>
							<td>{{$val_category->cat_name}}</td>
							<td></td>
							<td></td>
							<td><span class="label label-info">Pending</span></td>
							<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
												<li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
												<li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
											</ul>
										</li>
									</ul>
								</td>
						</tr>
						@endforeach
					</tbody>
				</table>
            </div>
        </div>
    </div>
</div>
@endsection
