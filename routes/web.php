<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// route to login and logout



  Route::prefix('/admin')->group(function() {

     //------------------------------------------------------Notifications-------------------------------------------------
     Route::get('/add_notification', 'AdminNotificationController@add_notification')->name('admin-add_notification');
     Route::POST('/add_notification_submit', 'AdminNotificationController@add_notification_submit')->name('admin-add_notification_submit');
     Route::get('/upload_image_list', 'AdminNotificationController@upload_image_list')->name('admin-upload_image_list');
     Route::POST('/upload_image_submit', 'AdminNotificationController@upload_image_submit')->name('admin-upload_image_submit');
     Route::get('/edit_notification', 'AdminNotificationController@edit_notification')->name('admin-edit_notification');
     Route::POST('/edit_notification_submit', 'AdminNotificationController@edit_notification_submit')->name('admin-edit_notification_submit');
     /*Route::get('/result_img', 'AdminNotificationController@result_img')->name('admin-result_img');
     Route::get('/upload_image', 'AdminNotificationController@upload_image')->name('admin-upload_image');
     Route::get('/result_img_done', 'AdminNotificationController@result_img_done')->name('admin-result_img_done');*/
     Route::get('/notifications', 'AdminNotificationController@notification_templates')->name('admin-notification_templates');
     Route::POST('/delete_notifications', 'AdminNotificationController@delete_notification_templates')->name('admin-delete_notification_templates');
     Route::POST('/person_list', 'AdminNotificationController@person_list')->name('admin-person_list');
     Route::get('/publish_notification', 'AdminNotificationController@publish_notification')->name('admin-publish_notification');
     Route::POST('/publish_notification', 'AdminNotificationController@publish_notification_submit')->name('admin-publish_notification_submit');
     Route::get('/publish_auto_notification', 'AdminNotificationController@publish_auto_notification_submit')->name('admin-publish_auto_notification_submit');
     Route::get('/notification_list', 'AdminNotificationController@notification_list')->name('admin-notification_list');
     Route::POST('/delete_notification', 'AdminNotificationController@delete_notification')->name('admin-delete_notification');
  });
