@extends('layouts.app_offic')
@section('script')
<script type="text/javascript" src="{{ asset('js/share/baby_share.js') }}"></script>
@endsection
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">
                {{@trans('content.baby_share')}}
        </h6>
        <div class="heading-elements">
            <ul class="icons-list">

                <li>
                        <button type="button" class="btn btn-primary modal_form_vertical" data-toggle="modal" data-target="#modal_form_vertical"><i class="icon-cog3 position-left"></i>เพิ่ม</button>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">

               <table class="table datatable-sorting">
						<thead>
							<tr>
								<th>#</th>
								<th>ชื่อ - สกุล</th>
								<th>ชื่อเล่น</th>
								<th>ข้อมูลติดต่อ</th>
								<th>สถานะ</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
                            @php
                            $i=0;
                            @endphp
                                @foreach ($baby_share as $val_baby_share)
                                @php
                                $i++;
                                @endphp
							<tr>
                                <td>{{$i}}</td>
                                <td>{{$val_baby_share->bs_Fname}}</td>
                                <td>{{$val_baby_share->bs_nickname}}</td>
                                <td></td>
                                <td><span class="label label-info">Pending</span></td>
                                <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a onclick="edit_babyshare('{{$val_baby_share->bs_id}}');"><i class="icon-cog"></i> แก้ไขข้อมูล</a></li>
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

                      <!-- Vertical form modal -->
				<div id="modal_form_vertical" class="modal fade">
					<div class="modal-dialog  modal-lg">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h5 class="modal-title">เพิ่มลูกแชร์</h5>
							</div>




              <form action="{{route('insert_baby_share')}}" enctype="multipart/form-data" method="post">
              {{ csrf_field() }}
              <input type="hidden" id="baby_share_id" name="baby_share_id" value="">
								<div class="modal-body">
                  @if ($errors->any())
                       <div class="alert alert-danger">
                           <ul>
                               @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                       </div><br />
                   @endif
									<div class="form-group">
										<div class="row">
											<div class="col-sm-5">
                          <label>ชื่อ</label>
                          <input type="text" id="bs_Fname" name="bs_Fname"  class="form-control" value="{{ old('bs_Fname') }}">
											</div>

											<div class="col-sm-5">
                          <label>สกุล</label>
                          <input type="text" id="bs_Lname" name="bs_Lname"  class="form-control" value="{{ old('bs_Lname') }}">
                      </div>
                      <div class="col-sm-2">
                          <label>ชื่อเล่น</label>
                          <input type="text" id="bs_nickname" name="bs_nickname" class="form-control" value="{{ old('bs_nickname') }}">
                      </div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>ที่อยู่</label>
                        <input type="text" id="bs_address" name="bs_address" class="form-control" value="{{ old('bs_address') }}">
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-3">
												<label>จังหวัด</label>
												<!-- <input type="text"  class="form-control"> -->
                        <select name="province_id" id="province_id"  class="form-control select"  value="{{ old('province_id') }}">
                            @foreach ($province as $item_province)
                        <option value="{{$item_province->PROVINCE_ID}}">{{$item_province->PROVINCE_NAME}}</option>
                            @endforeach
                        </select>
											</div>

											<div class="col-sm-3">
												<label>เขต/อำเภอ</label>
												<select name="amphur_id" id="amphur_id"  class="form-control select" value="{{ old('amphur_id') }}">
                        </select>
											</div>

											<div class="col-sm-3">
  												<label>แขวง/ตำบล</label>
                          <select name="district_id" id="district_id"  class="form-control select" value="{{ old('district_id') }}">
                          </select>
                      </div>

                      <div class="col-sm-3">
                          <label>รหัสไปรษณีย์ *</label>
                          <input type="text" id="postcode" name="postcode" class="form-control" value="{{ old('postcode') }}">
                      </div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-4">
												<label>อีเมล์</label>
												<input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}">
												<span class="help-block">name@domain.com</span>
											</div>

											<div class="col-sm-4">
												<label>เบอร์โทรศัพท์</label>
												<input type="text" id="phone_number" data-mask="+66-99-9999-9999" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
												<span class="help-block">+66-09-9999-9999</span>
                      </div>
                      <div class="col-sm-4">
                          <label>Line id</label>
                          <input type="text" id="line_id" class="form-control" name="line_id" value="{{ old('line_id') }}">
                          <span class="help-block">name@domain.com</span>
                      </div>
										</div>
                  </div>
                  <div class="form-group">
                      <div class="row">
                          <div class="col-sm-6">
                              <label>ธนาคาร ที่รับเงิน</label>
                              <select name="bank_id" id="bank_id"  class="form-control select" value="{{ old('bank_id') }}">
                                  @foreach ($bank as $item_bank)
                              <option value="{{$item_bank->bank_id}}">{{$item_bank->bank_name}}</option>
                                  @endforeach
                              </select>
                          </div>

                          <div class="col-sm-6">
                              <label>เลขบัญชี</label>
                              <input type="text" id="bs_bank_number" name="bs_bank_number"  data-mask="999-9-99999-9" class="form-control" value="{{ old('bs_bank_number') }}">
                          </div>
                      </div>
                    </div>
                                <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>หมายเหตุ</label>
												<textarea rows="5" cols="5"  id="bs_note" name="bs_note" class="form-control" placeholder="Default textarea">{{ old('bs_note') }}</textarea>
											</div>
										</div>
                  </div>
                  <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>เพิ่มรูปถ่าย</label>
												<input type="file" name="picture" class="form-control">
                      </div>
                      <div class="col-sm-6">
                        <label>สำเนาบัตรประจำตัวประชาชน</label>
                        <input type="file" name="copy_of_id_card" class="form-control">
                      </div>
                      <div class="col-sm-6">
                        <label>สำเนาทะเบียนบ้าน</label>
                        <input type="file" name="copy_register_home" class="form-control">
                      </div>
										</div>
                  </div>


								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Submit form</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /vertical form modal -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  @if ($errors->any())
      $('#modal_form_vertical').modal('show');
  @endif

</script>
@endsection
