<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\User;
use Auth;
use App\Task;
use App\CustomClass\Path;
use App\ListName;
use App\CustomClass\TaskData;


class TaskController extends Controller
{
    public function index(){
        $lists = ListName::all();
        $members = Member::all();
        return view('admin.site_admin.member.task')->with([
            'url' => 'task',
            'lists' => $lists,
            'members' => $members
        ]);
    }
    public function insert_task(Request $request){
        if(Auth::user()->type == 'admin'){
            $member_id = $request->get('member_id');
            if($member_id){
                Task::create([
                'name' => $request->get('name'),
                'list_id' => $request->get('list_id'),
                'detail' => $request->get('detail'),
                'user_id' => $member_id,
                'deadline' => $request->get('deadline'),
                'status' => 'active'
                ]);
            }else{
                 Task::create([
                'name' => $request->get('name'),
                'list_id' => $request->get('list_id'),
                'detail' => $request->get('detail'),
                'user_id' => 0,
                'deadline' => $request->get('deadline'),
                'status' => 'active'
                ]);
            }
            
        }elseif(Auth::user()->type == 'member'){
            $member_id = Auth::user()->member_id;
            Task::create([
            'name' => $request->get('name'),
            'list_id' => $request->get('list_id'),
            'detail' => $request->get('detail'),
            'user_id' => $member_id,
            'deadline' => $request->get('deadline'),
            'status' => 'active'
            ]);
        }
        

    }
    public function get_all_task(){
        if (Auth::user()->type=='admin'){
            $tasks = Task::orderBy('id', 'desc')->get();
        }else{
            $member_id = Auth::user()->member_id;
            $tasks = Task::where('user_id',$member_id)->orderBy('id', 'desc')->get();
        }    
        $arr = [];
        foreach ($tasks as $data) {
            $obj = new TaskData($data->id);
            array_push($arr, $obj->getTaskData());
        }
        // return $arr;
        return json_encode($arr);
    }
    public function destroy($id){
        $delete_task = Task::findOrFail($id);
        $delete_task -> delete();
    }
    public function edit_task($id){
        $edit_task = Task::findOrFail($id);
        return json_encode($edit_task);
    }
    public function update_task(Request $request){
        $id = $request->get('id');
        Task::findOrFail($id)->update([
            'name'=>$request->get('name'),
            'list_id'=>$request->get('list_id'),
            'detail'=>$request->get('detail'),
            'user_id'=>$request->get('member_id'),
            'deadline'=>$request->get('deadline')
        ]);
    }
    public function task_detail($id){
        $tasks = Task::where('id', $id)->get();
        $arr = [];
        foreach ($tasks as $data) {
            $obj = new TaskData($data->id);
            array_push($arr, $obj->getTaskData());
        }
        // return $arr;
        return view('admin.site_admin.member.task_detail')->with([
            'url' => 'task',
            'task_arr' => $arr
        ]);
    }
    public function change_done($id){
        Task::findOrFail($id)->update([
            'status'=>'done'
        ]);
    }
    public function change_active($id){
        Task::findOrFail($id)->update([
            'status'=>'active'
        ]);
    }
    public function search_task(Request $request){
        // $type=Auth::user()->type
        $user_id = Auth::user()->member_id;
        if($user_id == 0){
            $list_id = $request->get('list_id');
            $search_task = Task::where('list_id', 'LIKE', "%$list_id%")->get();
            $arr = [];
            foreach ($search_task as $data) {
                $search_task_data = new TaskData($data->id);
                array_push($arr, $search_task_data->getTaskData());
            }
       }else{
            $list_id = $request->get('list_id');
            $search_task = Task::where('user_id',$user_id)->where('list_id', 'LIKE', "%$list_id%")->get();
            $arr = [];
            foreach ($search_task as $data) {
                $search_task_data = new TaskData($data->id);
                array_push($arr, $search_task_data->getTaskData());
            }
        }
        // return $arr;
        return json_encode($arr);
    }
}
