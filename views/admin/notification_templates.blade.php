@extends('layout/admin_dashboard')
@extends('layout/details')
@section('analysis')
<div class="d-sm-flex justify-content-between align-items-center mb-4 pt-2">
    <h4 class="text-dark mb-0">Notifcation Templates&nbsp;<a class="btn btn-success" href="{{ route('admin-add_notification') }}" style="padding: 6px 8px;font-size: 13px;">Add Notification&nbsp;</a></h4>
</div>
<div class="row">
    @foreach($users as $user)
    @if($user->notification_type=="no_icon")
    <div class="col-md-4 mt-1 mb-1" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_1" data-type="no_icon">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%; padding-bottom: 2px;" class="text-dark font-weight-bold mb-1 text-xs" style="font-size:12px;"><span></span>
                        <a class="btn btn-success" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-publish_notification',['id'=>$user->id]) }}">Publish</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-info list_btn" data-id="{{$user->id}}">list <i>({{$user->count}})</i></a>&nbsp;
                        <a class="btn btn-primary" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-edit_notification',['id'=>$user->id]) }}">Edit</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_btn" data-id="{{$user->id}}">Delete</a>
                    </div>
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
    <div class="col-md-4 mt-1 mb-1" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_2" data-type="right_icon">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%; padding-bottom: 2px;" class="text-dark font-weight-bold mb-1 text-xs" style="font-size:12px;"><span></span>
                        <a class="btn btn-success" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-publish_notification',['id'=>$user->id]) }}">Publish</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-info list_btn" data-id="{{$user->id}}">list <i>({{$user->count}})</i></a>&nbsp;
                        <a class="btn btn-primary" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-edit_notification',['id'=>$user->id]) }}">Edit</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_btn" data-id="{{$user->id}}">Delete</a>
                    </div>
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
    <div class="col-md-4 mt-1 mb-1" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_3" data-type="left_icon">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%; padding-bottom: 2px;" class="text-dark font-weight-bold mb-1 text-xs" style="font-size:12px;"><span></span>
                        <a class="btn btn-success" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-publish_notification',['id'=>$user->id]) }}">Publish</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-info list_btn" data-id="{{$user->id}}">list <i>({{$user->count}})</i></a>&nbsp;
                        <a class="btn btn-primary" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-edit_notification',['id'=>$user->id]) }}">Edit</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_btn" data-id="{{$user->id}}">Delete</a>
                    </div>
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
    <div class="col-md-4 mt-1 mb-1" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_4" data-type="right_icon_long">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%; padding-bottom: 2px;" class="text-dark font-weight-bold mb-1 text-xs" style="font-size:12px;"><span></span>
                        <a class="btn btn-success" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-publish_notification',['id'=>$user->id]) }}">Publish</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-info list_btn" data-id="{{$user->id}}">list <i>({{$user->count}})</i></a>&nbsp;
                        <a class="btn btn-primary" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-edit_notification',['id'=>$user->id]) }}">Edit</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_btn" data-id="{{$user->id}}">Delete</a>
                    </div>
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
    <div class="col-md-4 mt-1 mb-1" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_5" data-type="no_icon_long">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%; padding-bottom: 2px;" class="text-dark font-weight-bold mb-1 text-xs" style="font-size:12px;"><span></span>
                        <a class="btn btn-success" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-publish_notification',['id'=>$user->id]) }}">Publish</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-info list_btn" data-id="{{$user->id}}">list <i>({{$user->count}})</i></a>&nbsp;
                        <a class="btn btn-primary" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-edit_notification',['id'=>$user->id]) }}">Edit</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_btn" data-id="{{$user->id}}">Delete</a>
                    </div>
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
    <div class="col-md-4 mt-1 mb-1" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_6" data-type="no_icon_image">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%; padding-bottom: 2px;" class="text-dark font-weight-bold mb-1 text-xs" style="font-size:12px;"><span></span>
                        <a class="btn btn-success" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-publish_notification',['id'=>$user->id]) }}">Publish</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-info list_btn" data-id="{{$user->id}}">list <i>({{$user->count}})</i></a>&nbsp;
                        <a class="btn btn-primary" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-edit_notification',['id'=>$user->id]) }}">Edit</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_btn" data-id="{{$user->id}}">Delete</a>
                    </div>
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
    <div class="col-md-4 mt-1 mb-1" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_7" data-type="right_icon_image_hide">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%; padding-bottom: 2px;" class="text-dark font-weight-bold mb-1 text-xs" style="font-size:12px;"><span></span>
                        <a class="btn btn-success" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-publish_notification',['id'=>$user->id]) }}">Publish</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-info list_btn" data-id="{{$user->id}}">list <i>({{$user->count}})</i></a>&nbsp;
                        <a class="btn btn-primary" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-edit_notification',['id'=>$user->id]) }}">Edit</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_btn" data-id="{{$user->id}}">Delete</a>
                    </div>
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
    <div class="col-md-4 mt-1 mb-1" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_8" data-type="right_icon_image_show">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%; padding-bottom: 2px;" class="text-dark font-weight-bold mb-1 text-xs" style="font-size:12px;"><span></span>
                        <a class="btn btn-success" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-publish_notification',['id'=>$user->id]) }}">Publish</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-info list_btn" data-id="{{$user->id}}">list <i>({{$user->count}})</i></a>&nbsp;
                        <a class="btn btn-primary" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-edit_notification',['id'=>$user->id]) }}">Edit</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_btn" data-id="{{$user->id}}">Delete</a>
                    </div>
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
    <div class="col-md-4 mt-1 mb-1" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_9" data-type="no_icon_lines">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%; padding-bottom: 2px;" class="text-dark font-weight-bold mb-1 text-xs" style="font-size:12px;"><span></span>
                        <a class="btn btn-success" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-publish_notification',['id'=>$user->id]) }}">Publish</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-info list_btn" data-id="{{$user->id}}">list <i>({{$user->count}})</i></a>&nbsp;
                        <a class="btn btn-primary" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-edit_notification',['id'=>$user->id]) }}">Edit</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_btn" data-id="{{$user->id}}">Delete</a>
                    </div>
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
    <div class="col-md-4 mt-1 mb-1" id="div_{{$user->id}}">
        <div class="card shadow mb-1 notification_type notification_type_10" data-type="right_icon_lines">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%; padding-bottom: 2px;" class="text-dark font-weight-bold mb-1 text-xs" style="font-size:12px;"><span></span>
                        <a class="btn btn-success" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-publish_notification',['id'=>$user->id]) }}">Publish</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-info list_btn" data-id="{{$user->id}}">list <i>({{$user->count}})</i></a>&nbsp;
                        <a class="btn btn-primary" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-edit_notification',['id'=>$user->id]) }}">Edit</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_btn" data-id="{{$user->id}}">Delete</a>
                    </div>
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
</div>
<style type="text/css">
.card-body {
    padding: .25rem 1.15rem;
}

