@extends('layout/admin_dashboard')
@extends('layout/details')
@section('analysis')
<div class="row mx-1">
    @foreach($users as $user)
    @if($user->notification_type=="no_icon")
    <div class="col-md-4 mt-1 mb-1 mt-5" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_1" data-type="no_icon">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name &nbsp;</span><i class="fa fa-angle-down font-weight-bold" style="border-radius: 50%; border: 1px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title" style="font-size: 14px;"><span></span><a>{{$user->title}}</a></div>
                        <div class="mb-3 edit_body" style="font-size: 13px;"><span></span><a>{{$user->body}}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif($user->notification_type=="right_icon")
    <div class="col-md-4 mt-1 mb-1 mt-5" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_2" data-type="right_icon">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name &nbsp;</span><i class="fa fa-angle-down font-weight-bold" style="border-radius: 50%; border: 1px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title" style="font-size: 14px;"><span></span><a>{{$user->title}}</a></div>
                        <div class="mb-0 edit_body" style="font-size: 13px;"><span></span><a>{{$user->body}}</a></div>
                    </div>
                    <div style="width: 20%;"><img src="{{asset("$user->icon")}}" width="50" height="50" class="mt-3 edit_icon" style="float: right;border: 1px solid black"></div>
                </div>
            </div>
        </div>
    </div>
    @elseif($user->notification_type=="left_icon")
    <div class="col-md-4 mt-1 mb-1 mt-5" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_3" data-type="left_icon">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="width: 15%;"><img src="{{asset("$user->icon")}}" width="50" height="50" class="mt-0 edit_icon" style="float:left;border: 1px solid black"></div>
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name &nbsp;</span></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title" style="font-size: 14px;"><span></span><a>{{$user->title}}</a></div>
                        <div class="mb-0 edit_body" style="font-size: 13px;"><span></span><a>{{$user->body}}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif($user->notification_type=="right_icon_long")
    <div class="col-md-4 mt-1 mb-1 mt-5" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_4" data-type="right_icon_long">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name . <span class="edit_summary font-weight-bold">{{$user->summary}}</span> &nbsp;</span><i class="fa fa-angle-down font-weight-bold expand_arrow_show4 expand_arrow_show4_{{$user->id}}" data-id="{{$user->id}}" style="display: none; border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i><i class="fa fa-angle-up font-weight-bold expand_arrow_hide4 expand_arrow_hide4_{{$user->id}}" data-id="{{$user->id}}" style="border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title edit_title4_{{$user->id}}" style="display: none;font-size: 13px;"><span></span><a>{{$user->title}}</a></div>
                        <div class="mb-0 edit_body edit_body4_{{$user->id}}" style="display: none;font-size: 12px;"><span></span><a>{{$user->body}}</a></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title_long edit_title_long4_{{$user->id}}" style="font-size: 13px;"><span></span><a>{{$user->title_long}}</a></div>
                        <div class="mb-5  edit_body_long edit_body_long4_{{$user->id}}" style="font-size:12px;"><span></span><a>{{$user->body_long}}</a></div>
                    </div>
                    <div style="width: 20%;"><img src="{{asset("$user->icon")}}" width="50" height="50" class="mt-3 edit_icon" style="float: right;border: 1px solid black"></div>
                </div>
            </div>
        </div>
    </div>
    @elseif($user->notification_type=="no_icon_long")
    <div class="col-md-4 mt-1 mb-1 mt-5" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_5" data-type="no_icon_long">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name . <span class="edit_summary font-weight-bold">{{$user->summary}}</span> &nbsp;</span><i class="fa fa-angle-down font-weight-bold expand_arrow_show5 expand_arrow_show5_{{$user->id}}" data-id="{{$user->id}}" style="display: none; border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i><i class="fa fa-angle-up font-weight-bold expand_arrow_hide5 expand_arrow_hide5_{{$user->id}}" data-id="{{$user->id}}" style="border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title edit_title5_{{$user->id}}" style="display: none;font-size: 13px;"><span></span><a>{{$user->title}}</a></div>
                        <div class="mb-0 edit_body edit_body5_{{$user->id}}" style="display: none;font-size: 12px;"><span></span><a>{{$user->body}}</a></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title_long edit_title_long5_{{$user->id}}" style="font-size: 13px;"><span></span><a>{{$user->title_long}}</a></div>
                        <div class="mb-5  edit_body_long edit_body_long5_{{$user->id}}" style="font-size:12px;"><span></span><a>{{$user->body_long}}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif($user->notification_type=="no_icon_image")
    <div class="col-md-4 mt-1 mb-1 mt-5" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_6" data-type="no_icon_image">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name </span><i class="fa fa-angle-down font-weight-bold expand_arrow_show6 expand_arrow_show6_{{$user->id}}" data-id="{{$user->id}}" style="display: none; border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i><i class="fa fa-angle-up font-weight-bold expand_arrow_hide6 expand_arrow_hide6_{{$user->id}}" data-id="{{$user->id}}" style="border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title_{{$user->id}}" style="font-size: 13px;"><span></span><a>{{$user->title}}</a></div>
                        <div class="mb-0 edit_body_{{$user->id}}" style="font-size:12px;"><span></span><a>{{$user->body}}</a></div>
                    </div>
                    <div style="width: 100%;"><img src="{{asset("$user->image")}}" style="width: 100%;border: 1px solid black" height="200px" class="edit_image edit_image6_{{$user->id}} mt-3"></div>
                </div>
            </div>
        </div>
    </div>
    @elseif($user->notification_type=="right_icon_image_hide")
    <div class="col-md-4 mt-1 mb-1 mt-5" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_7" data-type="right_icon_image_hide">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name </span><i class="fa fa-angle-down font-weight-bold expand_arrow_show7 expand_arrow_show7_{{$user->id}}" data-id="{{$user->id}}" style="display: none; border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i><i class="fa fa-angle-up font-weight-bold expand_arrow_hide7 expand_arrow_hide7_{{$user->id}}" data-id="{{$user->id}}" style="border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title_{{$user->id}}" style="font-size: 13px;"><span></span><a>{{$user->title}}</a></div>
                        <div class="mb-0 edit_body_{{$user->id}}" style="font-size:12px;"><span></span><a>{{$user->body}}</a></div>
                    </div>
                    <div style="width: 20%;"><img src="{{asset("$user->icon")}}" width="50" height="50" class="mt-3 edit_icon edit_icon7_{{$user->id}}" style="float: right;border: 1px solid black;display: none;"></div>
                    <div style="width: 100%;"><img src="{{asset("$user->image")}}" style="width: 100%;border: 1px solid black" height="200px" class="edit_image edit_image7_{{$user->id}} mt-3"></div>
                </div>
            </div>
        </div>
    </div>
    @elseif($user->notification_type=="right_icon_image_show")
    <div class="col-md-4 mt-1 mb-1 mt-5" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_8" data-type="right_icon_image_show">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name </span><i class="fa fa-angle-down font-weight-bold expand_arrow_show8 expand_arrow_show8_{{$user->id}}" data-id="{{$user->id}}" style="display: none; border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i><i class="fa fa-angle-up font-weight-bold expand_arrow_hide8 expand_arrow_hide8_{{$user->id}}" data-id="{{$user->id}}" style="border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title_{{$user->id}}" style="font-size: 13px;"><span></span><a>{{$user->title}}</a></div>
                        <div class="mb-0 edit_body_{{$user->id}}" style="font-size:12px;"><span></span><a>{{$user->body}}</a></div>
                    </div>
                    <div style="width: 20%;"><img src="{{asset("$user->icon")}}" width="50" height="50" class="mt-3 edit_icon" style="float: right;border: 1px solid black"></div>
                    <div style="width: 100%;"><img src="{{asset("$user->image")}}" style="width: 100%;border: 1px solid black" height="200px" class="edit_image edit_image8_{{$user->id}} mt-3"></div>
                </div>
            </div>
        </div>
    </div>
    @elseif($user->notification_type=="no_icon_lines")
    <div class="col-md-4 mt-1 mb-1 mt-5" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_9" data-type="no_icon_lines">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name . <span class="edit_summary font-weight-bold">{{$user->summary}}</span> &nbsp;</span><i class="fa fa-angle-down font-weight-bold expand_arrow_show9 expand_arrow_show9_{{$user->id}}" data-id="{{$user->id}}" style="display: none;border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i><i class="fa fa-angle-up font-weight-bold expand_arrow_hide9 expand_arrow_hide9_{{$user->id}}" data-id="{{$user->id}}" style="border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title edit_title9_{{$user->id}}" style="display: none;font-size: 13px;"><span></span><a>{{$user->title}}</a></div>
                        <div class="mb-0 edit_body edit_body9_{{$user->id}}" style="display: none; font-size:12px;"><span></span><a>{{$user->body}}</a></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title_line edit_title_line_9_{{$user->id}}" style="font-size: 13px;"><span></span><a>{{$user->title_line}}</a></div>
                        <div class="mb-0 edit_body_line1 edit_body_line_9_1_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line1 !=NULL){{$user->body_line1}}@endif</a></div>
                        <div class="mb-0 edit_body_line2 edit_body_line_9_2_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line2 !=NULL){{$user->body_line2}}@endif</a></div>
                        <div class="mb-0 edit_body_line3 edit_body_line_9_3_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line3 !=NULL){{$user->body_line3}}@endif</a></div>
                        <div class="mb-0 edit_body_line4 edit_body_line_9_4_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line4 !=NULL){{$user->body_line4}}@endif</a></div>
                        <div class="mb-0 edit_body_line5 edit_body_line_9_5_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line5 !=NULL){{$user->body_line5}}@endif</a></div>
                        <div class="mb-0 edit_body_line6 edit_body_line_9_6_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line6 !=NULL){{$user->body_line6}}@endif</a></div>
                        <div class="mb-0 edit_body_line7 edit_body_line_9_7_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line7 !=NULL){{$user->body_line7}}@endif</a></div>
                        <div class="mb-0 edit_body_line8 edit_body_line_9_8_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line8 !=NULL){{$user->body_line8}}@endif</a></div>
                        <div class="mb-0 edit_body_line9 edit_body_line_9_9_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line9 !=NULL){{$user->body_line9}}@endif</a></div>
                        <div class="mb-0 edit_body_line10 edit_body_line_9_10_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line10 !=NULL){{$user->body_line10}}@endif</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif($user->notification_type=="right_icon_lines")
    <div class="col-md-4 mt-1 mb-1 mt-5" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_10" data-type="right_icon_lines">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name . <span class="edit_summary font-weight-bold">{{$user->summary}}</span> &nbsp;</span><i class="fa fa-angle-down font-weight-bold expand_arrow_show10 expand_arrow_show10_{{$user->id}}" data-id="{{$user->id}}" style="display: none;border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i><i class="fa fa-angle-up font-weight-bold expand_arrow_hide10 expand_arrow_hide10_{{$user->id}}" data-id="{{$user->id}}" style="border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title edit_title10_{{$user->id}}" style="display: none;font-size: 13px;"><span></span><a>{{$user->title}}</a></div>
                        <div class="mb-0 edit_body edit_body10_{{$user->id}}" style="display: none; font-size:12px;"><span></span><a>{{$user->body}}</a></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title_line edit_title_line_10_{{$user->id}}" style="font-size: 13px;"><span></span><a>{{$user->title_line}}</a></div>
                        <div class="mb-0 edit_body_line1 edit_body_line_10_1_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line1 !=NULL){{$user->body_line1}}@endif</a></div>
                        <div class="mb-0 edit_body_line2 edit_body_line_10_2_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line2 !=NULL){{$user->body_line2}}@endif</a></div>
                        <div class="mb-0 edit_body_line3 edit_body_line_10_3_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line3 !=NULL){{$user->body_line3}}@endif</a></div>
                        <div class="mb-0 edit_body_line4 edit_body_line_10_4_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line4 !=NULL){{$user->body_line4}}@endif</a></div>
                        <div class="mb-0 edit_body_line5 edit_body_line_10_5_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line5 !=NULL){{$user->body_line5}}@endif</a></div>
                        <div class="mb-0 edit_body_line6 edit_body_line_10_6_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line6 !=NULL){{$user->body_line6}}@endif</a></div>
                        <div class="mb-0 edit_body_line7 edit_body_line_10_7_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line7 !=NULL){{$user->body_line7}}@endif</a></div>
                        <div class="mb-0 edit_body_line8 edit_body_line_10_8_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line8 !=NULL){{$user->body_line8}}@endif</a></div>
                        <div class="mb-0 edit_body_line9 edit_body_line_10_9_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line9 !=NULL){{$user->body_line9}}@endif</a></div>
                        <div class="mb-0 edit_body_line10 edit_body_line_10_10_{{$user->id}}" style="font-size:12px;"><span></span><a>@if($user->body_line10 !=NULL){{$user->body_line10}}@endif</a></div>
                    </div>
                    <div style="width: 20%;"><img src="{{asset("$user->icon")}}" width="50" height="50" class="edit_icon edit_icon10" style="float: right;border: 1px solid black;margin-top: -70px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
