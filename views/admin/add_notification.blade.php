@extends('layout/admin_dashboard')
@extends('layout/details')
@section('analysis')
<div class="row">
    <div class="col-md-4 mx-2 mt-4 mb-4" style="height: 80vh;overflow-y: scroll;">
        <h4>Select Type</h4>
        <div class="card shadow mb-1 notification_type notification_type_1" data-type="no_icon">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%" class="text-dark font-weight-bold mb-1 text-xs" style="font-size:12px;"><span></span><a>Type : Simple Notification</a></div>
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name &nbsp;</span><i class="fa fa-angle-down font-weight-bold" style="border-radius: 50%; border: 1px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title" style="font-size: 14px;"><span></span><a>Title</a></div>
                        <div class="mb-3 edit_body" style="font-size: 13px;"><span></span><a>Description</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-1 notification_type notification_type_2" data-type="right_icon">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%;font-size:12px;" class="text-dark font-weight-bold mb-1"><span></span><a>Type : Right Side Icon Notification</a></div>
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name &nbsp;</span><i class="fa fa-angle-down font-weight-bold" style="border-radius: 50%; border: 1px solid grey;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title" style="font-size: 14px;"><span></span><a>Title</a></div>
                        <div class="mb-0 edit_body" style="font-size: 13px;"><span></span><a>Description</a></div>
                    </div>
                    <div style="width: 20%;"><img src="{{ asset('img/icon-thumb.png') }}" width="50" height="50" class="mt-3 edit_icon" style="float: right;border: 1px solid black"></div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-1 notification_type notification_type_3" data-type="left_icon">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%;font-size:12px;" class="text-dark font-weight-bold mb-1"><span></span><a>Type : Left Side Icon Notification</a></div>
                    <div style="width: 15%;"><img src="{{ asset('img/icon-thumb.png') }}" width="50" height="50" class="mt-0 edit_icon" style="float:left;border: 1px solid black"></div>
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name &nbsp;</span></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title" style="font-size: 14px;"><span></span><a>Title</a></div>
                        <div class="mb-0 edit_body" style="font-size: 13px;"><span></span><a>Description</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-1 notification_type notification_type_4" data-type="right_icon_long">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%;font-size:12px;" class="text-dark font-weight-bold mb-1"><span></span><a>Type : Right Side Icon With Long Desc. Notification</a></div>
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name . <span class="edit_summary font-weight-bold">(summary)</span> &nbsp;</span><i class="fa fa-angle-down font-weight-bold expand_arrow_show4" style="display: none; border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i><i class="fa fa-angle-up font-weight-bold expand_arrow_hide4" style="border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title edit_title4" style="display: none;font-size: 13px;"><span></span><a>Title</a></div>
                        <div class="mb-0 edit_body edit_body4" style="display: none;font-size: 12px;"><span></span><a>Description</a></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title_long edit_title_long4" style="font-size: 13px;"><span></span><a>Title After Expand</a></div>
                        <div class="mb-5  edit_body_long edit_body_long4" style="font-size:12px;"><span></span><a>Long Description</a></div>
                    </div>
                    <div style="width: 20%;"><img src="{{ asset('img/icon-thumb.png') }}" width="50" height="50" class="mt-3 edit_icon" style="float: right;border: 1px solid black"></div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-1 notification_type notification_type_5" data-type="no_icon_long">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%;font-size:12px;" class="text-dark font-weight-bold mb-1"><span></span><a>Type : Long Description Notification</a></div>
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name . <span class="edit_summary font-weight-bold">(summary)</span> &nbsp;</span><i class="fa fa-angle-down font-weight-bold expand_arrow_show5" style="display: none; border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i><i class="fa fa-angle-up font-weight-bold expand_arrow_hide5" style="border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title edit_title5" style="display: none;font-size: 13px;"><span></span><a>Title</a></div>
                        <div class="mb-0 edit_body edit_body5" style="display: none;font-size: 12px;"><span></span><a>Description</a></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title_long edit_title_long5" style="font-size: 13px;"><span></span><a>Title After Expand</a></div>
                        <div class="mb-5  edit_body_long edit_body_long5" style="font-size:12px;"><span></span><a>Long Description</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-1 notification_type notification_type_6" data-type="no_icon_image">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%;font-size:12px;" class="text-dark font-weight-bold mb-1"><span></span><a>Type : Notification with Image</a></div>
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name </span><i class="fa fa-angle-down font-weight-bold expand_arrow_show6" style="display: none; border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i><i class="fa fa-angle-up font-weight-bold expand_arrow_hide6" style="border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title" style="font-size: 13px;"><span></span><a>Title</a></div>
                        <div class="mb-0 edit_body" style="font-size:12px;"><span></span><a>Description</a></div>
                    </div>
                    <div style="width: 100%;"><img src="{{ asset('img/image-thumb.png') }}" style="width: 100%;border: 1px solid black" height="200px" class="edit_image edit_image6 mt-3"></div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-1 notification_type notification_type_7" data-type="right_icon_image_hide">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%;font-size:12px;" class="text-dark font-weight-bold mb-1"><span></span><a>Type : Notification with Image and Icon ( hide on expand view )</a></div>
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name </span><i class="fa fa-angle-down font-weight-bold expand_arrow_show7" style="display: none; border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i><i class="fa fa-angle-up font-weight-bold expand_arrow_hide7" style="border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title" style="font-size: 13px;"><span></span><a>Title</a></div>
                        <div class="mb-0 edit_body" style="font-size:12px;"><span></span><a>Description</a></div>
                    </div>
                    <div style="width: 20%;"><img src="{{ asset('img/icon-thumb.png') }}" width="50" height="50" class="mt-3 edit_icon edit_icon7" style="float: right;border: 1px solid black;display: none;"></div>
                    <div style="width: 100%;"><img src="{{ asset('img/image-thumb.png') }}" style="width: 100%;border: 1px solid black" height="200px" class="edit_image edit_image7 mt-3"></div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-1 notification_type notification_type_8" data-type="right_icon_image_show">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%;font-size:12px;" class="text-dark font-weight-bold mb-1"><span></span><a>Type : Notification with Image and Icon</a></div>
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name </span><i class="fa fa-angle-down font-weight-bold expand_arrow_show8" style="display: none; border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i><i class="fa fa-angle-up font-weight-bold expand_arrow_hide8" style="border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title" style="font-size: 13px;"><span></span><a>Title</a></div>
                        <div class="mb-0 edit_body" style="font-size:12px;"><span></span><a>Description</a></div>
                    </div>
                    <div style="width: 20%;"><img src="{{ asset('img/icon-thumb.png') }}" width="50" height="50" class="mt-3 edit_icon" style="float: right;border: 1px solid black"></div>
                    <div style="width: 100%;"><img src="{{ asset('img/image-thumb.png') }}" style="width: 100%;border: 1px solid black" height="200px" class="edit_image edit_image8 mt-3"></div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-1 notification_type notification_type_9" data-type="no_icon_lines">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%;font-size:12px;" class="text-dark font-weight-bold mb-1"><span></span><a>Type : Notification with multiple Lines</a></div>
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name . <span class="edit_summary font-weight-bold">(summary)</span> &nbsp;</span><i class="fa fa-angle-down font-weight-bold expand_arrow_show9" style="display: none;border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i><i class="fa fa-angle-up font-weight-bold expand_arrow_hide9" style="border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title edit_title9" style="display: none;font-size: 13px;"><span></span><a>Title</a></div>
                        <div class="mb-0 edit_body edit_body9" style="display: none; font-size:12px;"><span></span><a>Description</a></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title_line edit_title_line_9" style="font-size: 13px;"><span></span><a>Title After Expand</a></div>
                        <div class="mb-0 edit_body_line1 edit_body_line_9_1" style="font-size:12px;"><span></span><a>Line 1</a></div>
                        <div class="mb-0 edit_body_line2 edit_body_line_9_2" style="font-size:12px;"><span></span><a>Line 2 (Optional)</a></div>
                        <div class="mb-0 edit_body_line3 edit_body_line_9_3" style="font-size:12px;"><span></span><a>Line 3 (Optional)</a></div>
                        <div class="mb-0 edit_body_line4 edit_body_line_9_4" style="font-size:12px;"><span></span><a>Line 4 (Optional)</a></div>
                        <div class="mb-0 edit_body_line5 edit_body_line_9_5" style="font-size:12px;"><span></span><a>Line 5 (Optional)</a></div>
                        <div class="mb-0 edit_body_line6 edit_body_line_9_6" style="font-size:12px;"><span></span><a>Line 6 (Optional)</a></div>
                        <div class="mb-0 edit_body_line7 edit_body_line_9_7" style="font-size:12px;"><span></span><a>Line 7 (Optional)</a></div>
                        <div class="mb-0 edit_body_line8 edit_body_line_9_8" style="font-size:12px;"><span></span><a>Line 8 (Optional)</a></div>
                        <div class="mb-0 edit_body_line9 edit_body_line_9_9" style="font-size:12px;"><span></span><a>Line 9 (Optional)</a></div>
                        <div class="mb-0 edit_body_line10 edit_body_line_9_10" style="font-size:12px;"><span></span><a>Line 10 (Optional)</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-1 notification_type notification_type_10" data-type="right_icon_lines">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div style="border-bottom: 1px solid grey;width: 100%;font-size:12px;" class="text-dark font-weight-bold mb-1"><span></span><a>Type : Notification with multiple Lines and Icon</a></div>
                    <div class="col mr-2 pl-2">
                        <div class="mb-1 description"><span>academy name . <span class="edit_summary font-weight-bold">(summary)</span> &nbsp;</span><i class="fa fa-angle-down font-weight-bold expand_arrow_show10" style="display: none;border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i><i class="fa fa-angle-up font-weight-bold expand_arrow_hide10" style="border-radius: 50%; border: 1px solid red;padding-left: 3.5px;padding-right: 3.5px;font-size: 15px;"></i></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title edit_title10" style="display: none;font-size: 13px;"><span></span><a>Title</a></div>
                        <div class="mb-0 edit_body edit_body10" style="display: none; font-size:12px;"><span></span><a>Description</a></div>
                        <div class="text-dark font-weight-bold mb-0 edit_title_line edit_title_line_10" style="font-size: 13px;"><span></span><a>Title After Expand</a></div>
                        <div class="mb-0 edit_body_line1 edit_body_line_10_1" style="font-size:12px;"><span></span><a>Line 1</a></div>
                        <div class="mb-0 edit_body_line2 edit_body_line_10_2" style="font-size:12px;"><span></span><a>Line 2 (Optional)</a></div>
                        <div class="mb-0 edit_body_line3 edit_body_line_10_3" style="font-size:12px;"><span></span><a>Line 3 (Optional)</a></div>
                        <div class="mb-0 edit_body_line4 edit_body_line_10_4" style="font-size:12px;"><span></span><a>Line 4 (Optional)</a></div>
                        <div class="mb-0 edit_body_line5 edit_body_line_10_5" style="font-size:12px;"><span></span><a>Line 5 (Optional)</a></div>
                        <div class="mb-0 edit_body_line6 edit_body_line_10_6" style="font-size:12px;"><span></span><a>Line 6 (Optional)</a></div>
                        <div class="mb-0 edit_body_line7 edit_body_line_10_7" style="font-size:12px;"><span></span><a>Line 7 (Optional)</a></div>
                        <div class="mb-0 edit_body_line8 edit_body_line_10_8" style="font-size:12px;"><span></span><a>Line 8 (Optional)</a></div>
                        <div class="mb-0 edit_body_line9 edit_body_line_10_9" style="font-size:12px;"><span></span><a>Line 9 (Optional)</a></div>
                        <div class="mb-0 edit_body_line10 edit_body_line_10_10" style="font-size:12px;"><span></span><a>Line 10 (Optional)</a></div>
                    </div>
                    <div style="width: 20%;"><img src="{{ asset('img/icon-thumb.png') }}" width="50" height="50" class="edit_icon edit_icon10" style="float: right;border: 1px solid black;margin-top: -70px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-4 mx-2 mb-4" style="height: 80vh;overflow-y: scroll;">
        <h4>Details</h4>
        <div class="card shadow mb-1">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        @csrf
                        <input type="text" class="inputs input_ck" id="summary" name="summary" placeholder="Summary" required="">
                        <input type="text" class="inputs input_ck" id="title" name="title" placeholder="Title" required="">
                        <input type="text" class="inputs input_ck" id="body" name="body" placeholder="Description" required="">
                        <input type="text" class="inputs input_ck" id="title_long" name="title_long" placeholder="Title After Expand" required="">
                        <input type="text" class="inputs input_ck" id="body_long" name="body_long" placeholder="Long Description" required="">
                        <input type="text" class="inputs input_ck" id="title_line" name="title_line" placeholder="Title After Expand" required="">
                        <input type="text" class="inputs input_ck" id="body_line1" name="body_line1" placeholder="Description Line 1" required="">
                        <input type="text" class="inputs" id="body_line2" name="body_line2" placeholder="Description Line 2" required="">
                        <input type="text" class="inputs" id="body_line3" name="body_line3" placeholder="Description Line 3" required="">
                        <input type="text" class="inputs" id="body_line4" name="body_line4" placeholder="Description Line 4" required="">
                        <input type="text" class="inputs" id="body_line5" name="body_line5" placeholder="Description Line 5" required="">
                        <input type="text" class="inputs" id="body_line6" name="body_line6" placeholder="Description Line 6" required="">
                        <input type="text" class="inputs" id="body_line7" name="body_line7" placeholder="Description Line 7" required="">
                        <input type="text" class="inputs" id="body_line8" name="body_line8" placeholder="Description Line 8" required="">
                        <input type="text" class="inputs" id="body_line9" name="body_line9" placeholder="Description Line 9" required="">
                        <input type="text" class="inputs" id="body_line10" name="body_line10" placeholder="Description Line 10" required="">
                        <input style="width: 80%" type="text" class="inputs input_ck " id="icon" name="icon" placeholder="Icon URL (aspect Ratio 1:1)" required="">&nbsp;<a class="btn btn-primary inputs select_icon" style="color: #fff; padding:3px 7px;" id="icon_1">Choose icon</a>
                        <input style="width: 80%" type="text" class="inputs input_ck" id="image" name="image" placeholder="Image URL (aspect Ratio 2:1)" required="">&nbsp;<a class="btn btn-primary inputs select_image" style="color: #fff;padding:3px 7px;" id="image_1">Choose img.</a>
                        <a class="btn btn-success" style="float: right;color: #fff;padding:5px 22px;" onclick="save()">Save</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    $(".edit_title4").hide();
    $(".edit_body4").hide();
    $(".edit_title_long4").show();
    $(".edit_body_long4").show();
    $(".expand_arrow_show4").hide();
    $(".expand_arrow_hide4").show();
});
$(".expand_arrow_hide4").on("click", function() {
    $(".edit_title_long4").hide();
    $(".edit_body_long4").hide();
    $(".edit_title4").show();
    $(".edit_body4").show();
    $(".expand_arrow_hide4").hide();
    $(".expand_arrow_show4").show();
});
$(".expand_arrow_show5").on("click", function() {
    $(".edit_title5").hide();
    $(".edit_body5").hide();
    $(".edit_title_long5").show();
    $(".edit_body_long5").show();
    $(".expand_arrow_show5").hide();
    $(".expand_arrow_hide5").show();
});
$(".expand_arrow_hide5").on("click", function() {
    $(".edit_title_long5").hide();
    $(".edit_body_long5").hide();
    $(".edit_title5").show();
    $(".edit_body5").show();
    $(".expand_arrow_hide5").hide();
    $(".expand_arrow_show5").show();
});
$(".expand_arrow_show6").on("click", function() {
    $(".edit_image6").show();
    $(".expand_arrow_show6").hide();
    $(".expand_arrow_hide6").show();
});
$(".expand_arrow_hide6").on("click", function() {
    $(".edit_image6").hide();
    $(".expand_arrow_hide6").hide();
    $(".expand_arrow_show6").show();
});
$(".expand_arrow_show7").on("click", function() {
    $(".edit_image7").show();
    $(".edit_icon7").hide();
    $(".expand_arrow_show7").hide();
    $(".expand_arrow_hide7").show();
});
$(".expand_arrow_hide7").on("click", function() {
    $(".edit_image7").hide();
    $(".edit_icon7").show();
    $(".expand_arrow_hide7").hide();
    $(".expand_arrow_show7").show();
});
$(".expand_arrow_show8").on("click", function() {
    $(".edit_image8").show();
    $(".expand_arrow_show8").hide();
    $(".expand_arrow_hide8").show();
});
$(".expand_arrow_hide8").on("click", function() {
    $(".edit_image8").hide();
    $(".expand_arrow_hide8").hide();
    $(".expand_arrow_show8").show();
});
$(".expand_arrow_show9").on("click", function() {
    $(".edit_title9").hide();
    $(".edit_body9").hide();
    $(".edit_title_line_9").show();
    $(".edit_body_line_9_1").show();
    $(".edit_body_line_9_2").show();
    $(".edit_body_line_9_3").show();
    $(".edit_body_line_9_4").show();
    $(".edit_body_line_9_5").show();
    $(".edit_body_line_9_6").show();
    $(".edit_body_line_9_7").show();
    $(".edit_body_line_9_8").show();
    $(".edit_body_line_9_9").show();
    $(".edit_body_line_9_10").show();
    $(".expand_arrow_show9").hide();
    $(".expand_arrow_hide9").show();
});
$(".expand_arrow_hide9").on("click", function() {
    $(".edit_title_line_9").hide();
    $(".edit_body_line_9_1").hide();
    $(".edit_body_line_9_2").hide();
    $(".edit_body_line_9_3").hide();
    $(".edit_body_line_9_4").hide();
    $(".edit_body_line_9_5").hide();
    $(".edit_body_line_9_6").hide();
    $(".edit_body_line_9_7").hide();
    $(".edit_body_line_9_8").hide();
    $(".edit_body_line_9_9").hide();
    $(".edit_body_line_9_10").hide();
    $(".edit_title9").show();
    $(".edit_body9").show();
    $(".expand_arrow_hide9").hide();
    $(".expand_arrow_show9").show();
});
$(".expand_arrow_show10").on("click", function() {
    $(".edit_title10").hide();
    $(".edit_body10").hide();
    $(".edit_title_line_10").show();
    $(".edit_body_line_10_1").show();
    $(".edit_body_line_10_2").show();
    $(".edit_body_line_10_3").show();
    $(".edit_body_line_10_4").show();
    $(".edit_body_line_10_5").show();
    $(".edit_body_line_10_6").show();
    $(".edit_body_line_10_7").show();
    $(".edit_body_line_10_8").show();
    $(".edit_body_line_10_9").show();
    $(".edit_body_line_10_10").show();
    $('.edit_icon10').css('margin-top', '-70px');
    $(".expand_arrow_show10").hide();
    $(".expand_arrow_hide10").show();
});
$(".expand_arrow_hide10").on("click", function() {
    $(".edit_title_line_10").hide();
    $(".edit_body_line_10_1").hide();
    $(".edit_body_line_10_2").hide();
    $(".edit_body_line_10_3").hide();
    $(".edit_body_line_10_4").hide();
    $(".edit_body_line_10_5").hide();
    $(".edit_body_line_10_6").hide();
    $(".edit_body_line_10_7").hide();
    $(".edit_body_line_10_8").hide();
    $(".edit_body_line_10_9").hide();
    $(".edit_body_line_10_10").hide();
    $(".edit_title10").show();
    $(".edit_body10").show();
    $('.edit_icon10').css('margin-top', '5px');
    $(".expand_arrow_hide10").hide();
    $(".expand_arrow_show10").show();
});
$(".notification_type").on("click", function() {
    if ($(".notification_type").hasClass('border-danger')) {
        $(".notification_type").removeClass('border-danger');
        $(".notification_type").css('border', 'none');
    }
    $(this).addClass('border-danger');
    $(this).css('border', '2px solid');
    var types = $(this).data("type");
    switch (types) {
        case "no_icon":
            Window.type = types;
            $('.inputs').hide();
            $("#title").show();
            $("#body").show();
            break;
        case "right_icon":
            Window.type = types;
            $('.inputs').hide();
            $("#title").show();
            $("#body").show();
            $("#icon").show();
            $("#icon_1").show();
            break;
        case "left_icon":
            Window.type = types;
            $('.inputs').hide();
            $("#title").show();
            $("#body").show();
            $("#icon").show();
            $("#icon_1").show();
            break;
        case "right_icon_long":
            Window.type = types;
            $('.inputs').hide();
            $("#title").show();
            $("#body").show();
            $("#title_long").show();
            $("#body_long").show();
            $("#summary").show();
            $("#icon").show();
            $("#icon_1").show();
            break;
        case "no_icon_long":
            Window.type = types;
            $('.inputs').hide();
            $("#title").show();
            $("#body").show();
            $("#title_long").show();
            $("#body_long").show();
            $("#summary").show();
            break;
        case "no_icon_image":
            Window.type = types;
            $('.inputs').hide();
            $("#title").show();
            $("#body").show();
            $("#image").show();
            $("#image_1").show();
            break;
        case "right_icon_image_hide":
            Window.type = types;
            $('.inputs').hide();
            $("#title").show();
            $("#body").show();
            $("#icon").show();
            $("#icon_1").show();
            $("#image").show();
            $("#image_1").show();
            break;
        case "right_icon_image_show":
            Window.type = types;
            $('.inputs').hide();
            $("#title").show();
            $("#body").show();
            $("#icon").show();
            $("#icon_1").show();
            $("#image").show();
            $("#image_1").show();
            break;
        case "no_icon_lines":
            Window.type = types;
            $('.inputs').hide();
            $("#title").show();
            $("#body").show();
            $("#title_line").show();
            $("#body_line1").show();
            $("#body_line2").show();
            $("#body_line3").show();
            $("#body_line4").show();
            $("#body_line5").show();
            $("#body_line6").show();
            $("#body_line7").show();
            $("#body_line8").show();
            $("#body_line9").show();
            $("#body_line10").show();
            $("#summary").show();
            break;

        case "right_icon_lines":
            Window.type = types;
            $('.inputs').hide();
            $("#title").show();
            $("#body").show();
            $("#title_line").show();
            $("#body_line1").show();
            $("#body_line2").show();
            $("#body_line3").show();
            $("#body_line4").show();
            $("#body_line5").show();
            $("#body_line6").show();
            $("#body_line7").show();
            $("#body_line8").show();
            $("#body_line9").show();
            $("#body_line10").show();
            $("#summary").show();
            $("#icon").show();
            $("#icon_1").show();
            break;

    }

});
$("#summary").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#summary').val() == '' ? "(summary)" : $('#summary').val();
    $('.edit_summary').text(val);
});
$("#title").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#title').val() == '' ? "Title" : $('#title').val();
    $('.edit_title').text(val);
});
$("#body").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#body').val() == '' ? "Description" : $('#body').val();
    $('.edit_body').text(val);
});
$("#title_long").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#title_long').val() == '' ? "Title After Expand" : $('#title_long').val();
    $('.edit_title_long').text(val);
});
$("#body_long").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#body_long').val() == '' ? "Long Description" : $('#body_long').val();
    $('.edit_body_long').text(val);
});
$("#title_line").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#title_line').val() == '' ? "Title After Expand" : $('#title_line').val();
    $('.edit_title_line').text(val);
});
$("#body_line1").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#body_line1').val() == '' ? "Line 1" : $('#body_line1').val();
    $('.edit_body_line1').text(val);
});
$("#body_line2").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#body_line2').val() == '' ? "Line 2 (Optional)" : $('#body_line2').val();
    $('.edit_body_line2').text(val);
});
$("#body_line3").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#body_line3').val() == '' ? "Line 3 (Optional)" : $('#body_line3').val();
    $('.edit_body_line3').text(val);
});
$("#body_line4").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#body_line4').val() == '' ? "Line 4 (Optional)" : $('#body_line4').val();
    $('.edit_body_line4').text(val);
});
$("#body_line5").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#body_line5').val() == '' ? "Line 5 (Optional)" : $('#body_line5').val();
    $('.edit_body_line5').text(val);
});
$("#body_line6").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#body_line6').val() == '' ? "Line 6 (Optional)" : $('#body_line6').val();
    $('.edit_body_line6').text(val);
});
$("#body_line7").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#body_line7').val() == '' ? "Line 7 (Optional)" : $('#body_line7').val();
    $('.edit_body_line7').text(val);
});
$("#body_line8").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#body_line8').val() == '' ? "Line 8 (Optional)" : $('#body_line8').val();
    $('.edit_body_line8').text(val);
});
$("#body_line9").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#body_line9').val() == '' ? "Line 9 (Optional)" : $('#body_line9').val();
    $('.edit_body_line9').text(val);
});
$("#body_line10").keyup(function() {
    $(this).css('background', '#eee');
    var val = $('#body_line10').val() == '' ? "Line 10 (Optional)" : $('#body_line10').val();
    $('.edit_body_line10').text(val);
});
$("#icon").keyup(function() {
    $(this).css('background', '#eee');
    imageExists($('#icon').val(), function(exists) {
        if (exists) {
            Window.icon = 'true';
            $('.edit_icon').attr('src', $('#icon').val());
        } else {
            Window.icon = 'false';
            $('.edit_icon').attr('src', "{{ asset('img/icon-thumb.png') }}");
        }
    });
});
$("#image").keyup(function() {
    $(this).css('background', '#eee');
    imageExists($('#image').val(), function(exists) {
        if (exists) {
            Window.image = 'true';
            $('.edit_image').attr('src', $('#image').val());
        } else {
            Window.image = 'false';
            $('.edit_image').attr('src', "{{ asset('img/image-thumb.png') }}");
        }
    });
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
                $('.socket_body_main').empty().html("");
                $('.socket_body').empty().html("<p>Your Template Saved Successfully ...<br><a href='{{ route('admin-notification_templates') }}' class='btn btn-success'>Open Notifications</a>");
                $(".spinner").hide();
                $("#socket").show("closed");
            },
        });
    }
}

