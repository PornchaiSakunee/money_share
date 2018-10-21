@extends('layouts.app_offic')
@section('script')
<script type="text/javascript" src="{{asset('js/food/menu_food.js')}}"></script>
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
       
                    <form class="form-horizontal form-validate-jquery" action="#">
							<fieldset class="content-group">
								
									<!-- Select2 select -->
									<div class="form-group">
										<label class="control-label col-lg-3">หม่วดหมู่<span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<select name="cat_id" data-placeholder="Select a State..." class="select" required="required">
												<option></option>
										        @foreach ($cat as $val_cat)
											<option value="{{$val_cat->cat_id}}">{{$val_cat->cat_name}}</option>
												@endforeach
												
											</select>
										</div>
									</div>
									<!-- /select2 select -->
									


								<!-- Input with icons -->
								<div class="form-group has-feedback">
									<label class="control-label col-lg-3">ชื่อรายการอาหาร <span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="with_icon" class="form-control" required="required" placeholder="ชื่อรายการอาหาร">
										<div class="form-control-feedback">
											<i class="icon-droplets"></i>
										</div>
									</div>
								</div>
								<!-- /input with icons -->
								<!-- Input with icons -->
								<div class="form-group has-feedback">
									<label class="control-label col-lg-3">ราคาแบบธรรมดา <span class="text-danger">*</span></label>
									<div class="col-lg-2">
										<input type="text" name="with_icon" class="form-control" required="required" placeholder="ราคาแบบธรรมดา">
										<div class="form-control-feedback">
											<i class="icon-cash"></i>
										</div>
									</div>
								</div>
								<!-- /input with icons -->
								<div class="form-group has-feedback">
									<label class="control-label col-lg-3">ราคาแบบพิเศษ <span class="text-danger">*</span></label>
									<div class="col-lg-2">
										<input type="text" name="with_icon" class="form-control" required="required" placeholder="ราคาแบบพิเศษ">
										<div class="form-control-feedback">
											<i class="icon-cash"></i>
										</div>
									</div>
								</div>
								<!-- /input with icons -->

								<!-- Basic file uploader -->
								<div class="form-group">
									<label class="control-label col-lg-3">รูป<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="file" name="unstyled_file" class="form-control" required="required">
									</div>
								</div>
								<!-- /basic file uploader -->

								


							</fieldset>
							<div class="text-right">
								<button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
								<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</form>
            </div>
        </div>
    </div>
</div>
@endsection
