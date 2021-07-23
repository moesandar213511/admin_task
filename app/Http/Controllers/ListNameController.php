<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListName;
use App\Task;


class ListNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.site_admin.admin.list')->with([
            'url' => 'list'
            // 'lists' => $lists
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
        ListName::create([
           'name' => $request->get('name')
        ]);
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
         $delete_list = ListName::findOrFail($id);
         return json_encode($delete_list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function gell_all_list(){
        $lists = ListName::all();
        return json_encode($lists);
    }
    public function update_list(Request $request){
        $id = $request->get('id');
        ListName::findOrFail($id)->update([
            'name'=>$request->get('name')
        ]);
    }
    public function destroy_list($id){
        $delete_list = ListName::findOrFail($id);
        $delete_list->delete();

        $tasks = Task::where('list_id',$id)->get();
        foreach ($tasks as $data) {
            $data->delete();
        }
        return response()->json(true);

    }
    public function destroy_listtask($id){
        $count_tasks = Task::where('list_id',$id)->get();
        return response()->json(count($count_tasks));
    }
    

}