function upload_image() {
    $('.socket_title').text('Uploads Image');
    $('.socket_body').html("");
    $('.socket_body_main').empty().html('<a class="img_done" style="color:green; display:none;">Image Uploaded Successfully...<a><form id="upload_image" method="POST" enctype="multipart/form-data">@csrf<input class="btn btn-lg input_img" type="file" name="images[]" multiple="" accept="image/*"/><button class="btn btn-info upload_submit ml-3 mb-1" type="submit" name="submit" style="font-size:12px; padding:4px 8px;">Upload</button></form><button class="btn btn-primary ml-3 select_image" style="font-size:12px; padding:4px 8px;">Select Image</button>');
    $(".spinner").hide();
    $("#socket").show("closed");
}

function upload_icon() {
    $('.socket_title').text('Uploads Icon');
    $('.socket_body').html("");
    $('.socket_body_main').empty().html('<a class="img_done" style="color:green; display:none;">Icon Uploaded Successfully...<a><form id="upload_image" method="POST" enctype="multipart/form-data">@csrf<input class="btn btn-lg input_img" type="file" name="images[]" multiple="" accept="image/*"/><button class="btn btn-info upload_submit ml-3 mb-1" type="submit" name="submit" style="font-size:12px; padding:4px 8px;">Upload</button></form><button class="btn btn-primary ml-3 select_icon" style="font-size:12px; padding:4px 8px;">Select Icon</button>');
    $(".spinner").hide();
    $("#socket").show("closed");
}

