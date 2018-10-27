@extends('layouts.app_offic')
@section('script')
<script type="text/javascript" src="{{asset('js/share/baby_share.js')}}"></script>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_vertical"><i class="icon-cog3 position-left"></i>เพิ่ม</button>
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
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                      <!-- Vertical form modal -->
				<div id="modal_form_vertical" class="modal fade">
					<div class="modal-dialog  modal-lg">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h5 class="modal-title">เพิ่มลูกแชร์</h5>
							</div>
                            
                            
                            
                          
                        <form action="{{route('insert_baby_share')}}" method="post">
                            {{ csrf_field() }}
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-5">
                                                <label>ชื่อ</label>
                                                <input type="text" name="bs_Fname"  class="form-control">
											</div>

											<div class="col-sm-5">
                                                <label>สกุล</label>
                                                <input type="text" name="bs_Lname"  class="form-control">
                                            </div>
                                            <div class="col-sm-2">
                                                <label>ชื่อเล่น</label>
                                                <input type="text"  name="bs_nickname" class="form-control">
                                            </div>
										</div>
									</div>
                               
									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>ที่อยู่</label>
                                                <input type="text" name="bs_address" class="form-control">
                                                
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-3">
												<label>จังหวัด</label>
												<input type="text"  class="form-control">
											</div>

											<div class="col-sm-3">
												<label>เขต/อำเภอ</label>
												<input type="text"  class="form-control">
											</div>

											<div class="col-sm-3">
												<label>แขวง/ตำบล</label>
												<input type="text"  class="form-control">
                                            </div>
                                            <div class="col-sm-3">
                                                    <label>รหัสไปรษณีย์ *</label>
                                                    <input type="text"  class="form-control">
                                                </div>
										</div>
									</div>
                                    
                                    
                                    
									<div class="form-group">
										<div class="row">
											<div class="col-sm-4">
												<label>อีเมล์</label>
												<input type="text"  class="form-control">
												<span class="help-block">name@domain.com</span>
											</div>

											<div class="col-sm-4">
												<label>เบอร์โทรศัพท์</label>
												<input type="text" data-mask="+99-99-9999-9999" class="form-control">
												<span class="help-block">+99-99-9999-9999</span>
                                            </div>
                                            <div class="col-sm-4">
                                                    <label>Line id</label>
                                                    <input type="text"  class="form-control">
                                                    <span class="help-block">name@domain.com</span>
                                                </div>
										</div>
                                    </div>
                                    <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>ธนาคาร ที่รับเงิน</label>

                                                    <select name="bank_id" id="bank_id"  class="form-control select">
                                                        @foreach ($bank as $item_bank)
                                                    <option value="{{$item_bank->bank_id}}">{{$item_bank->bank_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
    
                                                <div class="col-sm-6">
                                                    <label>เลขบัญชี</label>
                                                    <input type="text"  name="bs_bank_number"  data-mask="999-9-99999-9" class="form-control">
                                                   
                                                </div>
                                               
                                        </div>
                                </div>
                                <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>หมายเหตุ</label>
												<textarea rows="5" cols="5" name="bs_note" class="form-control" placeholder="Default textarea"></textarea>
											</div>
										</div>
                                </div>
                                <div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>เพิ่มรูปถ่าย</label>
												<input type="file" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                    <label>สำเนาบัตรประจำตัวประชาชน</label>
                                                    <input type="file" class="form-control">
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
@endsection
