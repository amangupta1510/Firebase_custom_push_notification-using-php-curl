<?php
namespace App\Http\Controllers;
use Validator;
use Response;
use File;
use Storage;
use disk;
use Auth;
use PDF;
use Zip;
use Session;
use newImage;
use ZanySoft\Zip\ZipManager;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\http\Requests;
use Illuminate\Http\Request;
use App\paper_link;
use App\student;
use App\result;
use App\teacher;
use App\time_left;
use App\admin;
use App\dpp;
use App\enquiry;
use App\dpp_link;
use App\advance_paper;
use App\answer;
use App\new_answer;
use App\normal_paper;
use App\online;
use App\question;
use App\new_question;
use App\chatbox;
use App\ts_folder;
use App\ts_folder_link;
use App\task_board;
use App\lecture;
use App\lecture_folder;
use App\lecture_link;
use App\lecture_subfolder;
use App\message;
use App\message_template;
use App\notification;
use App\notification_template;
use App\image;
use App\token;
use DB;
use Carbon\Carbon;

class AdminNotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function add_notification(Request $request)
    {
        return view('admin.add_notification');
    }
    public function edit_notification(Request $request)
    {
        $users = notification_template::where(['active' => '1', 'id' => $request->get('id') ])
            ->get();
        return view('admin.edit_notification', compact('users'));
    }
    public function add_notification_submit(Request $request)
    {
        $notification = new notification_template();
        $notification->acd_id = Auth::user()->acd_id;
        $notification->acd_name = Auth::user()->acd_name;
        $notification->notification_type = $request->notification_type;
        $notification->title = $request->title;
        $notification->body = $request->body;
        $notification->title_long = $request->title_long;
        $notification->body_long = $request->body_long;
        $notification->title_line = $request->title_line;
        $notification->body_line1 = $request->body_line1;
        $notification->body_line2 = $request->body_line2;
        $notification->body_line3 = $request->body_line3;
        $notification->body_line4 = $request->body_line4;
        $notification->body_line5 = $request->body_line5;
        $notification->body_line6 = $request->body_line6;
        $notification->body_line7 = $request->body_line7;
        $notification->body_line8 = $request->body_line8;
        $notification->body_line9 = $request->body_line9;
        $notification->body_line10 = $request->body_line10;
        $notification->summary = $request->summary;
        $notification->icon = $request->icon;
        $notification->image = $request->image;
        $notification->count = 0;
        $notification->active = "1";
        $notification->save();
        return Response::json($notification->id);
    }
    public function edit_notification_submit(Request $request)
    {
        $notification = notification_template::find($request->id);
        $notification->acd_id = Auth::user()->acd_id;
        $notification->acd_name = Auth::user()->acd_name;
        $notification->notification_type = $request->notification_type;
        $notification->title = $request->title;
        $notification->body = $request->body;
        $notification->title_long = $request->title_long;
        $notification->body_long = $request->body_long;
        $notification->title_line = $request->title_line;
        $notification->body_line1 = $request->body_line1;
        $notification->body_line2 = $request->body_line2;
        $notification->body_line3 = $request->body_line3;
        $notification->body_line4 = $request->body_line4;
        $notification->body_line5 = $request->body_line5;
        $notification->body_line6 = $request->body_line6;
        $notification->body_line7 = $request->body_line7;
        $notification->body_line8 = $request->body_line8;
        $notification->body_line9 = $request->body_line9;
        $notification->body_line10 = $request->body_line10;
        $notification->summary = $request->summary;
        $notification->icon = $request->icon;
        $notification->image = $request->image;
        $notification->active = "1";
        $notification->save();
        return Response::json($notification->id);
    }

    public function upload_image_submit(Request $request)
    {
        $this->validate($request, ['images' => 'required']);
        if ($request->hasfile('images'))
        {
            foreach ($request->file('images') as $file)
            {
                $name = $file->getClientOriginalName();
                $file_name = pathinfo($name, PATHINFO_FILENAME);
                $path = base_path() . '/public_html/notification_images/';
                $file->move($path, $name);
                $img = new image();
                $img->acd_id = Auth::user()->acd_id;
                $img->acd_name = Auth::user()->acd_name;
                $img->name = $name;
                $img->url = 'notification_images/' . $name;
                $img->thumb_url = 'notification_images/' . $name;
                $img->active = "1";
                $img->save();
            }
        }
        return Response::json($file);
    }
    public function upload_image_list(Request $request)
    {
        $data = image::where(['active' => '1'])->get();
        return Response::json($data);
    }

    public function notification_templates(Request $request)
    {
        $users = notification_template::where(['active' => '1'])->orderBy('id', 'desc')
            ->paginate(30);
        return view('admin.notification_templates', compact('users'));
    }

    public function delete_notification_templates(Request $request)
    {
        $files = notification_template::where('id', $request->id)
            ->update(['active' => 0]);
        $file = notification::where('notification_id', $request->id)
            ->update(['active' => 0]);
        return Response::json($files);
    }

    public function publish_notification(Request $request)
    {
        $users = notification_template::where(['id' => $request->get('id') , 'active' => '1'])
            ->get();
        return view('admin.publish_notification', compact('users'));
    }

    public function publish_notification_submit(Request $request)
    {
        $dateTimestamp1 = strtotime($request->publishtime);
        $dateTimestamp2 = time();
        if ($dateTimestamp2 > $dateTimestamp1)
        {
            $status = "Sended";
        }
        else
        {
            $status = "Pending";
        }
        $noti = notification_template::find($request->id);
        $notification = new notification();
        $notification->acd_id = Auth::user()->acd_id;
        $notification->acd_name = Auth::user()->acd_name;
        $notification->notification_id = $noti->id;
        $notification->notification_type = $noti->notification_type;
        $notification->title = $noti->title;
        $notification->body = $noti->body;
        $notification->title_long = $noti->title_long;
        $notification->body_long = $noti->body_long;
        $notification->title_line = $noti->title_line;
        $notification->body_line1 = $noti->body_line1;
        $notification->body_line2 = $noti->body_line2;
        $notification->body_line3 = $noti->body_line3;
        $notification->body_line4 = $noti->body_line4;
        $notification->body_line5 = $noti->body_line5;
        $notification->body_line6 = $noti->body_line6;
        $notification->body_line7 = $noti->body_line7;
        $notification->body_line8 = $noti->body_line8;
        $notification->body_line9 = $noti->body_line9;
        $notification->body_line10 = $noti->body_line10;
        $notification->summary = $noti->summary;
        $notification->icon = $noti->icon;
        $notification->image = $noti->image;
        $notification->send_to = $request->send_to;
        $notification->classid = $request->class;
        $notification->courseid = $request->course;
        $notification->coursetypeid = $request->coursetype;
        $notification->groupid = $request->group;
        $notification->cccgid = $request->class . $request->course . $request->coursetype . $request->group;
        $notification->user_type = $request->user_type;
        $notification->user_id = $request->user_id;
        $notification->user_name = $request->user_name;
        $notification->status = $status;
        $notification->publishtime = $request->publishtime;
        $notification->active = "1";
        $notification->save();

        $browser_token = array();
        $br_tk = 0;
        $app_tk = 0;
        $app_token = array();
        if ($status == 'Sended')
        {
            $url = 'https://fcm.googleapis.com/fcm/send';
            if ($request->send_to == "All Students")
            {
                $fields = array(
                    'to' => '/topics/com_inspireuser_app',
                    'data' => array(
                        "title" => $noti->title,
                        "body" => $noti->body,
                        "title_long" => $noti->title_long,
                        "body_long" => $noti->body_long,
                        "title_line" => $noti->title_line,
                        "body_line1" => $noti->body_line1,
                        "body_line2" => $noti->body_line2,
                        "body_line3" => $noti->body_line3,
                        "body_line4" => $noti->body_line4,
                        "body_line5" => $noti->body_line5,
                        "body_line6" => $noti->body_line6,
                        "body_line7" => $noti->body_line7,
                        "body_line8" => $noti->body_line8,
                        "body_line9" => $noti->body_line9,
                        "body_line10" => $noti->body_line10,
                        "summary" => $noti->summary,
                        "icon" => $noti->icon,
                        "sound" => "notification",
                        "noti_id" => rand(3, 8) ,
                        "channel_id" => "Notification",
                        "image" => $noti->image,
                        "type" => $noti->notification_type,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );
                $fields = json_encode($fields);
                $headers = array(
                    "Authorization: key=" . env('FCM_SERVER_KEY') ,
                    'Content-Type: application/json'
                );
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);

                if ($noti->notification_type == 'no_icon')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon' || $noti->notification_type == 'left_icon')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = '';
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'right_icon_long')
                {
                    $title = $noti->title_long;
                    $body = $noti->body_long;
                    $image = '';
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'no_icon_long')
                {
                    $title = $noti->title_long;
                    $body = $noti->body_long;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'no_icon_image')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = $noti->image;
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon_image_hide' || $noti->notification_type == 'right_icon_image_show')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = $noti->image;
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'no_icon_lines')
                {
                    $title = $noti->title_line;
                    $body = $noti->body_line1 . ' ' . $noti->body_line2 . ' ' . $noti->body_line3 . ' ' . $noti->body_line4 . ' ' . $noti->body_line5 . ' ' . $noti->body_line6 . ' ' . $noti->body_line7 . ' ' . $noti->body_line8 . ' ' . $noti->body_line9 . ' ' . $noti->body_line10;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon_lines')
                {
                    $title = $noti->title_line;
                    $body = $noti->body_line1 . ' ' . $noti->body_line2 . ' ' . $noti->body_line3 . ' ' . $noti->body_line4 . ' ' . $noti->body_line5 . ' ' . $noti->body_line6 . ' ' . $noti->body_line7 . ' ' . $noti->body_line8 . ' ' . $noti->body_line9 . ' ' . $noti->body_line10;
                    $image = '';
                    $icon = $noti->icon;
                }
                $fields = array(
                    'to' => '/topics/com_inspireuser_web',
                    'notification' => array(
                        "title" => $title,
                        "body" => $body,
                        "icon" => $icon,
                        "sound" => "notification",
                        "noti_id" => rand(3, 8) ,
                        "image" => $image,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );
                $fields = json_encode($fields);
                $headers = array(
                    "Authorization: key=" . env('FCM_SERVER_KEY') ,
                    'Content-Type: application/json'
                );
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);

            }
            elseif ($request->send_to == "Class")
            {
                $userss = student::where(['class' => $request->class, 'active' => '1'])
                    ->select('id')
                    ->get();
                foreach ($userss as $users)
                {
                    $use = token::where(['user_id' => $users->id, 'user_type' => 'student', 'active' => '1'])
                        ->get();
                    foreach ($use as $user)
                    {
                        if ($user->token_type == "Application")
                        {
                            $app_token[$app_tk] = $user->token;
                            $app_tk++;
                        }
                        else
                        {
                            $browser_token[$br_tk] = $user->token;
                            $br_tk++;
                        }
                    }
                }
                $app_fields = array(
                    'registration_ids' => $app_token,
                    'data' => array(
                        "title" => $noti->title,
                        "body" => $noti->body,
                        "title_long" => $noti->title_long,
                        "body_long" => $noti->body_long,
                        "title_line" => $noti->title_line,
                        "body_line1" => $noti->body_line1,
                        "body_line2" => $noti->body_line2,
                        "body_line3" => $noti->body_line3,
                        "body_line4" => $noti->body_line4,
                        "body_line5" => $noti->body_line5,
                        "body_line6" => $noti->body_line6,
                        "body_line7" => $noti->body_line7,
                        "body_line8" => $noti->body_line8,
                        "body_line9" => $noti->body_line9,
                        "body_line10" => $noti->body_line10,
                        "summary" => $noti->summary,
                        "icon" => $noti->icon,
                        "sound" => "notification",
                        "noti_id" => rand(3, 8) ,
                        "channel_id" => "Notification",
                        "image" => $noti->image,
                        "type" => $noti->notification_type,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );

                if ($noti->notification_type == 'no_icon')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon' || $noti->notification_type == 'left_icon')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = '';
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'right_icon_long')
                {
                    $title = $noti->title_long;
                    $body = $noti->body_long;
                    $image = '';
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'no_icon_long')
                {
                    $title = $noti->title_long;
                    $body = $noti->body_long;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'no_icon_image')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = $noti->image;
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon_image_hide' || $noti->notification_type == 'right_icon_image_show')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = $noti->image;
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'no_icon_lines')
                {
                    $title = $noti->title_line;
                    $body = $noti->body_line1 . ' ' . $noti->body_line2 . ' ' . $noti->body_line3 . ' ' . $noti->body_line4 . ' ' . $noti->body_line5 . ' ' . $noti->body_line6 . ' ' . $noti->body_line7 . ' ' . $noti->body_line8 . ' ' . $noti->body_line9 . ' ' . $noti->body_line10;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon_lines')
                {
                    $title = $noti->title_line;
                    $body = $noti->body_line1 . ' ' . $noti->body_line2 . ' ' . $noti->body_line3 . ' ' . $noti->body_line4 . ' ' . $noti->body_line5 . ' ' . $noti->body_line6 . ' ' . $noti->body_line7 . ' ' . $noti->body_line8 . ' ' . $noti->body_line9 . ' ' . $noti->body_line10;
                    $image = '';
                    $icon = $noti->icon;
                }

                $browser_fields = array(
                    'registration_ids' => $browser_token,
                    'notification' => array(
                        "title" => $title,
                        "body" => $body,
                        "icon" => $icon,
                        "sound" => "notification",
                        "noti_id" => rand(3, 8) ,
                        "image" => $image,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );

                $headers = array(
                    "Authorization: key=" . env('FCM_SERVER_KEY') ,
                    'Content-Type: application/json'
                );

                $fields = json_encode($app_fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);
                $fields = json_encode($browser_fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);
            }
            elseif ($request->send_to == "Course")
            {
                $userss = student::where(['class' => $request->class, 'course' => $request->course, 'active' => '1'])
                    ->select('id')
                    ->get();
                foreach ($userss as $users)
                {
                    $use = token::where(['user_id' => $users->id, 'user_type' => 'student', 'active' => '1'])
                        ->get();
                    foreach ($use as $user)
                    {
                        if ($user->token_type == "Application")
                        {
                            $app_token[$app_tk] = $user->token;
                            $app_tk++;
                        }
                        else
                        {
                            $browser_token[$br_tk] = $user->token;
                            $br_tk++;
                        }
                    }
                }
                $app_fields = array(
                    'registration_ids' => $app_token,
                    'data' => array(
                        "title" => $noti->title,
                        "body" => $noti->body,
                        "title_long" => $noti->title_long,
                        "body_long" => $noti->body_long,
                        "title_line" => $noti->title_line,
                        "body_line1" => $noti->body_line1,
                        "body_line2" => $noti->body_line2,
                        "body_line3" => $noti->body_line3,
                        "body_line4" => $noti->body_line4,
                        "body_line5" => $noti->body_line5,
                        "body_line6" => $noti->body_line6,
                        "body_line7" => $noti->body_line7,
                        "body_line8" => $noti->body_line8,
                        "body_line9" => $noti->body_line9,
                        "body_line10" => $noti->body_line10,
                        "summary" => $noti->summary,
                        "icon" => $noti->icon,
                        "sound" => "notification",
                        "noti_id" => rand(3, 8) ,
                        "channel_id" => "Notification",
                        "image" => $noti->image,
                        "type" => $noti->notification_type,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );

                if ($noti->notification_type == 'no_icon')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon' || $noti->notification_type == 'left_icon')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = '';
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'right_icon_long')
                {
                    $title = $noti->title_long;
                    $body = $noti->body_long;
                    $image = '';
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'no_icon_long')
                {
                    $title = $noti->title_long;
                    $body = $noti->body_long;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'no_icon_image')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = $noti->image;
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon_image_hide' || $noti->notification_type == 'right_icon_image_show')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = $noti->image;
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'no_icon_lines')
                {
                    $title = $noti->title_line;
                    $body = $noti->body_line1 . ' ' . $noti->body_line2 . ' ' . $noti->body_line3 . ' ' . $noti->body_line4 . ' ' . $noti->body_line5 . ' ' . $noti->body_line6 . ' ' . $noti->body_line7 . ' ' . $noti->body_line8 . ' ' . $noti->body_line9 . ' ' . $noti->body_line10;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon_lines')
                {
                    $title = $noti->title_line;
                    $body = $noti->body_line1 . ' ' . $noti->body_line2 . ' ' . $noti->body_line3 . ' ' . $noti->body_line4 . ' ' . $noti->body_line5 . ' ' . $noti->body_line6 . ' ' . $noti->body_line7 . ' ' . $noti->body_line8 . ' ' . $noti->body_line9 . ' ' . $noti->body_line10;
                    $image = '';
                    $icon = $noti->icon;
                }
                $browser_fields = array(
                    'registration_ids' => $browser_token,
                    'notification' => array(
                        "title" => $title,
                        "body" => $body,
                        "icon" => $icon,
                        "sound" => "notification",
                        "noti_id" => rand(3, 8) ,
                        "image" => $image,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );

                $headers = array(
                    "Authorization: key=" . env('FCM_SERVER_KEY') ,
                    'Content-Type: application/json'
                );

                $fields = json_encode($app_fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);
                $fields = json_encode($browser_fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);
            }
            elseif ($request->send_to == "Course Type")
            {
                $userss = student::where(['class' => $request->class, 'course' => $request->course, 'coursetype' => $request->coursetype, 'active' => '1'])
                    ->select('id')
                    ->get();
                foreach ($userss as $users)
                {
                    $use = token::where(['user_id' => $users->id, 'user_type' => 'student', 'active' => '1'])
                        ->get();
                    foreach ($use as $user)
                    {
                        if ($user->token_type == "Application")
                        {
                            $app_token[$app_tk] = $user->token;
                            $app_tk++;
                        }
                        else
                        {
                            $browser_token[$br_tk] = $user->token;
                            $br_tk++;
                        }
                    }
                }
                $app_fields = array(
                    'registration_ids' => $app_token,
                    'data' => array(
                        "title" => $noti->title,
                        "body" => $noti->body,
                        "title_long" => $noti->title_long,
                        "body_long" => $noti->body_long,
                        "title_line" => $noti->title_line,
                        "body_line1" => $noti->body_line1,
                        "body_line2" => $noti->body_line2,
                        "body_line3" => $noti->body_line3,
                        "body_line4" => $noti->body_line4,
                        "body_line5" => $noti->body_line5,
                        "body_line6" => $noti->body_line6,
                        "body_line7" => $noti->body_line7,
                        "body_line8" => $noti->body_line8,
                        "body_line9" => $noti->body_line9,
                        "body_line10" => $noti->body_line10,
                        "summary" => $noti->summary,
                        "icon" => $noti->icon,
                        "sound" => "notification",
                        "noti_id" => rand(3, 8) ,
                        "channel_id" => "Notification",
                        "image" => $noti->image,
                        "type" => $noti->notification_type,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );

                if ($noti->notification_type == 'no_icon')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon' || $noti->notification_type == 'left_icon')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = '';
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'right_icon_long')
                {
                    $title = $noti->title_long;
                    $body = $noti->body_long;
                    $image = '';
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'no_icon_long')
                {
                    $title = $noti->title_long;
                    $body = $noti->body_long;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'no_icon_image')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = $noti->image;
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon_image_hide' || $noti->notification_type == 'right_icon_image_show')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = $noti->image;
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'no_icon_lines')
                {
                    $title = $noti->title_line;
                    $body = $noti->body_line1 . ' ' . $noti->body_line2 . ' ' . $noti->body_line3 . ' ' . $noti->body_line4 . ' ' . $noti->body_line5 . ' ' . $noti->body_line6 . ' ' . $noti->body_line7 . ' ' . $noti->body_line8 . ' ' . $noti->body_line9 . ' ' . $noti->body_line10;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon_lines')
                {
                    $title = $noti->title_line;
                    $body = $noti->body_line1 . ' ' . $noti->body_line2 . ' ' . $noti->body_line3 . ' ' . $noti->body_line4 . ' ' . $noti->body_line5 . ' ' . $noti->body_line6 . ' ' . $noti->body_line7 . ' ' . $noti->body_line8 . ' ' . $noti->body_line9 . ' ' . $noti->body_line10;
                    $image = '';
                    $icon = $noti->icon;
                }
                $browser_fields = array(
                    'registration_ids' => $browser_token,
                    'notification' => array(
                        "title" => $title,
                        "body" => $body,
                        "icon" => $icon,
                        "sound" => "notification",
                        "noti_id" => rand(3, 8) ,
                        "image" => $image,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );
                $headers = array(
                    "Authorization: key=" . env('FCM_SERVER_KEY') ,
                    'Content-Type: application/json'
                );

                $fields = json_encode($app_fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);
                $fields = json_encode($browser_fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);
            }
            elseif ($request->send_to == "Group")
            {
                $userss = student::where(['class' => $request->class, 'course' => $request->course, 'coursetype' => $request->coursetype, 'groupid' => $request->group, 'active' => '1'])
                    ->select('id')
                    ->get();
                foreach ($userss as $users)
                {
                    $use = token::where(['user_id' => $users->id, 'user_type' => 'student', 'active' => '1'])
                        ->get();
                    foreach ($use as $user)
                    {
                        if ($user->token_type == "Application")
                        {
                            $app_token[$app_tk] = $user->token;
                            $app_tk++;
                        }
                        else
                        {
                            $browser_token[$br_tk] = $user->token;
                            $br_tk++;
                        }
                    }
                }
                $app_fields = array(
                    'registration_ids' => $app_token,
                    'data' => array(
                        "title" => $noti->title,
                        "body" => $noti->body,
                        "title_long" => $noti->title_long,
                        "body_long" => $noti->body_long,
                        "title_line" => $noti->title_line,
                        "body_line1" => $noti->body_line1,
                        "body_line2" => $noti->body_line2,
                        "body_line3" => $noti->body_line3,
                        "body_line4" => $noti->body_line4,
                        "body_line5" => $noti->body_line5,
                        "body_line6" => $noti->body_line6,
                        "body_line7" => $noti->body_line7,
                        "body_line8" => $noti->body_line8,
                        "body_line9" => $noti->body_line9,
                        "body_line10" => $noti->body_line10,
                        "summary" => $noti->summary,
                        "icon" => $noti->icon,
                        "sound" => "notification",
                        "noti_id" => rand(3, 8) ,
                        "channel_id" => "Notification",
                        "image" => $noti->image,
                        "type" => $noti->notification_type,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );

                if ($noti->notification_type == 'no_icon')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon' || $noti->notification_type == 'left_icon')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = '';
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'right_icon_long')
                {
                    $title = $noti->title_long;
                    $body = $noti->body_long;
                    $image = '';
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'no_icon_long')
                {
                    $title = $noti->title_long;
                    $body = $noti->body_long;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'no_icon_image')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = $noti->image;
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon_image_hide' || $noti->notification_type == 'right_icon_image_show')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = $noti->image;
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'no_icon_lines')
                {
                    $title = $noti->title_line;
                    $body = $noti->body_line1 . ' ' . $noti->body_line2 . ' ' . $noti->body_line3 . ' ' . $noti->body_line4 . ' ' . $noti->body_line5 . ' ' . $noti->body_line6 . ' ' . $noti->body_line7 . ' ' . $noti->body_line8 . ' ' . $noti->body_line9 . ' ' . $noti->body_line10;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon_lines')
                {
                    $title = $noti->title_line;
                    $body = $noti->body_line1 . ' ' . $noti->body_line2 . ' ' . $noti->body_line3 . ' ' . $noti->body_line4 . ' ' . $noti->body_line5 . ' ' . $noti->body_line6 . ' ' . $noti->body_line7 . ' ' . $noti->body_line8 . ' ' . $noti->body_line9 . ' ' . $noti->body_line10;
                    $image = '';
                    $icon = $noti->icon;
                }
                $browser_fields = array(
                    'registration_ids' => $browser_token,
                    'notification' => array(
                        "title" => $title,
                        "body" => $body,
                        "icon" => $icon,
                        "sound" => "notification",
                        "noti_id" => rand(3, 8) ,
                        "image" => $image,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );
                $headers = array(
                    "Authorization: key=" . env('FCM_SERVER_KEY') ,
                    'Content-Type: application/json'
                );

                $fields = json_encode($app_fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);
                $fields = json_encode($browser_fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);
            }
            elseif ($request->send_to == "Student")
            {
                $use = token::where(['user_id' => $request->user_id, 'user_type' => 'student', 'active' => '1'])
                    ->get();
                foreach ($use as $user)
                {
                    if ($user->token_type == "Application")
                    {
                        $app_token[$app_tk] = $user->token;
                        $app_tk++;
                    }
                    else
                    {
                        $browser_token[$br_tk] = $user->token;
                        $br_tk++;
                    }
                }

                $app_fields = array(
                    'registration_ids' => $app_token,
                    'data' => array(
                        "title" => $noti->title,
                        "body" => $noti->body,
                        "title_long" => $noti->title_long,
                        "body_long" => $noti->body_long,
                        "title_line" => $noti->title_line,
                        "body_line1" => $noti->body_line1,
                        "body_line2" => $noti->body_line2,
                        "body_line3" => $noti->body_line3,
                        "body_line4" => $noti->body_line4,
                        "body_line5" => $noti->body_line5,
                        "body_line6" => $noti->body_line6,
                        "body_line7" => $noti->body_line7,
                        "body_line8" => $noti->body_line8,
                        "body_line9" => $noti->body_line9,
                        "body_line10" => $noti->body_line10,
                        "summary" => $noti->summary,
                        "icon" => $noti->icon,
                        "sound" => "notification",
                        "noti_id" => rand(3, 8) ,
                        "channel_id" => "Notification",
                        "image" => $noti->image,
                        "type" => $noti->notification_type,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );

                if ($noti->notification_type == 'no_icon')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon' || $noti->notification_type == 'left_icon')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = '';
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'right_icon_long')
                {
                    $title = $noti->title_long;
                    $body = $noti->body_long;
                    $image = '';
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'no_icon_long')
                {
                    $title = $noti->title_long;
                    $body = $noti->body_long;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'no_icon_image')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = $noti->image;
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon_image_hide' || $noti->notification_type == 'right_icon_image_show')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = $noti->image;
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'no_icon_lines')
                {
                    $title = $noti->title_line;
                    $body = $noti->body_line1 . ' ' . $noti->body_line2 . ' ' . $noti->body_line3 . ' ' . $noti->body_line4 . ' ' . $noti->body_line5 . ' ' . $noti->body_line6 . ' ' . $noti->body_line7 . ' ' . $noti->body_line8 . ' ' . $noti->body_line9 . ' ' . $noti->body_line10;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon_lines')
                {
                    $title = $noti->title_line;
                    $body = $noti->body_line1 . ' ' . $noti->body_line2 . ' ' . $noti->body_line3 . ' ' . $noti->body_line4 . ' ' . $noti->body_line5 . ' ' . $noti->body_line6 . ' ' . $noti->body_line7 . ' ' . $noti->body_line8 . ' ' . $noti->body_line9 . ' ' . $noti->body_line10;
                    $image = '';
                    $icon = $noti->icon;
                }
                $browser_fields = array(
                    'registration_ids' => $browser_token,
                    'notification' => array(
                        "title" => $title,
                        "body" => $body,
                        "icon" => $icon,
                        "sound" => "notification",
                        "noti_id" => rand(3, 8) ,
                        "image" => $image,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );
                $headers = array(
                    "Authorization: key=" . env('FCM_SERVER_KEY') ,
                    'Content-Type: application/json'
                );

                $fields = json_encode($app_fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);
                $fields = json_encode($browser_fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);
            }
            elseif ($request->send_to == "Teacher")
            {
                $use = token::where(['user_id' => $request->user_id, 'user_type' => 'teacher', 'active' => '1'])
                    ->get();
                foreach ($use as $user)
                {
                    if ($user->token_type == "Application")
                    {
                        $app_token[$app_tk] = $user->token;
                        $app_tk++;
                    }
                    else
                    {
                        $browser_token[$br_tk] = $user->token;
                        $br_tk++;
                    }
                }

                $app_fields = array(
                    'registration_ids' => $app_token,
                    'data' => array(
                        "title" => $noti->title,
                        "body" => $noti->body,
                        "title_long" => $noti->title_long,
                        "body_long" => $noti->body_long,
                        "title_line" => $noti->title_line,
                        "body_line1" => $noti->body_line1,
                        "body_line2" => $noti->body_line2,
                        "body_line3" => $noti->body_line3,
                        "body_line4" => $noti->body_line4,
                        "body_line5" => $noti->body_line5,
                        "body_line6" => $noti->body_line6,
                        "body_line7" => $noti->body_line7,
                        "body_line8" => $noti->body_line8,
                        "body_line9" => $noti->body_line9,
                        "body_line10" => $noti->body_line10,
                        "summary" => $noti->summary,
                        "icon" => $noti->icon,
                        "sound" => "notification",
                        "noti_id" => rand(3, 8) ,
                        "channel_id" => "Notification",
                        "image" => $noti->image,
                        "type" => $noti->notification_type,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );

                if ($noti->notification_type == 'no_icon')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon' || $noti->notification_type == 'left_icon')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = '';
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'right_icon_long')
                {
                    $title = $noti->title_long;
                    $body = $noti->body_long;
                    $image = '';
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'no_icon_long')
                {
                    $title = $noti->title_long;
                    $body = $noti->body_long;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'no_icon_image')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = $noti->image;
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon_image_hide' || $noti->notification_type == 'right_icon_image_show')
                {
                    $title = $noti->title;
                    $body = $noti->body;
                    $image = $noti->image;
                    $icon = $noti->icon;
                }
                elseif ($noti->notification_type == 'no_icon_lines')
                {
                    $title = $noti->title_line;
                    $body = $noti->body_line1 . ' ' . $noti->body_line2 . ' ' . $noti->body_line3 . ' ' . $noti->body_line4 . ' ' . $noti->body_line5 . ' ' . $noti->body_line6 . ' ' . $noti->body_line7 . ' ' . $noti->body_line8 . ' ' . $noti->body_line9 . ' ' . $noti->body_line10;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($noti->notification_type == 'right_icon_lines')
                {
                    $title = $noti->title_line;
                    $body = $noti->body_line1 . ' ' . $noti->body_line2 . ' ' . $noti->body_line3 . ' ' . $noti->body_line4 . ' ' . $noti->body_line5 . ' ' . $noti->body_line6 . ' ' . $noti->body_line7 . ' ' . $noti->body_line8 . ' ' . $noti->body_line9 . ' ' . $noti->body_line10;
                    $image = '';
                    $icon = $noti->icon;
                }
                $browser_fields = array(
                    'registration_ids' => $browser_token,
                    'notification' => array(
                        "title" => $title,
                        "body" => $body,
                        "icon" => $icon,
                        "sound" => "notification",
                        "noti_id" => rand(3, 8) ,
                        "image" => $image,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );
                $headers = array(
                    "Authorization: key=" . env('FCM_SERVER_KEY') ,
                    'Content-Type: application/json'
                );

                $fields = json_encode($app_fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);
                $fields = json_encode($browser_fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);
            }
        }
        $noti->count = $noti->count + 1;
        $noti->save();
        return Response::json($noti->id);
    }

    public function publish_auto_notification_submit(Request $request)
    {
        $dateTimestamp1 = strtotime($request->publishtime);
        $dateTimestamp2 = time();
        if ($dateTimestamp2 > $dateTimestamp1)
        {
            $status = "Sended";
        }
        else
        {
            $status = "Pending";
        }

        $notification = new notification();
        $notification->acd_id = Auth::user()->acd_id;
        $notification->acd_name = Auth::user()->acd_name;
        $notification->notification_id = $request->id;
        $notification->notification_type = $request->notification_type;
        $notification->title = $request->title;
        $notification->body = $request->body;
        $notification->title_long = $request->title_long;
        $notification->body_long = $request->body_long;
        $notification->title_line = $request->title_line;
        $notification->body_line1 = $request->body_line1;
        $notification->body_line2 = $request->body_line2;
        $notification->body_line3 = $request->body_line3;
        $notification->body_line4 = $request->body_line4;
        $notification->body_line5 = $request->body_line5;
        $notification->body_line6 = $request->body_line6;
        $notification->body_line7 = $request->body_line7;
        $notification->body_line8 = $request->body_line8;
        $notification->body_line9 = $request->body_line9;
        $notification->body_line10 = $request->body_line10;
        $notification->summary = $request->summary;
        $notification->icon = $request->icon;
        $notification->image = $request->image;
        $notification->send_to = $request->send_to;
        $notification->classid = $request->class;
        $notification->courseid = $request->course;
        $notification->coursetypeid = $request->coursetype;
        $notification->groupid = $request->group;
        $notification->cccgid = $request->cccgid;
        $notification->user_type = $request->user_type;
        $notification->user_id = $request->user_id;
        $notification->user_name = $request->user_name;
        $notification->status = $status;
        $notification->publishtime = $request->publishtime;
        $notification->active = "1";
        $notification->save();

        $browser_token = array();
        $br_tk = 0;
        $app_tk = 0;
        $app_token = array();
        $url = 'https://fcm.googleapis.com/fcm/send';
        if ($request->send_to == "All Students")
        {
            $fields = array(
                'to' => '/topics/com_inspireuser_app',
                'data' => array(
                    "title" => $request->title,
                    "body" => $request->body,
                    "title_long" => $request->title_long,
                    "body_long" => $request->body_long,
                    "title_line" => $request->title_line,
                    "body_line1" => $request->body_line1,
                    "body_line2" => $request->body_line2,
                    "body_line3" => $request->body_line3,
                    "body_line4" => $request->body_line4,
                    "body_line5" => $request->body_line5,
                    "body_line6" => $request->body_line6,
                    "body_line7" => $request->body_line7,
                    "body_line8" => $request->body_line8,
                    "body_line9" => $request->body_line9,
                    "body_line10" => $request->body_line10,
                    "summary" => $request->summary,
                    "icon" => $request->icon,
                    "sound" => "notification",
                    "noti_id" => rand(3, 8) ,
                    "channel_id" => "Notification",
                    "image" => $request->image,
                    "type" => $request->notification_type,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );
            $fields = json_encode($fields);
            $headers = array(
                "Authorization: key=" . env('FCM_SERVER_KEY') ,
                'Content-Type: application/json'
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);

            if ($request->notification_type == 'no_icon')
            {
                $title = $request->title;
                $body = $request->body;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon' || $request->notification_type == 'left_icon')
            {
                $title = $request->title;
                $body = $request->body;
                $image = '';
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'right_icon_long')
            {
                $title = $request->title_long;
                $body = $request->body_long;
                $image = '';
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'no_icon_long')
            {
                $title = $request->title_long;
                $body = $request->body_long;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'no_icon_image')
            {
                $title = $request->title;
                $body = $request->body;
                $image = $request->image;
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon_image_hide' || $request->notification_type == 'right_icon_image_show')
            {
                $title = $request->title;
                $body = $request->body;
                $image = $request->image;
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'no_icon_lines')
            {
                $title = $request->title_line;
                $body = $request->body_line1 . ' ' . $request->body_line2 . ' ' . $request->body_line3 . ' ' . $request->body_line4 . ' ' . $request->body_line5 . ' ' . $request->body_line6 . ' ' . $request->body_line7 . ' ' . $request->body_line8 . ' ' . $request->body_line9 . ' ' . $request->body_line10;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon_lines')
            {
                $title = $request->title_line;
                $body = $request->body_line1 . ' ' . $request->body_line2 . ' ' . $request->body_line3 . ' ' . $request->body_line4 . ' ' . $request->body_line5 . ' ' . $request->body_line6 . ' ' . $request->body_line7 . ' ' . $request->body_line8 . ' ' . $request->body_line9 . ' ' . $request->body_line10;
                $image = '';
                $icon = $request->icon;
            }
            $fields = array(
                'to' => '/topics/com_inspireuser_web',
                'notification' => array(
                    "title" => $title,
                    "body" => $body,
                    "icon" => $icon,
                    "sound" => "notification",
                    "noti_id" => rand(3, 8) ,
                    "image" => $image,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );
            $fields = json_encode($fields);
            $headers = array(
                "Authorization: key=" . env('FCM_SERVER_KEY') ,
                'Content-Type: application/json'
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);

        }
        elseif ($request->send_to == "Class")
        {
            $userss = student::where(['class' => $request->class, 'active' => '1'])
                ->select('id')
                ->get();
            foreach ($userss as $users)
            {
                $use = token::where(['user_id' => $users->id, 'user_type' => 'student', 'active' => '1'])
                    ->get();
                foreach ($use as $user)
                {
                    if ($user->token_type == "Application")
                    {
                        $app_token[$app_tk] = $user->token;
                        $app_tk++;
                    }
                    else
                    {
                        $browser_token[$br_tk] = $user->token;
                        $br_tk++;
                    }
                }
            }
            $app_fields = array(
                'registration_ids' => $app_token,
                'data' => array(
                    "title" => $request->title,
                    "body" => $request->body,
                    "title_long" => $request->title_long,
                    "body_long" => $request->body_long,
                    "title_line" => $request->title_line,
                    "body_line1" => $request->body_line1,
                    "body_line2" => $request->body_line2,
                    "body_line3" => $request->body_line3,
                    "body_line4" => $request->body_line4,
                    "body_line5" => $request->body_line5,
                    "body_line6" => $request->body_line6,
                    "body_line7" => $request->body_line7,
                    "body_line8" => $request->body_line8,
                    "body_line9" => $request->body_line9,
                    "body_line10" => $request->body_line10,
                    "summary" => $request->summary,
                    "icon" => $request->icon,
                    "sound" => "notification",
                    "noti_id" => rand(3, 8) ,
                    "channel_id" => "Notification",
                    "image" => $request->image,
                    "type" => $request->notification_type,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );

            if ($request->notification_type == 'no_icon')
            {
                $title = $request->title;
                $body = $request->body;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon' || $request->notification_type == 'left_icon')
            {
                $title = $request->title;
                $body = $request->body;
                $image = '';
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'right_icon_long')
            {
                $title = $request->title_long;
                $body = $request->body_long;
                $image = '';
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'no_icon_long')
            {
                $title = $request->title_long;
                $body = $request->body_long;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'no_icon_image')
            {
                $title = $request->title;
                $body = $request->body;
                $image = $request->image;
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon_image_hide' || $request->notification_type == 'right_icon_image_show')
            {
                $title = $request->title;
                $body = $request->body;
                $image = $request->image;
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'no_icon_lines')
            {
                $title = $request->title_line;
                $body = $request->body_line1 . ' ' . $request->body_line2 . ' ' . $request->body_line3 . ' ' . $request->body_line4 . ' ' . $request->body_line5 . ' ' . $request->body_line6 . ' ' . $request->body_line7 . ' ' . $request->body_line8 . ' ' . $request->body_line9 . ' ' . $request->body_line10;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon_lines')
            {
                $title = $request->title_line;
                $body = $request->body_line1 . ' ' . $request->body_line2 . ' ' . $request->body_line3 . ' ' . $request->body_line4 . ' ' . $request->body_line5 . ' ' . $request->body_line6 . ' ' . $request->body_line7 . ' ' . $request->body_line8 . ' ' . $request->body_line9 . ' ' . $request->body_line10;
                $image = '';
                $icon = $request->icon;
            }
            $browser_fields = array(
                'registration_ids' => $browser_token,
                'notification' => array(
                    "title" => $title,
                    "body" => $body,
                    "icon" => $icon,
                    "sound" => "notification",
                    "noti_id" => rand(3, 8) ,
                    "image" => $image,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );
            $headers = array(
                "Authorization: key=" . env('FCM_SERVER_KEY') ,
                'Content-Type: application/json'
            );

            $fields = json_encode($app_fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);
            $fields = json_encode($browser_fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);
        }
        elseif ($request->send_to == "Course")
        {
            $userss = student::where(['class' => $request->class, 'course' => $request->course, 'active' => '1'])
                ->select('id')
                ->get();
            foreach ($userss as $users)
            {
                $use = token::where(['user_id' => $users->id, 'user_type' => 'student', 'active' => '1'])
                    ->get();
                foreach ($use as $user)
                {
                    if ($user->token_type == "Application")
                    {
                        $app_token[$app_tk] = $user->token;
                        $app_tk++;
                    }
                    else
                    {
                        $browser_token[$br_tk] = $user->token;
                        $br_tk++;
                    }
                }
            }
            $app_fields = array(
                'registration_ids' => $app_token,
                'data' => array(
                    "title" => $request->title,
                    "body" => $request->body,
                    "title_long" => $request->title_long,
                    "body_long" => $request->body_long,
                    "title_line" => $request->title_line,
                    "body_line1" => $request->body_line1,
                    "body_line2" => $request->body_line2,
                    "body_line3" => $request->body_line3,
                    "body_line4" => $request->body_line4,
                    "body_line5" => $request->body_line5,
                    "body_line6" => $request->body_line6,
                    "body_line7" => $request->body_line7,
                    "body_line8" => $request->body_line8,
                    "body_line9" => $request->body_line9,
                    "body_line10" => $request->body_line10,
                    "summary" => $request->summary,
                    "icon" => $request->icon,
                    "sound" => "notification",
                    "noti_id" => rand(3, 8) ,
                    "channel_id" => "Notification",
                    "image" => $request->image,
                    "type" => $request->notification_type,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );

            if ($request->notification_type == 'no_icon')
            {
                $title = $request->title;
                $body = $request->body;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon' || $request->notification_type == 'left_icon')
            {
                $title = $request->title;
                $body = $request->body;
                $image = '';
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'right_icon_long')
            {
                $title = $request->title_long;
                $body = $request->body_long;
                $image = '';
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'no_icon_long')
            {
                $title = $request->title_long;
                $body = $request->body_long;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'no_icon_image')
            {
                $title = $request->title;
                $body = $request->body;
                $image = $request->image;
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon_image_hide' || $request->notification_type == 'right_icon_image_show')
            {
                $title = $request->title;
                $body = $request->body;
                $image = $request->image;
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'no_icon_lines')
            {
                $title = $request->title_line;
                $body = $request->body_line1 . ' ' . $request->body_line2 . ' ' . $request->body_line3 . ' ' . $request->body_line4 . ' ' . $request->body_line5 . ' ' . $request->body_line6 . ' ' . $request->body_line7 . ' ' . $request->body_line8 . ' ' . $request->body_line9 . ' ' . $request->body_line10;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon_lines')
            {
                $title = $request->title_line;
                $body = $request->body_line1 . ' ' . $request->body_line2 . ' ' . $request->body_line3 . ' ' . $request->body_line4 . ' ' . $request->body_line5 . ' ' . $request->body_line6 . ' ' . $request->body_line7 . ' ' . $request->body_line8 . ' ' . $request->body_line9 . ' ' . $request->body_line10;
                $image = '';
                $icon = $request->icon;
            }
            $browser_fields = array(
                'registration_ids' => $browser_token,
                'notification' => array(
                    "title" => $title,
                    "body" => $body,
                    "icon" => $icon,
                    "sound" => "notification",
                    "noti_id" => rand(3, 8) ,
                    "image" => $image,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );
            $headers = array(
                "Authorization: key=" . env('FCM_SERVER_KEY') ,
                'Content-Type: application/json'
            );

            $fields = json_encode($app_fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);
            $fields = json_encode($browser_fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);
        }
        elseif ($request->send_to == "Course Type")
        {
            $userss = student::where(['class' => $request->class, 'course' => $request->course, 'coursetype' => $request->coursetype, 'active' => '1'])
                ->select('id')
                ->get();
            foreach ($userss as $users)
            {
                $use = token::where(['user_id' => $users->id, 'user_type' => 'student', 'active' => '1'])
                    ->get();
                foreach ($use as $user)
                {
                    if ($user->token_type == "Application")
                    {
                        $app_token[$app_tk] = $user->token;
                        $app_tk++;
                    }
                    else
                    {
                        $browser_token[$br_tk] = $user->token;
                        $br_tk++;
                    }
                }
            }
            $app_fields = array(
                'registration_ids' => $app_token,
                'data' => array(
                    "title" => $request->title,
                    "body" => $request->body,
                    "title_long" => $request->title_long,
                    "body_long" => $request->body_long,
                    "title_line" => $request->title_line,
                    "body_line1" => $request->body_line1,
                    "body_line2" => $request->body_line2,
                    "body_line3" => $request->body_line3,
                    "body_line4" => $request->body_line4,
                    "body_line5" => $request->body_line5,
                    "body_line6" => $request->body_line6,
                    "body_line7" => $request->body_line7,
                    "body_line8" => $request->body_line8,
                    "body_line9" => $request->body_line9,
                    "body_line10" => $request->body_line10,
                    "summary" => $request->summary,
                    "icon" => $request->icon,
                    "sound" => "notification",
                    "noti_id" => rand(3, 8) ,
                    "channel_id" => "Notification",
                    "image" => $request->image,
                    "type" => $request->notification_type,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );

            if ($request->notification_type == 'no_icon')
            {
                $title = $request->title;
                $body = $request->body;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon' || $request->notification_type == 'left_icon')
            {
                $title = $request->title;
                $body = $request->body;
                $image = '';
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'right_icon_long')
            {
                $title = $request->title_long;
                $body = $request->body_long;
                $image = '';
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'no_icon_long')
            {
                $title = $request->title_long;
                $body = $request->body_long;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'no_icon_image')
            {
                $title = $request->title;
                $body = $request->body;
                $image = $request->image;
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon_image_hide' || $request->notification_type == 'right_icon_image_show')
            {
                $title = $request->title;
                $body = $request->body;
                $image = $request->image;
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'no_icon_lines')
            {
                $title = $request->title_line;
                $body = $request->body_line1 . ' ' . $request->body_line2 . ' ' . $request->body_line3 . ' ' . $request->body_line4 . ' ' . $request->body_line5 . ' ' . $request->body_line6 . ' ' . $request->body_line7 . ' ' . $request->body_line8 . ' ' . $request->body_line9 . ' ' . $request->body_line10;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon_lines')
            {
                $title = $request->title_line;
                $body = $request->body_line1 . ' ' . $request->body_line2 . ' ' . $request->body_line3 . ' ' . $request->body_line4 . ' ' . $request->body_line5 . ' ' . $request->body_line6 . ' ' . $request->body_line7 . ' ' . $request->body_line8 . ' ' . $request->body_line9 . ' ' . $request->body_line10;
                $image = '';
                $icon = $request->icon;
            }
            $browser_fields = array(
                'registration_ids' => $browser_token,
                'notification' => array(
                    "title" => $title,
                    "body" => $body,
                    "icon" => $icon,
                    "sound" => "notification",
                    "noti_id" => rand(3, 8) ,
                    "image" => $image,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );
            $headers = array(
                "Authorization: key=" . env('FCM_SERVER_KEY') ,
                'Content-Type: application/json'
            );

            $fields = json_encode($app_fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);
            $fields = json_encode($browser_fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);
        }
        elseif ($request->send_to == "Group")
        {
            $userss = student::where(['class' => $request->class, 'course' => $request->course, 'coursetype' => $request->coursetype, 'groupid' => $request->group, 'active' => '1'])
                ->select('id')
                ->get();
            foreach ($userss as $users)
            {
                $use = token::where(['user_id' => $users->id, 'user_type' => 'student', 'active' => '1'])
                    ->get();
                foreach ($use as $user)
                {
                    if ($user->token_type == "Application")
                    {
                        $app_token[$app_tk] = $user->token;
                        $app_tk++;
                    }
                    else
                    {
                        $browser_token[$br_tk] = $user->token;
                        $br_tk++;
                    }
                }
            }
            $app_fields = array(
                'registration_ids' => $app_token,
                'data' => array(
                    "title" => $request->title,
                    "body" => $request->body,
                    "title_long" => $request->title_long,
                    "body_long" => $request->body_long,
                    "title_line" => $request->title_line,
                    "body_line1" => $request->body_line1,
                    "body_line2" => $request->body_line2,
                    "body_line3" => $request->body_line3,
                    "body_line4" => $request->body_line4,
                    "body_line5" => $request->body_line5,
                    "body_line6" => $request->body_line6,
                    "body_line7" => $request->body_line7,
                    "body_line8" => $request->body_line8,
                    "body_line9" => $request->body_line9,
                    "body_line10" => $request->body_line10,
                    "summary" => $request->summary,
                    "icon" => $request->icon,
                    "sound" => "notification",
                    "noti_id" => rand(3, 8) ,
                    "channel_id" => "Notification",
                    "image" => $request->image,
                    "type" => $request->notification_type,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );

            if ($request->notification_type == 'no_icon')
            {
                $title = $request->title;
                $body = $request->body;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon' || $request->notification_type == 'left_icon')
            {
                $title = $request->title;
                $body = $request->body;
                $image = '';
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'right_icon_long')
            {
                $title = $request->title_long;
                $body = $request->body_long;
                $image = '';
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'no_icon_long')
            {
                $title = $request->title_long;
                $body = $request->body_long;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'no_icon_image')
            {
                $title = $request->title;
                $body = $request->body;
                $image = $request->image;
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon_image_hide' || $request->notification_type == 'right_icon_image_show')
            {
                $title = $request->title;
                $body = $request->body;
                $image = $request->image;
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'no_icon_lines')
            {
                $title = $request->title_line;
                $body = $request->body_line1 . ' ' . $request->body_line2 . ' ' . $request->body_line3 . ' ' . $request->body_line4 . ' ' . $request->body_line5 . ' ' . $request->body_line6 . ' ' . $request->body_line7 . ' ' . $request->body_line8 . ' ' . $request->body_line9 . ' ' . $request->body_line10;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon_lines')
            {
                $title = $request->title_line;
                $body = $request->body_line1 . ' ' . $request->body_line2 . ' ' . $request->body_line3 . ' ' . $request->body_line4 . ' ' . $request->body_line5 . ' ' . $request->body_line6 . ' ' . $request->body_line7 . ' ' . $request->body_line8 . ' ' . $request->body_line9 . ' ' . $request->body_line10;
                $image = '';
                $icon = $request->icon;
            }
            $browser_fields = array(
                'registration_ids' => $browser_token,
                'notification' => array(
                    "title" => $title,
                    "body" => $body,
                    "icon" => $icon,
                    "sound" => "notification",
                    "noti_id" => rand(3, 8) ,
                    "image" => $image,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );
            $headers = array(
                "Authorization: key=" . env('FCM_SERVER_KEY') ,
                'Content-Type: application/json'
            );

            $fields = json_encode($app_fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);
            $fields = json_encode($browser_fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);
        }
        elseif ($request->send_to == "Student")
        {
            $use = token::where(['user_id' => $request->user_id, 'user_type' => 'student', 'active' => '1'])
                ->get();
            foreach ($use as $user)
            {
                if ($user->token_type == "Application")
                {
                    $app_token[$app_tk] = $user->token;
                    $app_tk++;
                }
                else
                {
                    $browser_token[$br_tk] = $user->token;
                    $br_tk++;
                }
            }

            $app_fields = array(
                'registration_ids' => $app_token,
                'data' => array(
                    "title" => $request->title,
                    "body" => $request->body,
                    "title_long" => $request->title_long,
                    "body_long" => $request->body_long,
                    "title_line" => $request->title_line,
                    "body_line1" => $request->body_line1,
                    "body_line2" => $request->body_line2,
                    "body_line3" => $request->body_line3,
                    "body_line4" => $request->body_line4,
                    "body_line5" => $request->body_line5,
                    "body_line6" => $request->body_line6,
                    "body_line7" => $request->body_line7,
                    "body_line8" => $request->body_line8,
                    "body_line9" => $request->body_line9,
                    "body_line10" => $request->body_line10,
                    "summary" => $request->summary,
                    "icon" => $request->icon,
                    "sound" => "notification",
                    "noti_id" => rand(3, 8) ,
                    "channel_id" => "Notification",
                    "image" => $request->image,
                    "type" => $request->notification_type,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );

            if ($request->notification_type == 'no_icon')
            {
                $title = $request->title;
                $body = $request->body;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon' || $request->notification_type == 'left_icon')
            {
                $title = $request->title;
                $body = $request->body;
                $image = '';
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'right_icon_long')
            {
                $title = $request->title_long;
                $body = $request->body_long;
                $image = '';
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'no_icon_long')
            {
                $title = $request->title_long;
                $body = $request->body_long;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'no_icon_image')
            {
                $title = $request->title;
                $body = $request->body;
                $image = $request->image;
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon_image_hide' || $request->notification_type == 'right_icon_image_show')
            {
                $title = $request->title;
                $body = $request->body;
                $image = $request->image;
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'no_icon_lines')
            {
                $title = $request->title_line;
                $body = $request->body_line1 . ' ' . $request->body_line2 . ' ' . $request->body_line3 . ' ' . $request->body_line4 . ' ' . $request->body_line5 . ' ' . $request->body_line6 . ' ' . $request->body_line7 . ' ' . $request->body_line8 . ' ' . $request->body_line9 . ' ' . $request->body_line10;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon_lines')
            {
                $title = $request->title_line;
                $body = $request->body_line1 . ' ' . $request->body_line2 . ' ' . $request->body_line3 . ' ' . $request->body_line4 . ' ' . $request->body_line5 . ' ' . $request->body_line6 . ' ' . $request->body_line7 . ' ' . $request->body_line8 . ' ' . $request->body_line9 . ' ' . $request->body_line10;
                $image = '';
                $icon = $request->icon;
            }
            $browser_fields = array(
                'registration_ids' => $browser_token,
                'notification' => array(
                    "title" => $title,
                    "body" => $body,
                    "icon" => $icon,
                    "sound" => "notification",
                    "noti_id" => rand(3, 8) ,
                    "image" => $image,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );
            $headers = array(
                "Authorization: key=" . env('FCM_SERVER_KEY') ,
                'Content-Type: application/json'
            );

            $fields = json_encode($app_fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);
            $fields = json_encode($browser_fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);
        }
        elseif ($request->send_to == "Teacher")
        {
            $use = token::where(['user_id' => $request->user_id, 'user_type' => 'teacher', 'active' => '1'])
                ->get();
            foreach ($use as $user)
            {
                if ($user->token_type == "Application")
                {
                    $app_token[$app_tk] = $user->token;
                    $app_tk++;
                }
                else
                {
                    $browser_token[$br_tk] = $user->token;
                    $br_tk++;
                }
            }

            $app_fields = array(
                'registration_ids' => $app_token,
                'data' => array(
                    "title" => $request->title,
                    "body" => $request->body,
                    "title_long" => $request->title_long,
                    "body_long" => $request->body_long,
                    "title_line" => $request->title_line,
                    "body_line1" => $request->body_line1,
                    "body_line2" => $request->body_line2,
                    "body_line3" => $request->body_line3,
                    "body_line4" => $request->body_line4,
                    "body_line5" => $request->body_line5,
                    "body_line6" => $request->body_line6,
                    "body_line7" => $request->body_line7,
                    "body_line8" => $request->body_line8,
                    "body_line9" => $request->body_line9,
                    "body_line10" => $request->body_line10,
                    "summary" => $request->summary,
                    "icon" => $request->icon,
                    "sound" => "notification",
                    "noti_id" => rand(3, 8) ,
                    "channel_id" => "Notification",
                    "image" => $request->image,
                    "type" => $request->notification_type,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );

            if ($request->notification_type == 'no_icon')
            {
                $title = $request->title;
                $body = $request->body;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon' || $request->notification_type == 'left_icon')
            {
                $title = $request->title;
                $body = $request->body;
                $image = '';
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'right_icon_long')
            {
                $title = $request->title_long;
                $body = $request->body_long;
                $image = '';
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'no_icon_long')
            {
                $title = $request->title_long;
                $body = $request->body_long;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'no_icon_image')
            {
                $title = $request->title;
                $body = $request->body;
                $image = $request->image;
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon_image_hide' || $request->notification_type == 'right_icon_image_show')
            {
                $title = $request->title;
                $body = $request->body;
                $image = $request->image;
                $icon = $request->icon;
            }
            elseif ($request->notification_type == 'no_icon_lines')
            {
                $title = $request->title_line;
                $body = $request->body_line1 . ' ' . $request->body_line2 . ' ' . $request->body_line3 . ' ' . $request->body_line4 . ' ' . $request->body_line5 . ' ' . $request->body_line6 . ' ' . $request->body_line7 . ' ' . $request->body_line8 . ' ' . $request->body_line9 . ' ' . $request->body_line10;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($request->notification_type == 'right_icon_lines')
            {
                $title = $request->title_line;
                $body = $request->body_line1 . ' ' . $request->body_line2 . ' ' . $request->body_line3 . ' ' . $request->body_line4 . ' ' . $request->body_line5 . ' ' . $request->body_line6 . ' ' . $request->body_line7 . ' ' . $request->body_line8 . ' ' . $request->body_line9 . ' ' . $request->body_line10;
                $image = '';
                $icon = $request->icon;
            }
            $browser_fields = array(
                'registration_ids' => $browser_token,
                'notification' => array(
                    "title" => $title,
                    "body" => $body,
                    "icon" => $icon,
                    "sound" => "notification",
                    "noti_id" => rand(3, 8) ,
                    "image" => $image,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );
            $headers = array(
                "Authorization: key=" . env('FCM_SERVER_KEY') ,
                'Content-Type: application/json'
            );

            $fields = json_encode($app_fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);
            $fields = json_encode($browser_fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);
        }

        return Response::json($result);
    }

    public function notification_list(Request $request)
    {
        $data = notification::where(['notification_id' => $request->get('id') , 'active' => '1'])
            ->select('id', 'send_to', 'classid', 'courseid', 'coursetypeid', 'groupid', 'user_id', 'user_name', 'user_type', 'status', 'publishtime')
            ->orderBy('id', 'desc')
            ->get();
        return Response::json($data);
    }

    public function person_list(Request $request)
    {
        if ($request->type == 'student')
        {
            $data = student::where(['class' => $request->class, 'course' => $request->course, 'coursetype' => $request->coursetype, 'groupid' => $request->group, 'active' => '1'])
                ->select('id', 'name')
                ->orderBy('name', 'asc')
                ->get();
            return Response::json($data);
        }
        elseif ($request->type == 'teacher')
        {
            $data = teacher::where(['active' => '1'])->select('id', 'name')
                ->orderBy('name', 'asc')
                ->get();
            return Response::json($data);
        }

    }
    public function delete_notification(Request $request)
    {
        $filess = notification::find($request->id);
        $files = notification_template::find($filess->notification_id);
        $files->count = $files->count - 1;
        $files->save();
        $filess->active = 0;
        $filess->save();
        return Response::json($filess);
    }

}

