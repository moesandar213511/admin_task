<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Member;
use App\CustomClass\MemberData;
use App\User;
use Auth;
use App\Company;
use App\Task;
use App\CustomClass\TaskData;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site_admin.admin.member')->with([
            'url' => 'member'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('photo');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path() . '/upload/member/', $fileName);

        $password = $request->get('password');
        $confirm_password = $request->get('confirm_password');
        // return "ok";
        if($password == $confirm_password){
            $member_id = Member::create([
                'photo' => $fileName,
                'name' => $request->get('name'),
                'phone' => $request->get('phone'),
                'position' => $request->get('position'),
                'address' => $request->get('address'),
                'education' => $request->get('education'),
                'detail' => $request->get('detail')
            ])->id;
             
            User::create([
                'email' => $request->get('email'),
                'password' => Hash::make($password),
                'type' => 'member',
                'member_id' => $member_id
            ]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member_data_obj = new MemberData($id);
        $member_detail = $member_data_obj->getMemberData();
        return json_encode($member_detail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_member(Request $request){
        $id = $request->get('id');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload/member/'), $image_name);
            $member = Member::find($id);
            $image_path = public_path() . '/upload/member/' . $member->photo;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            Member::findOrFail($id)->update([
                'photo' => $image_name,
                'name' => $request->get('name'),
                'phone' => $request->get('phone'),
                'position' => $request->get('position'),
                'address' => $request->get('address'),
                'education' => $request->get('education'),
                'detail' => $request->get('detail')
            ]);
        } else {
            Member::findOrFail($id)->update([
                'name' => $request->get('name'),
                'phone' => $request->get('phone'),
                'position' => $request->get('position'),
                'address' => $request->get('address'),
                'education' => $request->get('education'),
                'detail' => $request->get('detail')
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_member($id)
    {
        $member_id = Member::findOrFail($id);
        $image_path = public_path() . '/upload/member/' . $member_id->photo;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $member_id->delete();

        $user_id = User::where('member_id', $id)->first();
        $user_id->delete();

        $member_task = Task::where('user_id',$id)->get();
        foreach ($member_task as $data) {
            $data->delete();
        }
        return response()->json(true);
    }

    public function destroy_membertask($id){
        $mem_task = Task::where('user_id',$id)->get();
        return response()->json(count($mem_task));
    }

    public function get_all_member(){
        $members = Member::all();
        $arr = [];
        foreach ($members as $data) {
            $member_data = new MemberData($data->id);
            array_push($arr, $member_data->getMemberData());
        }
        return json_encode($arr);
    }
    public function member_detail($id){
        $member_detail = Member::find($id);
        return view('admin.site_admin.admin.member_detail')->with([
            'url' => 'member',
            'member_detail' => $member_detail
        ]);
    }
    public function member_profile()
    {
        $member_id = Auth::user()->member_id;
        $member_data = Member::where('id', $member_id)->first();
        // Member::where('member_id')
        // $user_data = Auth::user();
        // return $user_data;
        return view('admin.site_admin.member.member_profile')->with([
            'url' => 'member_profile',
            'member_data' => $member_data
        ]);
    }
    public function update_profile(Request $request)
    {
        $id = $request->get('id');
        $password = $request->get('new_password');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload/member/'), $image_name);
            $member = Member::find($id);
            $image_path = public_path() . '/upload/member/' . $member->photo;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            if($password){
                Member::findOrFail($id)->update([
                    'photo' => $image_name,
                    'name' => $request->get('name'),
                    'phone' => $request->get('phone'),
                    'position' => $request->get('position'),
                    'address' => $request->get('address'),
                    'education' => $request->get('education'),
                    'detail' => $request->get('detail')
                ]);
                User::findOrFail(Auth::user()->id)->update([
                    'password' => Hash::make($password)
                ]);
            }else{
                Member::findOrFail($id)->update([
                    'photo' => $image_name,
                    'name' => $request->get('name'),
                    'phone' => $request->get('phone'),
                    'position' => $request->get('position'),
                    'address' => $request->get('address'),
                    'education' => $request->get('education'),
                    'detail' => $request->get('detail')
                ]);
            }
           
        } else {
            if ($password) {
                Member::findOrFail($id)->update([
                    'name' => $request->get('name'),
                    'phone' => $request->get('phone'),
                    'position' => $request->get('position'),
                    'address' => $request->get('address'),
                    'education' => $request->get('education'),
                    'detail' => $request->get('detail')
                ]);
                User::findOrFail(Auth::user()->id)->update([
                    'password' => Hash::make($password)
                ]);
            } else {
                Member::findOrFail($id)->update([
                    'name' => $request->get('name'),
                    'phone' => $request->get('phone'),
                    'position' => $request->get('position'),
                    'address' => $request->get('address'),
                    'education' => $request->get('education'),
                    'detail' => $request->get('detail')
                ]);
            }
            // User::findOrFail(Auth::user()->id)->update([
            //     'password' => Hash::make($password)
            // ]);
        }
        // return redirect('member/profile');
    }
}

