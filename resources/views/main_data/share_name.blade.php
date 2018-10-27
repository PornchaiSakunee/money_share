@extends('layouts.app_offic')
@section('script')
<script type="text/javascript" src="{{asset('js/share/name_share.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/tables/handsontable/handsontable.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/tables/handsontable/languages.js')}}"></script>
@endsection
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">
                {{@trans('content.share_name')}}
        </h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_vertical"><i class="icon-plus3 position-left"></i>เพิ่ม</button>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
               <table class="table datatable-name-share table-hover">
						<thead>
							<tr>
                                <th width='5%'>#</th>
                                <th width='35%'>ชื่อวงแชร์</th>
                                <th width='15%'>รูปแบบวงแชร์</th>
                                <th width='15%'>เงินตั้ง</th>
								<th width='15%'>จำนวนลูกแชร์</th>
								<th width='15%' style="text-align: center;">Actions</th>
								
							</tr>
						</thead>
						<tbody>
                            @php 
                            $i=0;
                            @endphp
                                @foreach ($name_share as $val_name_share)
                                @php 
                                $i++;
                                @endphp
							<tr>
                                <td>{{$i}}</td>
                                <td>{{$val_name_share->ns_name}}</td>
                                <td>{{$val_name_share->sts_name}}</td>
                                <td>{{$val_name_share->ns_money_fund}}</td>
                            
                                <td><button type="button" onclick="window.location.href='{{route('share_num')}}'" class="btn btn-success"><i class=" icon-users4 position-left"></i> 50</button></td>
                        
                             
                                <td style="text-align: right;">
                                    <button type="button" class="btn btn-primary btn-icon btn-rounded" title="รายการวันนี้"><i class="icon-calendar52"></i></button>
                                    <button type="button" class="btn btn-danger btn-icon btn-rounded" title="ลบวงแชร์"><i class="icon-bin"></i></button>
                                    <button type="button" class="btn btn-success btn-icon btn-rounded" title="แก้ไขวงแชร์"><i class="icon-pencil7"></i></button>
                                    
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
								<h5 class="modal-title">เพิ่มวงแชร์</h5>
                            </div>
                        <form action="{{route('share_name_insert')}}" method="post" class="form-validation">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif
                            {{ csrf_field() }}
								<div class="modal-body">
                                <fieldset class="step" id="validation-step1">
                                    <h6 class="form-wizard-title text-semibold">
                                       <span class="form-wizard-count">1</span>
                                                    เพิ่มข้อมูลวงแชร์
                                      <small class="display-block">ช่องที่มีเครื่องหมาย <span class="text-danger">*</span> เป็นช่องที่ต้องกรอกไม่สามารถข้ามได้</small>
                                      </h6>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
                                                <label>ชื่อวงแชร์ <span class="text-danger">*</span></label>
                                                <input type="text" name="ns_name"  class="form-control">
											</div>

											<div class="col-sm-6">
                                                <label>รูปแบบวงแชร์ <span class="text-danger">*</span></label>
                                                <select name="ns_style_share" id="ns_style_share"  class="form-control select"  value="{{ old('province_id') }}">
                                                        @foreach ($style_share as $item_style_share)
                                                    <option value="{{$item_style_share->sts_id}}">{{$item_style_share->sts_name}}</option>
                                                        @endforeach
                                                    </select>
                                              
                                            </div>
                                          
										</div>
									</div>
									<div class="form-group">
										<div class="row">
                                            <div class="col-sm-4">
                                                <label>ส่งต่องวด <span class="text-danger">*</span></label>
                                                <input type="text" name="ns_installment" class="form-control">
                                                        
                                            </div>
											<div class="col-sm-4">
												<label>จำนวนเงินตั้ง <span class="text-danger">*</span></label>
												<input type="text" name="ns_money_fund" class="form-control">
											</div>

											<div class="col-sm-4">
												<label>ค่าดูแลวง <span class="text-danger">*</span></label>
												<input type="text" name="sn_supervise"  class="form-control">
											</div>
										</div>
									</div>
                                <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>หมายเหตุ</label>
												<textarea rows="5" cols="5" name="sn_note" class="form-control" placeholder="Default textarea"></textarea>
											</div>
										</div>
                                </div>
                            </fieldset>

                            <fieldset class="step" id="validation-step2">
                                <h6 class="form-wizard-title text-semibold">
                                    <span class="form-wizard-count">2</span>
                                    กำหนดจำนวนลูกแชร์
                                    <small class="display-block">กำหนดจำนวนลูกแชร์ สามารถข้ามได้ </small>
                                </h6>
                                <div class="form-group">
										<div class="row">
                                            <div class="col-sm-3">
                                                    <label>รูปแบบระยะเวลาการเล่นแชร์<span class="text-danger">*</span></label>
                                                       <select name="sn_play_share"  class="form-control select style_share">
                                                           <option value="1">กำหนดระยะวัน</option>
                                                           <option value="2">กำหนดจ่ายทุกวันที่</option>
                                                       </select>
                                            </div>
                                            <div class=" style_date" >
                                                <div class="col-sm-3 ">
                                                        <label>กำหนดระยะวัน<span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">แชร์ราย</span>
                                                            <input type="number" name="sn_play_share_date" class="form-control" >
                                                        <span class="input-group-addon">วัน</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" style_every_day"  style="display: none;">
                                                <div class="col-sm-4" >
                                                        <label>กำหนดจ่ายทุกวันที่<span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">ทุกวันที่</span>
                                                            <select name="sn_play_share_date" id="" class="form-control ">
                                                                @for ($i = 1; $i <= 31; $i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        <span class="input-group-addon">ของทุกเดือน</span>
                                                    </div>
                                                </div>
                                            </div>

											<div class="col-sm-3">
                                                <label>จำนวนลูกแชร์<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                       
                                                        <input type="number" name="sn_number_share"  class="form-control">
                                                        <span class="input-group-addon">คน</span>
                                                    </div>
                                                
                                            </div>
                                            {{-- <div class="col-sm-2">
                                                <label>แชร์รายกี่วัน</label>
                                                <input type="text"  name="bs_nickname" class="form-control">
                                            </div> --}}
										</div>
								</div>

                            </fieldset>
                              
                               

								<div class="modal-footer form-wizard-actions">
                                        
                                    <button class="btn btn-default" id="step-back" type="reset">Back</button>
                                    <button class="btn btn-info" id="step-next" type="submit">Next</button>
                                        
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
</div>
</div>

</div>

        
@endsection
