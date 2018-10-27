@extends('layouts.app_offic')
@section('script')
<script type="text/javascript" src="{{asset('js/share/share_num.js')}}"></script>
{{-- <script type="text/javascript" src="{{asset('js/plugins/tables/handsontable/handsontable.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/tables/handsontable/languages.js')}}"></script> --}}
@endsection
@section('content')
<div class="row">
<div class="col-lg-12">
    <!-- Task manager table -->
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title">ลูกแชร์วง : {{$ns_name}}</h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <table class="table table_num table-lg">
            <thead>
                <tr>
                    <th style="width: 10%;">ลำดับมือ</th>
                    <th style="width: 20%;">วันที่ประจำงวด</th>
                    <th style="width: 30%">ชื่อลูกแชร์</th>
                    <th style="width: 15%;">จำนวนเงินรับ</th>
                    <th style="width: 15%;">จำนวนเงินแถม</th>
                    <th style="width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>#1</td>
                    <td>
                        <div class="input-group input-group-transparent">
                            <div class="input-group-addon"><i class="icon-calendar2 position-left"></i></div>
                            <input type="text" class="form-control datepicker" value="19 January, 15">
                        </div>
                    </td>
                    <td>
                        <div class="text-semibold"><a href="task_manager_detailed.html">Update User profile page</a></div>
                        <div class="text-muted">A small river named Duden flows by their place and supplies it..</div>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="#" class="label label-success dropdown-toggle" data-toggle="dropdown">Low <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><span class="status-mark position-left bg-danger"></span> Highest priority</a></li>
                                <li><a href="#"><span class="status-mark position-left bg-info"></span> High priority</a></li>
                                <li><a href="#"><span class="status-mark position-left bg-primary"></span> Normal priority</a></li>
                                <li class="active"><a href="#"><span class="status-mark position-left bg-success"></span> Low priority</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        
                    </td>
                    
                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-alarm-add"></i> Check in</a></li>
                                    <li><a href="#"><i class="icon-attachment"></i> Attach screenshot</a></li>
                                    <li><a href="#"><i class="icon-rotate-ccw2"></i> Reassign</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon-pencil7"></i> Edit task</a></li>
                                    <li><a href="#"><i class="icon-cross2"></i> Remove</a></li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /task manager table -->
</div>

</div>

        
@endsection