$("body").delegate(".select_image", "click", function() {
    $('.socket_title').text('Select Image');
    var as = "{{ asset('') }}/notification_images/";
    $('.socket_body').html('<button class="btn btn-primary" onclick="upload_image()" style="font-size:12px; padding:4px 8px;">Upload new Image</button>');
    $.get('{{ route('
        admin - upload_image_list ') }}',
        function(data) {
            var data = JSON.parse(JSON.stringify(data));
            $('.socket_body_main').empty().html("");
            for (var i = 0; i < data.length; i++) {
                $('.socket_body_main').append('<div class="selected_image m-1" data-id="' + as + data[i].name + '"  style="display:inline-flex;border:2px solid grey;"><img style="align-items:center; margin:2px;" src="' + as + data[i].name + '" width="80"><div>');
            }
            $(".spinner").hide();
            $("#socket").show("closed");
        });

});
$("body").delegate(".select_icon", "click", function() {
    $('.socket_title').text('Select Image');
    var as = "{{ asset('') }}/notification_images/";
    $('.socket_body').html('<button class="btn btn-primary" onclick="upload_icon()" style="font-size:12px; padding:4px 8px;">Upload new Icon</button>');
    $.get('{{ route('
        admin - upload_image_list ') }}',
        function(data) {
            var data = JSON.parse(JSON.stringify(data));
            $('.socket_body_main').empty().html("");
            for (var i = 0; i < data.length; i++) {
                $('.socket_body_main').append('<div class="selected_icon m-1" data-id="' + as + data[i].name + '" style="display:inline-flex;border:2px solid grey;"><img style="align-items:center; margin:2px;"  src="' + as + data[i].name + '" width="80"><div>');
            }
            $(".spinner").hide();
            $("#socket").show("closed");
        });

});
$("body").delegate(".selected_image", "click", function() {
    var id = $(this).data('id');
    $('#image').val(id);
    $('.edit_image').attr('src', id);
    $('.selected_image').css('border', '2px solid grey');
    $(this).css('border', '2px solid tomato');
});
$("body").delegate(".selected_icon", "click", function() {
    var id = $(this).data('id');
    $('#icon').val(id);
    $('.edit_icon').attr('src', id);
    $('.selected_icon').css('border', '2px solid grey');
    $(this).css('border', '2px solid tomato');
});

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

</script>
@endsection
