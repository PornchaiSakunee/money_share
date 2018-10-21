@extends('layouts.app_offic')
@section('script')
   
    <script type="text/javascript" src="{{asset('js/plugins/forms/wizards/steps.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/pages/wizard_steps.js')}}"></script>
    
@endsection

@section('content')
<meta name="_token" content="{{ csrf_token() }}" />  
    <div class="panel panel-flat border-top-xlg border-top-warning">
        <div class="panel-heading">
            <h6 class="panel-title"><span class="text-semibold">{{@trans('content.data_dorm')}}</span></h6>
        </div>
        
        <div class="panel-body">
            <form class="steps-validation_" action="#">
				
							<h6>Personal data</h6>
							<fieldset>
							<div class="row">
								<div class="col-md-5">
										<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label>{{@trans('content.name_dorm')}}: <span class="text-danger">*</span></label>
														<input type="text" name="name_dorm" class="form-control required" placeholder="{{@trans('content.name_dorm')}}">
													</div>
												</div>
												<div class="col-md-12">
														<div class="form-group">
															<label>{{@trans('content.phon')}}:<span class="text-danger">*</span></label>
															<input type="text" name="phone" class="form-control" placeholder="+99-99-9999-9999" data-mask="+99-99-9999-9999">
														</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label>{{@trans('content.email')}}: </label>
														<input type="email" name="email" class="form-control required" placeholder="your@email.com">
													</div>
												</div>
												
										</div>
								</div>
								<div class="col-md-7">
										<div class="row">
												<div class="col-md-12">
														<div class="form-group">
															<label>{{@trans('content.address')}}: <span class="text-danger">*</span></label>
															<input type="text" name="address" class="form-control required" placeholder="{{@trans('content.address')}}">
														</div>
												</div>
												<div class="col-md-12">
												
														<div class="row">
															<div class="col-md-4">
																<div class="form-group">
																	<label>{{@trans('content.province')}}: <span class="text-danger">*</span></label>
																	<select name="province"  data-placeholder="{{ @trans('content.province_select') }}" class="select province">
																		<option value=""></option>
																		@foreach ($province as $val_province)
																		{{-- <option value="s">s</option> --}}
																	<option value="{{$val_province->PROVINCE_ID}}">{{$val_province->PROVINCE_NAME}}</option>
																		@endforeach 
																		
																		
																	</select>
																</div>
															</div>
				
															<div class="col-md-4">
																<div class="form-group">
																	<label>{{@trans('content.amphures')}}: <span class="text-danger">*</span></label>
																	<select name="amphures" data-placeholder="{{@trans('content.amphures_select')}}" class="select amphures">
																		<option value=""></option>
																	</select>
																</div>
															</div>
				
															<div class="col-md-4">
																<div class="form-group">
																	<label>{{@trans('content.district')}}: <span class="text-danger">*</span></label>
																<select name="districts" data-placeholder="{{@trans('content.district_select')}}" class="select districts">
																		<option value=""></option>
																	</select>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-group">
																	<label>{{@trans('content.postcode')}}: <span class="text-danger">*</span></label>
																	<input type="text" name="postcode" maxlength="5" class="form-control required postcode" >
																</div>
															</div>	
														</div>
												</div>
			
												
										</div>
								</div>
							</div>
							</fieldset>

							<h6>Your education</h6>
							<fieldset>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="display-block text-semibold">Left inline styled</label>
											<label class="radio-inline">
												<input type="radio" name="radio-inline-left" class="styled" checked="checked">
												หอพักมีตึกเดียว
											</label>
	
											<label class="radio-inline">
												<input type="radio" name="radio-inline-left" class="styled">
												หอพักมีหลายตึก
											</label>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Degree level: <span class="text-danger">*</span></label>
			                                <input type="text" name="degree-level" placeholder="Bachelor, Master etc." class="form-control required">
		                                </div>

										<div class="form-group">
											<label>Specialization:</label>
			                                <input type="text" name="specialization" placeholder="Design, Development etc." class="form-control">
		                                </div>
									</div>

									<div class="col-md-6">
										<div class="row">
											<div class="col-md-6">
												<label>From:</label>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
						                                    <select name="education-from-month" data-placeholder="Month" class="select">
						                                    	<option></option>
						                                        <option value="January">January</option> 
						                                        <option value="...">...</option> 
						                                        <option value="December">December</option> 
						                                    </select>
					                                    </div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
						                                    <select name="education-from-year" data-placeholder="Year" class="select">
						                                        <option></option> 
						                                        <option value="1995">1995</option> 
						                                        <option value="...">...</option> 
						                                        <option value="1980">1980</option> 
						                                    </select>
					                                    </div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<label>To:</label>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
						                                    <select name="education-to-month" data-placeholder="Month" class="select">
						                                    	<option></option>
						                                        <option value="January">January</option> 
						                                        <option value="...">...</option> 
						                                        <option value="December">December</option> 
						                                    </select>
					                                    </div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
						                                    <select name="education-to-year" data-placeholder="Year" class="select">
						                                        <option></option> 
						                                        <option value="1995">1995</option> 
						                                        <option value="...">...</option> 
						                                        <option value="1980">1980</option> 
						                                    </select>
					                                    </div>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label>Language of education:</label>
			                                <input type="text" name="education-language" placeholder="English, German etc." class="form-control">
		                                </div>
									</div>
								</div>
							</fieldset>

							<h6>Your experience</h6>
							<fieldset>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Company: <span class="text-danger">*</span></label>
			                                <input type="text" name="experience-company" placeholder="Company name" class="form-control required">
		                                </div>

										<div class="form-group">
											<label>Position: <span class="text-danger">*</span></label>
			                                <input type="text" name="experience-position" placeholder="Company name" class="form-control required">
		                                </div>

										<div class="row">
											<div class="col-md-6">
												<label>From:</label>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
						                                    <select name="education-from-month" data-placeholder="Month" class="select">
						                                    	<option></option>
						                                        <option value="January">January</option> 
						                                        <option value="...">...</option> 
						                                        <option value="December">December</option> 
						                                    </select>
					                                    </div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
						                                    <select name="education-from-year" data-placeholder="Year" class="select">
						                                        <option></option> 
						                                        <option value="1995">1995</option> 
						                                        <option value="...">...</option> 
						                                        <option value="1980">1980</option> 
						                                    </select>
					                                    </div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<label>To:</label>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
						                                    <select name="education-to-month" data-placeholder="Month" class="select">
						                                    	<option></option>
						                                        <option value="January">January</option> 
						                                        <option value="...">...</option> 
						                                        <option value="December">December</option> 
						                                    </select>
					                                    </div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
						                                    <select name="education-to-year" data-placeholder="Year" class="select">
						                                        <option></option> 
						                                        <option value="1995">1995</option> 
						                                        <option value="...">...</option> 
						                                        <option value="1980">1980</option> 
						                                    </select>
					                                    </div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-6">
		                                <div class="form-group">
											<label>Brief description:</label>
		                                    <textarea name="experience-description" rows="4" cols="4" placeholder="Tasks and responsibilities" class="form-control"></textarea>
		                                </div>

										<div class="form-group">
											<label class="display-block">Recommendations:</label>
		                                    <input name="recommendations" type="file" class="file-styled">
		                                    <span class="help-block">Accepted formats: pdf, doc. Max file size 2Mb</span>
		                                </div>
									</div>
								</div>
							</fieldset>

							<h6>Additional info</h6>
							<fieldset>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="display-block">Applicant resume:</label>
		                                    <input type="file" name="resume" class="file-styled">
		                                    <span class="help-block">Accepted formats: pdf, doc. Max file size 2Mb</span>
	                                    </div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Where did you find us? <span class="text-danger">*</span></label>
		                                    <select name="source" data-placeholder="Choose an option..." class="select-simple required">
		                                        <option></option> 
		                                        <option value="monster">Monster.com</option> 
		                                        <option value="linkedin">LinkedIn</option> 
		                                        <option value="google">Google</option> 
		                                        <option value="adwords">Google AdWords</option> 
		                                        <option value="other">Other source</option>
		                                    </select>
	                                    </div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Availability: <span class="text-danger">*</span></label>
											<div class="radio">
												<label>
													<input type="radio" name="availability" class="styled required">
													Immediately
												</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="availability" class="styled">
													1 - 2 weeks
												</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="availability" class="styled">
													3 - 4 weeks
												</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="availability" class="styled">
													More than 1 month
												</label>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Additional information:</label>
		                                    <textarea name="additional-info" rows="5" cols="5" placeholder="If you want to add any info, do it here." class="form-control"></textarea>
	                                    </div>
									</div>
								</div>
							</fieldset>
						</form>
        </div>
    </div>
@endsection