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


Route::get('test','Controller@test');

// For admin
Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('logout', 'Auth\LoginController@logout')->middleware('auth');


Route::group(['middleware' => ['auth','admin']], function () {

    Route::get('/admin/blog','AdminController@blog');

    // member
    Route::get('admin/member','MemberController@index');
    Route::post('admin/insert_member', 'MemberController@store');
    Route::get('admin/get_all_member', 'MemberController@get_all_member');
    Route::get('admin/member_detail/{id}', 'MemberController@member_detail');
    Route::get('/edit/member/{id}', 'MemberController@edit');
    Route::post('/update_member', 'MemberController@update_member');
    Route::delete('admin/delete_member/{id}', 'MemberController@destroy_member');
    Route::get('admin/delete/mem_task/{id}', 'MemberController@destroy_membertask');

    
    Route::get('admin/company', 'CompanyController@index');
    Route::get('admin/task', 'TaskController@index');


    // LIst
    Route::get('admin/list', 'ListNameController@index');
    Route::post('admin/insert_listname','ListNameController@store');
    Route::get('admin/get_all_list', 'ListNameController@gell_all_list');
    Route::post('/edit/list/{id}','ListNameController@edit');
    Route::post('/update/listname','ListNameController@update_list');
    Route::delete('/admin/delete_list/{id}', 'ListNameController@destroy_list');
    Route::get('admin/delete/list_task/{id}', 'ListNameController@destroy_listtask');
});


//for member dashboard
Route::group(['middleware' => ['auth', 'member']], function () {

    Route::get('member/event', function(){
        return view('admin.site_admin.member.event')->with(['url' => 'event']);
    });
    
     // LIst
    Route::get('admin/list', 'ListNameController@index');
    Route::post('admin/insert_listname', 'ListNameController@store');
    Route::get('admin/get_all_list', 'ListNameController@gell_all_list');
    Route::post('/edit/list/{id}', 'ListNameController@edit');
    Route::post('/update/listname', 'ListNameController@update_list');
    Route::delete('/admin/delete_list/{id}', 'ListNameController@destroy_list');
    Route::get('admin/delete/list_task/{id}', 'ListNameController@destroy_listtask');

    Route::get('member/task', 'TaskController@index');
    Route::post('member/insert_task', 'TaskController@insert_task');
    Route::get('member/get_all_task', 'TaskController@get_all_task');
    // Route::get('member/company_detail/{id}', 'CompanyController@company_detail');
    Route::get('member/delete_task/{id}', 'TaskController@destroy');
    // Route::get('member/company_photos/{id}', 'CompanyController@destroy');
    Route::post('member/edit_task/{id}', 'TaskController@edit_task');
    Route::post('member/update_task', 'TaskController@update_task');
    Route::get('member/task_detail/{id}', 'TaskController@task_detail');
    Route::post('/change_done/task/{id}', 'TaskController@change_done');
    Route::post('/change_active/task/{id}', 'TaskController@change_active');
    Route::post('admin/search_task', 'TaskController@search_task');
    // Route::post('member/update_photos', 'CompanyController@update_photos');
    
// Member Profile
    Route::get('member/profile', 'MemberController@member_profile');
    Route::post('member/update_profile', 'MemberController@update_profile');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// in registerController
use Illuminate\Support\Facades\Hash;
Route::get('test',function(){
    echo Hash::make("admin1001");
});