<div class="col-md-6 px-3 mt-5 mb-1">
    <link rel="stylesheet" type="text/css" href="{{ asset('table/css/main_publish_option.css')}}">
    <link href="{{ asset('adminsa/bootstrap/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">
    <?php $date = new \DateTime();
$timer=date_format($date, 'Y-m-d H:i:s');?>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <li>Publish failed</li>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success">
        <li>Publish Successfully</li>
    </div>
    @endif
    <form class="form-group" method="POST" action="{{ route('admin-publish_notification_submit') }}">
        {{ csrf_field()}}
        <!-- ----------------------------------------- option menu------------------------------------ -->
        <select id="send_to" class="form-control inputs" name="send_to">
            <option value="" selected='true'>Send To</option>
            <option value="All Students">Send to : All Students</option>
            <option value="Class">Send to : Class</option>
            <option value="Course">Send to : Course</option>
            <option value="Course Type">Send to : Course Type</option>
            <option value="Group">Send to : Group</option>
            <option value="Student">Send to : Student</option>
            <option value="Teacher">Send to : Teacher</option>
        </select>
        <select id="class" class="form-control inputs mt-1" name="class" style="display: none;">
            <option value="" selected='true'>Class</option>
            <option value="8th">8th</option>
            <option value="9th">9th</option>
            <option value="10th">10th</option>
            <option value="11th">11th</option>
            <option value="12th">12th</option>
            <option value="Repeater">Repeater</option>
        </select>
        <select id="course" class="form-control inputs  mt-1" name="course" style="display: none;">
            <option value="" selected='true'>Course</option>
            <option value="Foundation">Foundation</option>
            <option value="JEE Main">JEE Main</option>
            <option value="JEE (Main + Advance)">JEE (Main + Advance)</option>
            <option value="NEET">NEET</option>
            <option value="NEET + AIIMS">NEET + AIIMS</option>
            <option value="MHT-CET">MHT-CET</option>
            <option value="Classroom Test">Classroom Test</option>
        </select>
        <select id="coursetype" class="form-control inputs mt-1" name="coursetype" style="display: none;">
            <option value="" selected='true'>Course Type</option>
            <option value="Classroom Course">Classroom Course</option>
            <option value="Crash Course">Crash Course</option>
            <option value="Distance Learning">Distance Learning</option>
        </select>
        <div class="time inputs  mt-1" style="display: none;">
            <label for="dtp_input1" class="col-lg-12 control-label">Publish Time</label>
            <div class="input-group date form_datetime" data-date="{{$timer}}" data-date-format="dd-mm-yyyy hh:ii:ss" data-link-field="dtp_input1">
                <input class="form-control" size="19" type="text" value="" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
            </div>
            <input type="hidden" id="dtp_input1" name="publishtime" value="" /><br />
        </div>
        <div id="group_div" class="inputs  mt-1" style="display: none;">
            <label>Group</label>
            <input style="display: none;" type="radio" name="group" class="group" value="" checked="true"></input>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A<input type="radio" name="group" class="group" value="A">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B<input type="radio" name="group" class="group" value="B">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C<input type="radio" name="group" class="group" value="C">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D<input type="radio" name="group" class="group" value="D">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E<input type="radio" name="group" class="group" value="E">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F<input type="radio" name="group" class="group" value="F">
        </div>
        <select id="user" class="form-control inputs  mt-1" name="user" style="display: none;">
            <option value="">Select Person</option>
        </select>
    </form>
    <!-- -------------------------------------------------------------------option menu end-------------------------- -->
    <div class="col-lg-12" style="margin-top: 20px;">
        <button id="submit" type="submit" style="background-color: #fd6e70;display: none;" class="btn btn-block btn-lg  inputs" name="reg_user" onclick="save()">Publish</button>
    </div>