.slidecontainer {
    width: 100%;
}

.slider {
    -webkit-appearance: none;
    width: 67%;
    height: 8px;
    padding: 0;
    border-radius: 5px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #4CAF50;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #4CAF50;
    cursor: pointer;
}

::-webkit-scrollbar {
    width: 5px;
    /* Remove scrollbar space */
    background: transparent;
    /* Optional: just make scrollbar invisible */
}

/* Optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #1cc88a;
}

.description {
    font-size: 12px;
}

.description p {
    margin: 0;
}

</style>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('adminsa/bootstrap/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
<script type="text/javascript" src="{{ asset('adminsa/bootstrap/js/bootstrap-datetimepicker.fr.js') }}" charset="UTF-8"></script>
<script type="text/javascript">
$(document).ready(function() {
    var width = $(".card-body").width();
    width = width / 2;
    $('.big_image').css('max-height', width + 'px');
    $('.big_image').css('height', width + 'px');
    Window.type = '';
    Window.image == '';
    Window.icon == '';

});
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


function imageExists(url, callback) {
    var img = new Image();
    img.onload = function() { callback(true); };
    img.onerror = function() { callback(false); };
    img.src = url;
}

$(".expand_arrow_hide10").on("click", function() {

});

function save() {
    var count = 0;
    if (Window.type == '') {
        $('.socket_title').text('Warning...');
        $('.socket_body').empty().html("<p>Please Select Notification Type...");
        $(".spinner").hide();
        $("#socket").show("closed");
        count = 1;

    } else {
        $(".input_ck").each(function() {
            if ($(this).css('display') != 'none' && $(this).val() == '') {
                $(this).css('background', '#e74a3b47');
                count = 1;
            } else {
                console.log($(this).val());
            }
            if ($("#image").css('display') != 'none' && $("#image").val() != '' && Window.image == 'false') {
                $('.socket_title').text('Warning...');
                $('.socket_body').empty().html("<p>Please Input a currect image url...");
                $(".spinner").hide();
                $("#socket").show("closed");
                count = 1;
            }
            if ($("#icon").css('display') != 'none' && $("#icon").val() != '' && Window.icon == 'false') {
                $('.socket_title').text('Warning...');
                $('.socket_body').empty().html("<p>Please Input a currect icon url...");
                $(".spinner").hide();
                $("#socket").show("closed");
                count = 1;
            }
        });
    }
    if (count == 0) {
        var loading = document.getElementById('loading');
        loading.style.display = '';
        $.ajax({
            type: 'POST',
            url: '{{ route('
            admin - add_notification_submit ') }}',
            data: {
                '_token': $('input[name=_token]').val(),
                'summary': $('#summary').val(),
                'title': $('#title').val(),
                'body': $('#body').val(),
                'title_long': $('#title_long').val(),
                'body_long': $('#body_long').val(),
                'title_line': $('#title_line').val(),
                'body_line1': $('#body_line1').val(),
                'body_line2': $('#body_line2').val(),
                'body_line3': $('#body_line3').val(),
                'body_line4': $('#body_line4').val(),
                'body_line5': $('#body_line5').val(),
                'body_line6': $('#body_line6').val(),
                'body_line7': $('#body_line7').val(),
                'body_line8': $('#body_line8').val(),
                'body_line9': $('#body_line9').val(),
                'body_line10': $('#body_line10').val(),
                'icon': $('#icon').val(),
                'image': $('#image').val(),
                'notification_type': Window.type
            },
            success: function(data) {
                $("#loading").fadeOut(500);
                $('.socket_title').text('Saved...');
                $('.socket_body').empty().html("<p>Your Template Saved Successfully ...<br><a href='{{ route('admin-notification_templates') }}' class='btn btn-success'>Open Notifications</a>");
                $(".spinner").hide();
                $("#socket").show("closed");
            },
        });
    }
}

$("body").delegate("#upload_image", "submit", function(event) {
    event.preventDefault();
    if ($('.input_img').val() != '') { $('.upload_submit').text('Uploading...'); }
    $.ajax({
        url: "{{ route('admin-upload_image_submit') }}",
        method: "POST",
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            $('.input_img').val('');
            $('.upload_submit').text('Upload');
            $(".img_done").show();
            setTimeout(function() { $(".img_done").hide(); }, 3000);
        },
    });
});


$("body").delegate(".list_btn", "click", function() {
    $(".spinner").hide();
    var img = "{{ route('admin-notification_list') }}?id=" + $(this).data('id');
    $('.socket_title').text('Published List');
    $('.socket_body').empty().html("<br>");
    $.get(img, function(data) {
        for (var i = 0; i < data.length; i++) {
            var j = parseInt(i) + parseInt(1);
            var j = j > 9 ? j : '0' + j;
            var send = data[i].send_to;
            var status = data[i].status;
            if (send == "All Students") {
                if (status == "Sended") {
                    $('.socket_body').append('<tr><td style="padding-right:5px;font-size: 13px;"><span class="font-weight-bold">' + j + '</span></td><td style="padding-right:5px;font-size: 13px;" colspan="2"><span class="font-weight-bold">Sended to: All Student <i> (status:' + data[i].status + ') </i></span></td><td style="padding-right:5px;"><i class="fa fa-angle-down font-weight-bold arrow_up_list arrow_up_list_' + data[i].id + '" data-id="' + data[i].id + '" style="border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;color:#36b9cc;"></i><i class="fa fa-angle-up font-weight-bold arrow_down_list arrow_down_list_' + data[i].id + '" data-id="' + data[i].id + '" style="display: none;border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px; color:#36b9cc;"></i></td><td style="display:grid;"><button style="font-size: 11px; padding: 2px 6px; color: #fff;" class="mx-1 btn btn-success" disabled><i class="fa fa-check"><i></button></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Published : </span><i>' + data[i].publishtime + '</i></td></tr><tr><td colspan="5"><li style="min-height:2px;max-height:2px; background:grey; list-style:none;margin:1px 0px;"></li></td></tr>');
                } else {
                    $('.socket_body').append('<tr><td style="padding-right:5px;font-size: 13px;"><span class="font-weight-bold">' + j + '</span></td><td style="padding-right:5px;font-size: 13px;" colspan="2"><span class="font-weight-bold">Sended to: All Student <i> (status:' + data[i].status + ') </i></span></td><td style="padding-right:5px;"><i class="fa fa-angle-down font-weight-bold arrow_up_list arrow_up_list_' + data[i].id + '" data-id="' + data[i].id + '" style="border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;color:#36b9cc;"></i><i class="fa fa-angle-up font-weight-bold arrow_down_list arrow_down_list_' + data[i].id + '" data-id="' + data[i].id + '" style="display: none;border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px; color:#36b9cc;"></i></td><td><a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_notification_link delete_notification_link_' + data[i].id + '" data-id="' + data[i].id + '">Delete</a></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Schedule : </span><i>' + data[i].publishtime + '</i></td></tr><tr><td colspan="5"><li style="min-height:2px;max-height:2px; background:grey; list-style:none;margin:1px 0px;"></li></td></tr>');
                }
            } else if (send == "Class") {
                if (status == "Sended") {
                    $('.socket_body').append('<tr><td style="padding-right:5px;font-size: 13px;"><span class="font-weight-bold">' + j + '</span></td><td style="padding-right:5px;font-size: 13px;" colspan="2"><span class="font-weight-bold">Sended to: Class <i> (status:' + data[i].status + ') </i></span></td><td style="padding-right:5px;"><i class="fa fa-angle-down font-weight-bold arrow_up_list arrow_up_list_' + data[i].id + '" data-id="' + data[i].id + '" style="border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;color:#36b9cc;"></i><i class="fa fa-angle-up font-weight-bold arrow_down_list arrow_down_list_' + data[i].id + '" data-id="' + data[i].id + '" style="display: none;border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px; color:#36b9cc;"></i></td><td style="display:grid;"><button style="font-size: 11px; padding: 2px 6px; color: #fff;" class="mx-1 btn btn-success" disabled><i class="fa fa-check"><i></button></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Class : </span><i>' + data[i].classid + '</i></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Published : </span><i>' + data[i].publishtime + '</i></td></tr><tr><td colspan="5"><li style="min-height:2px;max-height:2px; background:grey; list-style:none;margin:1px 0px;"></li></td></tr>');
                } else {
                    $('.socket_body').append('<tr><td style="padding-right:5px;font-size: 13px;"><span class="font-weight-bold">' + j + '</span></td><td style="padding-right:5px;font-size: 13px;" colspan="2"><span class="font-weight-bold">Sended to: Class <i> (status:' + data[i].status + ') </i></span></td><td style="padding-right:5px;"><i class="fa fa-angle-down font-weight-bold arrow_up_list arrow_up_list_' + data[i].id + '" data-id="' + data[i].id + '" style="border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;color:#36b9cc;"></i><i class="fa fa-angle-up font-weight-bold arrow_down_list arrow_down_list_' + data[i].id + '" data-id="' + data[i].id + '" style="display: none;border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px; color:#36b9cc;"></i></td><td><a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_notification_link delete_notification_link_' + data[i].id + '" data-id="' + data[i].id + '">Delete</a></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Class : </span><i>' + data[i].classid + '</i></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Schedule : </span><i>' + data[i].publishtime + '</i></td></tr><tr><td colspan="5"><li style="min-height:2px;max-height:2px; background:grey; list-style:none;margin:1px 0px;"></li></td></tr>');
                }
            } else if (send == "Course") {
                if (status == "Sended") {
                    $('.socket_body').append('<tr><td style="padding-right:5px;font-size: 13px;"><span class="font-weight-bold">' + j + '</span></td><td style="padding-right:5px;font-size: 13px;" colspan="2"><span class="font-weight-bold">Sended to: Course <i> (status:' + data[i].status + ') </i></span></td><td style="padding-right:5px;"><i class="fa fa-angle-down font-weight-bold arrow_up_list arrow_up_list_' + data[i].id + '" data-id="' + data[i].id + '" style="border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;color:#36b9cc;"></i><i class="fa fa-angle-up font-weight-bold arrow_down_list arrow_down_list_' + data[i].id + '" data-id="' + data[i].id + '" style="display: none;border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px; color:#36b9cc;"></i></td><td style="display:grid;"><button style="font-size: 11px; padding: 2px 6px; color: #fff;" class="mx-1 btn btn-success" disabled><i class="fa fa-check"><i></button></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Course : </span><i>' + data[i].classid + '|' + data[i].courseid + '</i></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Published : </span><i>' + data[i].publishtime + '</i></td></tr><tr><td colspan="5"><li style="min-height:2px;max-height:2px; background:grey; list-style:none;margin:1px 0px;"></li></td></tr>');
                } else {
                    $('.socket_body').append('<tr><td style="padding-right:5px;font-size: 13px;"><span class="font-weight-bold">' + j + '</span></td><td style="padding-right:5px;font-size: 13px;" colspan="2"><span class="font-weight-bold">Sended to: Course <i> (status:' + data[i].status + ') </i></span></td><td style="padding-right:5px;"><i class="fa fa-angle-down font-weight-bold arrow_up_list arrow_up_list_' + data[i].id + '" data-id="' + data[i].id + '" style="border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;color:#36b9cc;"></i><i class="fa fa-angle-up font-weight-bold arrow_down_list arrow_down_list_' + data[i].id + '" data-id="' + data[i].id + '" style="display: none;border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px; color:#36b9cc;"></i></td><td><a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_notification_link delete_notification_link_' + data[i].id + '" data-id="' + data[i].id + '">Delete</a></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Course : </span><i>' + data[i].classid + '|' + data[i].courseid + '</i></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Schedule : </span><i>' + data[i].publishtime + '</i></td></tr><tr><td colspan="5"><li style="min-height:2px;max-height:2px; background:grey; list-style:none;margin:1px 0px;"></li></td></tr>');
                }
            } else if (send == "Course Type") {
                if (status == "Sended") {
                    $('.socket_body').append('<tr><td style="padding-right:5px;font-size: 13px;"><span class="font-weight-bold">' + j + '</span></td><td style="padding-right:5px;font-size: 13px;" colspan="2"><span class="font-weight-bold">Sended to: Course Type section <i> (status:' + data[i].status + ') </i></span></td><td style="padding-right:5px;"><i class="fa fa-angle-down font-weight-bold arrow_up_list arrow_up_list_' + data[i].id + '" data-id="' + data[i].id + '" style="border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;color:#36b9cc;"></i><i class="fa fa-angle-up font-weight-bold arrow_down_list arrow_down_list_' + data[i].id + '" data-id="' + data[i].id + '" style="display: none;border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px; color:#36b9cc;"></i></td><td style="display:grid;"><button style="font-size: 11px; padding: 2px 6px; color: #fff;" class="mx-1 btn btn-success" disabled><i class="fa fa-check"><i></button></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Course Type : </span><i>' + data[i].classid + '|' + data[i].courseid + '|' + data[i].coursetypeid + '</i></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Published : </span><i>' + data[i].publishtime + '</i></td></tr><tr><td colspan="5"><li style="min-height:2px;max-height:2px; background:grey; list-style:none;margin:1px 0px;"></li></td></tr>');
                } else {
                    $('.socket_body').append('<tr><td style="padding-right:5px;font-size: 13px;"><span class="font-weight-bold">' + j + '</span></td><td style="padding-right:5px;font-size: 13px;" colspan="2"><span class="font-weight-bold">Sended to: Course Type section <i> (status:' + data[i].status + ') </i></span></td><td style="padding-right:5px;"><i class="fa fa-angle-down font-weight-bold arrow_up_list arrow_up_list_' + data[i].id + '" data-id="' + data[i].id + '" style="border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;color:#36b9cc;"></i><i class="fa fa-angle-up font-weight-bold arrow_down_list arrow_down_list_' + data[i].id + '" data-id="' + data[i].id + '" style="display: none;border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px; color:#36b9cc;"></i></td><td><a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_notification_link delete_notification_link_' + data[i].id + '" data-id="' + data[i].id + '">Delete</a></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Course Type : </span><i>' + data[i].classid + '|' + data[i].courseid + '|' + data[i].coursetypeid + '</i></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Schedule : </span><i>' + data[i].publishtime + '</i></td></tr><tr><td colspan="5"><li style="min-height:2px;max-height:2px; background:grey; list-style:none;margin:1px 0px;"></li></td></tr>');
                }
            } else if (send == "Group") {
                if (status == "Sended") {
                    $('.socket_body').append('<tr><td style="padding-right:5px;font-size: 13px;"><span class="font-weight-bold">' + j + '</span></td><td style="padding-right:5px;font-size: 13px;" colspan="2"><span class="font-weight-bold">Sended to: Group <i> (status:' + data[i].status + ') </i></span></td><td style="padding-right:5px;"><i class="fa fa-angle-down font-weight-bold arrow_up_list arrow_up_list_' + data[i].id + '" data-id="' + data[i].id + '" style="border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;color:#36b9cc;"></i><i class="fa fa-angle-up font-weight-bold arrow_down_list arrow_down_list_' + data[i].id + '" data-id="' + data[i].id + '" style="display: none;border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px; color:#36b9cc;"></i></td><td style="display:grid;"><button style="font-size: 11px; padding: 2px 6px; color: #fff;" class="mx-1 btn btn-success" disabled><i class="fa fa-check"><i></button></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Group : </span><i>' + data[i].classid + '|' + data[i].courseid + '|' + data[i].coursetypeid + '|' + data[i].groupid + '</i></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Published : </span><i>' + data[i].publishtime + '</i></td></tr><tr><td colspan="5"><li style="min-height:2px;max-height:2px; background:grey; list-style:none;margin:1px 0px;"></li></td></tr>');
                } else {
                    $('.socket_body').append('<tr><td style="padding-right:5px;font-size: 13px;"><span class="font-weight-bold">' + j + '</span></td><td style="padding-right:5px;font-size: 13px;" colspan="2"><span class="font-weight-bold">Sended to: Group <i> (status:' + data[i].status + ') </i></span></td><td style="padding-right:5px;"><i class="fa fa-angle-down font-weight-bold arrow_up_list arrow_up_list_' + data[i].id + '" data-id="' + data[i].id + '" style="border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;color:#36b9cc;"></i><i class="fa fa-angle-up font-weight-bold arrow_down_list arrow_down_list_' + data[i].id + '" data-id="' + data[i].id + '" style="display: none;border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px; color:#36b9cc;"></i></td><td><a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_notification_link delete_notification_link_' + data[i].id + '" data-id="' + data[i].id + '">Delete</a></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Group : </span><i>' + data[i].classid + '|' + data[i].courseid + '|' + data[i].coursetypeid + '|' + data[i].groupid + '</i></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Schedule : </span><i>' + data[i].publishtime + '</i></td></tr><tr><td colspan="5"><li style="min-height:2px;max-height:2px; background:grey; list-style:none;margin:1px 0px;"></li></td></tr>');
                }
            } else if (send == "Student") {
                if (status == "Sended") {
                    $('.socket_body').append('<tr><td style="padding-right:5px;font-size: 13px;"><span class="font-weight-bold">' + j + '</span></td><td style="padding-right:5px;font-size: 13px;" colspan="2"><span class="font-weight-bold">Sended to: ' + data[i].user_name + ' <i> (status:' + data[i].status + ') </i></span></td><td style="padding-right:5px;"><i class="fa fa-angle-down font-weight-bold arrow_up_list arrow_up_list_' + data[i].id + '" data-id="' + data[i].id + '" style="border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;color:#36b9cc;"></i><i class="fa fa-angle-up font-weight-bold arrow_down_list arrow_down_list_' + data[i].id + '" data-id="' + data[i].id + '" style="display: none;border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px; color:#36b9cc;"></i></td><td style="display:grid;"><button style="font-size: 11px; padding: 2px 6px; color: #fff;" class="mx-1 btn btn-success" disabled><i class="fa fa-check"><i></button></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Category : </span><i>Student</i></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Details : </span><i>' + data[i].classid + '|' + data[i].courseid + '|' + data[i].coursetypeid + '|' + data[i].groupid + '</i></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Published : </span><i>' + data[i].publishtime + '</i></td></tr><tr><td colspan="5"><li style="min-height:2px;max-height:2px; background:grey; list-style:none;margin:1px 0px;"></li></td></tr>');
                } else {
                    $('.socket_body').append('<tr><td style="padding-right:5px;font-size: 13px;"><span class="font-weight-bold">' + j + '</span></td><td style="padding-right:5px;font-size: 13px;" colspan="2"><span class="font-weight-bold">Sended to: ' + data[i].user_name + ' <i> (status:' + data[i].status + ') </i></span></td><td style="padding-right:5px;"><i class="fa fa-angle-down font-weight-bold arrow_up_list arrow_up_list_' + data[i].id + '" data-id="' + data[i].id + '" style="border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;color:#36b9cc;"></i><i class="fa fa-angle-up font-weight-bold arrow_down_list arrow_down_list_' + data[i].id + '" data-id="' + data[i].id + '" style="display: none;border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px; color:#36b9cc;"></i></td><td><a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_notification_link delete_notification_link_' + data[i].id + '" data-id="' + data[i].id + '">Delete</a></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Category : </span><i>Student</i></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Details : </span><i>' + data[i].classid + '|' + data[i].courseid + '|' + data[i].coursetypeid + '|' + data[i].groupid + '</i></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Schedule : </span><i>' + data[i].publishtime + '</i></td></tr><tr><td colspan="5"><li style="min-height:2px;max-height:2px; background:grey; list-style:none;margin:1px 0px;"></li></td></tr>');
                }
            } else if (send == "Teacher") {
                if (status == "Sended") {
                    $('.socket_body').append('<tr><td style="padding-right:5px;font-size: 13px;"><span class="font-weight-bold">' + j + '</span></td><td style="padding-right:5px;font-size: 13px;" colspan="2"><span class="font-weight-bold">Sended to: ' + data[i].user_name + ' <i> (status:' + data[i].status + ') </i></span></td><td style="padding-right:5px;"><i class="fa fa-angle-down font-weight-bold arrow_up_list arrow_up_list_' + data[i].id + '" data-id="' + data[i].id + '" style="border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;color:#36b9cc;"></i><i class="fa fa-angle-up font-weight-bold arrow_down_list arrow_down_list_' + data[i].id + '" data-id="' + data[i].id + '" style="display: none;border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px; color:#36b9cc;"></i></td><td style="display:grid;"><button style="font-size: 11px; padding: 2px 6px; color: #fff;" class="mx-1 btn btn-success" disabled><i class="fa fa-check"><i></button></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Category : </span><i>Teacher</i></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Published : </span><i>' + data[i].publishtime + '</i></td></tr><tr><td colspan="5"><li style="min-height:2px;max-height:2px; background:grey; list-style:none;margin:1px 0px;"></li></td></tr>');
                } else {
                    $('.socket_body').append('<tr><td style="padding-right:5px;font-size: 13px;"><span class="font-weight-bold">' + j + '</span></td><td style="padding-right:5px;font-size: 13px;" colspan="2"><span class="font-weight-bold">Sended to: ' + data[i].user_name + ' <i> (status:' + data[i].status + ') </i></span></td><td style="padding-right:5px;"><i class="fa fa-angle-down font-weight-bold arrow_up_list arrow_up_list_' + data[i].id + '" data-id="' + data[i].id + '" style="border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;color:#36b9cc;"></i><i class="fa fa-angle-up font-weight-bold arrow_down_list arrow_down_list_' + data[i].id + '" data-id="' + data[i].id + '" style="display: none;border-radius: 50%; border: 2px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px; color:#36b9cc;"></i></td><td><a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_notification_link delete_notification_link_' + data[i].id + '" data-id="' + data[i].id + '">Delete</a></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Category : </span><i>Teacher</i></td></tr><tr class="list_data list_data_' + data[i].id + '" style="display:none; font-size:12px;"><td colspan="5"><span class="font-weight-bold">Schedule : </span><i>' + data[i].publishtime + '</i></td></tr><tr><td colspan="5"><li style="min-height:2px;max-height:2px; background:grey; list-style:none;margin:1px 0px;"></li></td></tr>');
                }
            }

        }
        $("#socket").show("closed");
    })

});

$("body").delegate(".arrow_down_list", "click", function() {
    var id = $(this).data('id');
    $(this).hide();
    $('.arrow_up_list_' + id).show();
    $('.list_data_' + id).hide();
});

$("body").delegate(".arrow_up_list", "click", function() {
    var id = $(this).data('id');
    $(this).hide();
    $('.arrow_down_list_' + id).show();
    $('.list_data_' + id).show();
});

$("body").delegate(".delete_notification_link", "click", function() {
    var id = $(this).data('id');
    $('.socket_title').text('Delete List Item');
    $('.socket_body_main').empty().html('@csrf <a>Are You Sure! Want to delete List Item</a><br><a class="btn btn-success mt-1 delete_notification_link_confirm" style="font-size: 11px; padding: 3px 6px; color: #fff;" data-id="' + id + '" >Delete</a>&nbsp;<a  class="btn btn-danger" style="font-size: 11px; padding: 3px 6px; color: #fff;" onclick="hider()">Cancel</a>');
    $(".socket_body").hide();
    $(".socket_body_main").show();
});

$("body").delegate(".delete_notification_link_confirm", "click", function() {
    var id = $(this).data('id');
    $.ajax({
        type: 'POST',
        url: '{{ route('
        admin - delete_notification ') }}',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': id,
        },
        success: function(data) {
            $('.socket_title').text('Published List');
            $('.socket_body_main').empty().html('');
            $('.delete_notification_link_' + id).text('Deleted');
            $('.delete_notification_link_' + id).css('color', 'grey');
            $('.delete_notification_link_' + id).attr('class', '');
            $(".socket_body_main").hide();
            $(".socket_body").show();
        },
    });
});

function hider() {
    $('.socket_title').text('Published List');
    $('.socket_body_main').empty().html('');
    $(".socket_body_main").hide();
    $(".socket_body").show();
}

$("body").delegate(".delete_btn", "click", function() {
    var id = $(this).data('id');
    $(".spinner").hide();
    $('.socket_title').text('Delete Notification');
    $('.socket_body_main').empty().html('@csrf <a>Are You Sure! Want to delete this Notification</a><br><a class="btn btn-success mt-1 delete_notification_confirm" style="font-size: 11px; padding: 3px 6px; color: #fff;" data-id="' + id + '">Delete</a>&nbsp;<a  class="btn btn-danger" style="font-size: 11px; padding: 3px 6px; color: #fff;" onclick="hider1()">Cancel</a>');
    $("#socket").show("closed");
});

$("body").delegate(".delete_notification_confirm", "click", function() {
    var id = $(this).data('id');
    $.ajax({
        type: 'POST',
        url: '{{ route('
        admin - delete_notification_templates ') }}',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': id,
        },
        success: function(data) {
            $("#socket").hide();
            $('.socket_body_main').empty().html('');
            location.reload();
        },
    });
});

function hider1() {
    $("#socket").hide();
}

</script>
@endsection