</div>
</div>
<style type="text/css">
.header h2 {
    margin-left: 36%;
    color: #4f4f4f;
    padding-top: 8%;
    font-family: 'Arial Black', Gadget, sans-serif;
    margin-bottom: 20px;
}

#class {
    margin-bottom: 2px;
}

#course1 {
    margin-bottom: 2px;
}

#course2 {
    margin-bottom: 2px;
}

#coursetype {
    margin-bottom: 4px;
}

</style>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('adminsa/bootstrap/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
<script type="text/javascript" src="{{ asset('adminsa/bootstrap/js/bootstrap-datetimepicker.fr.js') }}" charset="UTF-8"></script>
<script type="text/javascript">
$(".expand_arrow_show4").on("click", function() {
    var id = $(this).data('id');
    $(".edit_title4_" + id).hide();
    $(".edit_body4_" + id).hide();
    $(".edit_title_long4_" + id).show();
    $(".edit_body_long4_" + id).show();
    $(".expand_arrow_show4_" + id).hide();
    $(".expand_arrow_hide4_" + id).show();
});
$(".expand_arrow_hide4").on("click", function() {
    var id = $(this).data('id');
    $(".edit_title_long4_" + id).hide();
    $(".edit_body_long4_" + id).hide();
    $(".edit_title4_" + id).show();
    $(".edit_body4_" + id).show();
    $(".expand_arrow_hide4_" + id).hide();
    $(".expand_arrow_show4_" + id).show();
});
$(".expand_arrow_show5").on("click", function() {
    var id = $(this).data('id');
    $(".edit_title5_" + id).hide();
    $(".edit_body5_" + id).hide();
    $(".edit_title_long5_" + id).show();
    $(".edit_body_long5_" + id).show();
    $(".expand_arrow_show5_" + id).hide();
    $(".expand_arrow_hide5_" + id).show();
});
$(".expand_arrow_hide5").on("click", function() {
    var id = $(this).data('id');
    $(".edit_title_long5_" + id).hide();
    $(".edit_body_long5_" + id).hide();
    $(".edit_title5_" + id).show();
    $(".edit_body5_" + id).show();
    $(".expand_arrow_hide5_" + id).hide();
    $(".expand_arrow_show5_" + id).show();
});
$(".expand_arrow_show6").on("click", function() {
    var id = $(this).data('id');
    $(".edit_image6_" + id).show();
    $(".expand_arrow_show6_" + id).hide();
    $(".expand_arrow_hide6_" + id).show();
});
$(".expand_arrow_hide6").on("click", function() {
    var id = $(this).data('id');
    $(".edit_image6_" + id).hide();
    $(".expand_arrow_hide6_" + id).hide();
    $(".expand_arrow_show6_" + id).show();
});
$(".expand_arrow_show7").on("click", function() {
    var id = $(this).data('id');
    $(".edit_image7_" + id).show();
    $(".edit_icon7_" + id).hide();
    $(".expand_arrow_show7_" + id).hide();
    $(".expand_arrow_hide7_" + id).show();
});
$(".expand_arrow_hide7").on("click", function() {
    var id = $(this).data('id');
    $(".edit_image7_" + id).hide();
    $(".edit_icon7_" + id).show();
    $(".expand_arrow_hide7_" + id).hide();
    $(".expand_arrow_show7_" + id).show();
});
$(".expand_arrow_show8").on("click", function() {
    var id = $(this).data('id');
    $(".edit_image8_" + id).show();
    $(".expand_arrow_show8_" + id).hide();
    $(".expand_arrow_hide8_" + id).show();
});
$(".expand_arrow_hide8").on("click", function() {
    var id = $(this).data('id');
    $(".edit_image8_" + id).hide();
    $(".expand_arrow_hide8_" + id).hide();
    $(".expand_arrow_show8_" + id).show();
});
$(".expand_arrow_show9").on("click", function() {
    var id = $(this).data('id');
    $(".edit_title9_" + id).hide();
    $(".edit_body9_" + id).hide();
    $(".edit_title_line_9_" + id).show();
    $(".edit_body_line_9_1_" + id).show();
    $(".edit_body_line_9_2_" + id).show();
    $(".edit_body_line_9_3_" + id).show();
    $(".edit_body_line_9_4_" + id).show();
    $(".edit_body_line_9_5_" + id).show();
    $(".edit_body_line_9_6_" + id).show();
    $(".edit_body_line_9_7_" + id).show();
    $(".edit_body_line_9_8_" + id).show();
    $(".edit_body_line_9_9_" + id).show();
    $(".edit_body_line_9_10_" + id).show();
    $(".expand_arrow_show9_" + id).hide();
    $(".expand_arrow_hide9_" + id).show();
});
$(".expand_arrow_hide9").on("click", function() {
    var id = $(this).data('id');
    $(".edit_title_line_9_" + id).hide();
    $(".edit_body_line_9_1_" + id).hide();
    $(".edit_body_line_9_2_" + id).hide();
    $(".edit_body_line_9_3_" + id).hide();
    $(".edit_body_line_9_4_" + id).hide();
    $(".edit_body_line_9_5_" + id).hide();
    $(".edit_body_line_9_6_" + id).hide();
    $(".edit_body_line_9_7_" + id).hide();
    $(".edit_body_line_9_8_" + id).hide();
    $(".edit_body_line_9_9_" + id).hide();
    $(".edit_body_line_9_10_" + id).hide();
    $(".edit_title9_" + id).show();
    $(".edit_body9_" + id).show();
    $(".expand_arrow_hide9_" + id).hide();
    $(".expand_arrow_show9_" + id).show();
});
$(".expand_arrow_show10").on("click", function() {
    var id = $(this).data('id');
    $(".edit_title10_" + id).hide();
    $(".edit_body10_" + id).hide();
    $(".edit_title_line_10_" + id).show();
    $(".edit_body_line_10_1_" + id).show();
    $(".edit_body_line_10_2_" + id).show();
    $(".edit_body_line_10_3_" + id).show();
    $(".edit_body_line_10_4_" + id).show();
    $(".edit_body_line_10_5_" + id).show();
    $(".edit_body_line_10_6_" + id).show();
    $(".edit_body_line_10_7_" + id).show();
    $(".edit_body_line_10_8_" + id).show();
    $(".edit_body_line_10_9_" + id).show();
    $(".edit_body_line_10_10_" + id).show();
    $('.edit_icon10').css('margin-top', '-70px');
    $(".expand_arrow_show10_" + id).hide();
    $(".expand_arrow_hide10_" + id).show();
});
$(".expand_arrow_hide10").on("click", function() {
    var id = $(this).data('id');
    $(".edit_title_line_10_" + id).hide();
    $(".edit_body_line_10_1_" + id).hide();
    $(".edit_body_line_10_2_" + id).hide();
    $(".edit_body_line_10_3_" + id).hide();
    $(".edit_body_line_10_4_" + id).hide();
    $(".edit_body_line_10_5_" + id).hide();
    $(".edit_body_line_10_6_" + id).hide();
    $(".edit_body_line_10_7_" + id).hide();
    $(".edit_body_line_10_8_" + id).hide();
    $(".edit_body_line_10_9_" + id).hide();
    $(".edit_body_line_10_10_" + id).hide();
    $(".edit_title10_" + id).show();
    $(".edit_body10_" + id).show();
    $('.edit_icon10').css('margin-top', '5px');
    $(".expand_arrow_hide10_" + id).hide();
    $(".expand_arrow_show10_" + id).show();
});

$('#send_to').on('change', function() {
    var type = $(this).val();
    switch (type) {
        case "All Students":
            $('.inputs').hide();
            $(".time").show();
            $("#submit").show();
            $("#send_to").show();
            break;
        case "Class":
            $('.inputs').hide();
            $("#class").show();
            $(".time").show();
            $("#submit").show();
            $("#send_to").show();
            break;
        case "Course":
            $('.inputs').hide();
            $("#class").show();
            $("#course").show();
            $(".time").show();
            $("#submit").show();
            $("#send_to").show();
            break;
        case "Course Type":
            $('.inputs').hide();
            $("#class").show();
            $("#course").show();
            $("#coursetype").show();
            $(".time").show();
            $("#submit").show();
            $("#send_to").show();
            break;
        case "Group":
            $('.inputs').hide();
            $("#class").show();
            $("#course").show();
            $("#coursetype").show();
            $("#group_div").css('display', 'flex');
            $(".time").show();
            $("#submit").show();
            $("#send_to").show();
            break;
        case "Student":
            student_list();
            $('.inputs').hide();
            $("#class").show();
            $("#course").show();
            $("#coursetype").show();
            $("#group_div").css('display', 'flex');
            $("#user").show();
            $(".time").show();
            $("#submit").show();
            $("#send_to").show();
            break;
        case "Teacher":
            teacher_list();
            $('.inputs').hide();
            $("#user").show();
            $(".time").show();
            $("#submit").show();
            $("#send_to").show();
            break;
        case "":
            $('.inputs').hide();
            $("#send_to").show();
            break;
    }
});
$('.group').on('click', function() {
    student_list();
});
$('#class').on('change', function() {
    student_list();
});
$('#course').on('change', function() {
    student_list();
});
$('#coursetype').on('change', function() {
    student_list();
});

function student_list() {
    var type = "student";
    var send_to = $('select[name=send_to] option').filter(':selected').val();
    var classid = $('select[name=class] option').filter(':selected').val();
    var courseid = $('select[name=course] option').filter(':selected').val();
    var coursetypeid = $('select[name=coursetype] option').filter(':selected').val();
    var groupid = $("input[name='group']:checked").val();
    $('#user').empty().html("");
    $('#user').append("<option value=''>Select Student</option>");
    if (send_to == 'Student' && classid != '' && courseid != '' && coursetypeid != '' && groupid != '') {
        //alert(send_to+classid+courseid+coursetypeid+groupid);

        var loading = document.getElementById('loading');
        loading.style.display = '';
        $.ajax({
            type: 'POST',
            url: '{{ route('
            admin - person_list ') }}',
            data: {
                '_token': $('input[name=_token]').val(),
                'type': type,
                'class': classid,
                'course': courseid,
                'coursetype': coursetypeid,
                'group': groupid
            },
            success: function(data) {
                $("#loading").fadeOut(500);
                for (var i = 0; i < data.length; i++) {
                    $('#user').append("<option data-name='" + data[i].name + "' data-type='Student' value='" + data[i].id + "'>" + data[i].name + "</option>");
                }
            },
        });

    }
}

function teacher_list() {
    var type = "teacher";
    $('#user').empty().html("");
    var loading = document.getElementById('loading');
    loading.style.display = '';
    $.ajax({
        type: 'POST',
        url: '{{ route('
        admin - person_list ') }}',
        data: {
            '_token': $('input[name=_token]').val(),
            'type': type
        },
        success: function(data) {
            $("#loading").fadeOut(500);
            $('#user').append("<option value=''>Select Teacher</option>");
            for (var i = 0; i < data.length; i++) {
                $('#user').append("<option data-name='" + data[i].name + "' data-type='Teacher' value='" + data[i].id + "'>" + data[i].name + "</option>");
            }
        },
    });
}

function save() {
    var count = 0;
    var val = $('select[name=send_to] option').filter(':selected').val();
    var classid = $('select[name=class] option').filter(':selected').val();
    var courseid = $('select[name=course] option').filter(':selected').val();
    var coursetypeid = $('select[name=coursetype] option').filter(':selected').val();
    var groupid = $("input[name='group']:checked").val();
    var publishtime = $('#dtp_input1').val();
    var userid = $('select[name=user] option').filter(':selected').val();
    var username = $('select[name=user] option').filter(':selected').data('name');
    var usertype = $('select[name=user] option').filter(':selected').data('type');
    if (val == "") {
        count = 1;
    } else if (val == "All Students" && publishtime == '') {
        count = 1;
    } else if (val == "Class" && (publishtime == '' || classid == '')) {
        count = 1;
    } else if (val == "Course" && (publishtime == '' || classid == '' || courseid == '')) {
        count = 1;
    } else if (val == "Course Type" && (publishtime == '' || classid == '' || courseid == '' || coursetypeid == '')) {
        count = 1;
    } else if (val == "Group" && (publishtime == '' || classid == '' || courseid == '' || coursetypeid == '' || groupid == '')) {
        count = 1;
    } else if (val == "Student" && (publishtime == '' || classid == '' || courseid == '' || coursetypeid == '' || groupid == '' || userid == '')) {
        count = 1;
    } else if (val == "Teacher" && (publishtime == '' || classid == '' || courseid == '' || coursetypeid == '' || groupid == '' || userid == '')) {
        count = 1;
    }
    if (count == 1) {
        $('.socket_title').text('Warning...');
        $('.socket_body').empty().html("Please Fill All Fields...");
        $(".spinner").hide();
        $("#socket").show("closed");
        count = 1;
    } else if (count == 0) {
        $('.socket_title').text('Publishing...');
        $('.socket_body').empty().html("Please wait... while Sending Notification...");
        $(".spinner").show();
        $("#socket").show("closed");
        $.ajax({
            type: 'POST',
            url: '{{ route('
            admin - publish_notification_submit ') }}',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': '{{app('
                request ')->input('
                id ')}}',
                'send_to': val,
                'class': classid,
                'course': courseid,
                'coursetype': coursetypeid,
                'group': groupid,
                'user_id': userid,
                'user_name': username,
                'user_type': usertype,
                'publishtime': publishtime
            },
            success: function(data) {
                $('.socket_title').text('Published...');
                $('.socket_body').empty().html("<p>Notification Published Successfully...<br><a href='{{ route('admin-notification_templates') }}' class='btn btn-success' style='padding:1px 6px;font-size:13px;'>Go to Notifications</a>");
                $(".spinner").hide();
            },
        });
    }
}
$('.form_datetime').datetimepicker({
    //language:  'fr',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1
});

$(".form_datetime").datetimepicker({
    format: "dd-mm-yyyy hh:ii:ss",
    autoclose: true,
    todayBtn: true,
    startDate: "01-03-2019 00:00",
    minuteStep: 10
});

</script>
@endsection
