@extends('admin.layouts.site_admin.site_admin_design')
@section('title','Admin | Company')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .imagePreview {
            width: 100%;
            height: 150px;
            background-position: center center;
            background:url('http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg');
            background-color:#fff;
            background-size: cover;
            background-repeat:no-repeat;
            display: inline-block;
            /* box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2); */
        }
        .upload_btn
        {
            display:block;
            border-radius:10px;
            /* box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2); */
            margin-bottom: 15px;
        }
        .imgUp
        {
            margin-bottom:15px;
        }
    </style>
@endsection

@section('nav_bar_text')
    Task List
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <form id="search_task">
                        {{csrf_field()}}
                        <div class="col-md-2">
                            <div class="form-group">
                            <select name="list_id" id="list" class="form-control">
                                <option value="">-- Select List Name --</option>
                                @foreach ($lists as $list_data)
                                    <option value="{{$list_data->id}}">{{$list_data->name}}</option>
                                @endforeach
                                {{-- <option>Daily Task
                                </option> --}}
                            </select>
                            </div> 
                             <button type="submit" class="btn btn-primary" id="btn_submit">Search</button>
                        </div>
                    </form>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            {{-- <h3>Company List</h3> --}}
                            
                            <button type="button" name="button" class="btn btn-success pull-right" data-target="#modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Add</button>
                            {{-- @elseif(\Illuminate\Support\Facades\Auth::user()->type=="member") --}}
                                <h4>Task List</h4>                            
                            {{-- @endif --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="datatable">
                                    <thead class=" text-primary">
                                    <th width="10%">
                                        No
                                    </th>
                                    <th width="15%">
                                        Name
                                    </th>
                                    <th width="15%">
                                        List
                                    </th>
                                    <th width="10%">
                                        Member
                                    </th>
                                    <th width="10%">
                                        Status
                                    </th>
                                    <th width="100%">Action</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- insert_model --}}
         <div class="modal fade" id="modalBox">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Task</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="insert_task" enctype="multipart/form-data" class="md-form">
                            {{csrf_field()}}
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="list">List</label>
                                                <select name="list_id" id="list" class="form-control">
                                                    <option value="">-- Select List Name --</option>
                                                    @foreach ($lists as $list_data)
                                                        <option value="{{$list_data->id}}">{{$list_data->name}}</option>
                                                    @endforeach
                                                    {{-- <option>Daily Task
                                                    </option> --}}
                                                </select>
                                            </div>
                                        </div><br>
                                        <div class="col-md-12">
                                            <a href="#" data-target="#modalBox2" data-toggle="modal" class="btn btn-info text-white">Create List</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="detail
                                            "><b>Detail</b></label><br>
                                        <textarea name="detail" id="detail" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                                @if(\Illuminate\Support\Facades\Auth::user()->type=="admin")
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type"><b>Type</b></label><br>
                                       <select name="member_id" id="type" class="form-control">
                                            <option value="">-- Select Member--</option>\
                                            @foreach($members as $member_data)
                                            <option value="{{$member_data->id}}">{{$member_data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="deadline">Deadline</label>
                                        <input type="date" name="deadline" id="deadline" class="form-control" required>
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="text" name="logo" id="logo" class="form-control" required>
                                    </div>
                                </div> \--}}
                            </div>
                            <button type="submit" class="btn btn-primary pull-right" id="btn_submit">Create</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- insert_list model --}}
        <div class="modal fade" id="modalBox2">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New List Name</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="insert_listname" enctype="multipart/form-data" class="md-form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            
                        <a href="{{url('admin/list')}}" class="btn btn-dark pull-right" id="btn_submit">All Task Name List</a>
                            <button type="submit" class="btn btn-primary pull-right" id="btn_submit">Create</button>
                            <div class="clearfix"></div>
                        </form>

                        {{-- <form id="insert_main_category" enctype="multipart/form-data" class="md-form">
                            {{csrf_field()}}
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right" id="btn_submit">Create</button>
                            <div class="clearfix"></div>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>


        <!-- edit modal -->
         <div class="modal fade" id="edit_modalBox">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Task</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="update_data">
                            {{csrf_field()}}
                              <div class="row">
                                <input type="hidden" name="id" class="form-control" id="id_edit" value="">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_name">Name</label>
                                        <input type="text" name="name" id="update_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_list">List</label>
                                                <select name="list_id" id="update_list" class="form-control">
                                                    <option value="">-- Select List Name --</option>
                                                    @foreach ($lists as $list_data)
                                                        <option value="{{$list_data->id}}">{{$list_data->name}}</option>
                                                    @endforeach
                                                    {{-- <option>Daily Task
                                                    </option> --}}
                                                </select>
                                            </div>
                                        </div><br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_detail
                                            "><b>Detail</b></label><br>
                                        <textarea name="detail" id="update_detail" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_member"><b>Type</b></label><br>
                                       <select name="member_id" id="update_member" class="form-control" required>
                                            <option value="">-- Select Member Type--</option>\
                                            @foreach($members as $member_data)
                                            <option value="{{$member_data->id}}">{{$member_data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_deadline">Deadline</label>
                                        <input type="date" name="deadline" id="update_deadline" class="form-control" required>
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="text" name="logo" id="logo" class="form-control" required>
                                    </div>
                                </div> --}}
                            </div>
                            <button type="submit" class="btn btn-primary pull-right" id="btn_submit">Update</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    

    </div>

@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {

            var t=$("#datatable").DataTable({
                "ordering": false,
                // "paging": false,
                "bInfo" : false,
                // "bPaginate": false,
                "bLengthChange": false
                // "bFilter": true,
                // "bAutoWidth": false
            });
            function reset(){
                $('#update_data')[0].reset();
            }

            $('#insert_listname').on('submit',function (e)
            {
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax
                ({
                    type: "POST",
                    url: "{{url('admin/insert_listname')}}",
                    data:alldata,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        // alert('itwork');
                        //console.log(data);
                        $('#modalBox2').modal('hide');
                        toastr.success('Create successful');
                        window.location.reload();
                    }
                });
                return false;
            });

            load();

            function load(){
                $.ajax({
                    type: "get",
                    url: "{{url('member/get_all_task')}}",

                    cache: false,
                    success: function(data){
                        var data_return=JSON.parse(data);
                        //console.log(data);
                        t.clear();
                        var no = 1;
                        for(var i = 0;i<data_return.length;i++){
                            var link="{{url('member/task_detail')}}/"+data_return[i]['id'];
                            // var gallery_link="{{url('/member/company_photodetail/')}}/"+data_return[i]['id'];
                            t.row.add([
                                no++,
                                data_return[i]['name'],
                                data_return[i]['list_id'],
                                data_return[i]['user_id'],
                                data_return[i]['status'],
                                '<a target="_blank" href="'+link+'" class="btn btn-primary rounded-0 btn-sm">Detail</a>'+
                               
                                @if(\Illuminate\Support\Facades\Auth::user()->type=="member")
                                    '<button class="btn btn-info btn-sm" onclick="change_done('+data_return[i]['id']+')">Done</button>'+
                                    '<button class="btn btn-warning btn-sm" onclick="change_active('+data_return[i]['id']+')">Active</button>'+
                                @endif
                                     '<button class="btn btn-success btn-sm" onclick="edit_data('+data_return[i]['id']+')" data-target="#edit_modalBox" data-toggle="modal">Edit</button>'+
                                    '<button class="btn btn-danger btn-sm" onclick="delete_data('+data_return[i]['id']+')">Delete</button>'

                                // '<a href="'+gallery_link+'" class="btn btn-info rounded-0 btn-sm">Edit Photos</a>'
                            ]).draw( false );
                        }

                        $('#insert_task')[0].reset();
                    }
                });
            }

            $('#search_task').on('submit',function(e){
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax
                ({
                    type: "POST",
                    url: "{{url('admin/search_task')}}",
                    data: alldata,
                    cache:false,
                    processData:false,
                    contentType:false,
                    success:function(data){
                        var data_return=JSON.parse(data);
                        console.log(data);
                     var no = 1;
                    t.clear();
                    for(var i = 0;i<data_return.length;i++){
                      // var link=window.location.href+"/detail/"+data_return[i]['id'];
                      var link="{{url('member/task_detail')}}/"+data_return[i]['id'];
                    t.row.add([
                        no++,
                        data_return[i]['name'],
                        data_return[i]['list_id'],
                        data_return[i]['user_id'],
                        data_return[i]['status'],
                        '<a target="_blank" href="'+link+'" class="btn btn-primary rounded-0 btn-sm">Detail</a>'+
                        
                            @if(\Illuminate\Support\Facades\Auth::user()->type=="member")
                        '<button class="btn btn-info btn-sm" onclick="change_done('+data_return[i]['id']+')">Done</button>'+
                        '<button class="btn btn-warning btn-sm" onclick="change_active('+data_return[i]['id']+')">Active</button>'+
                        @endif

                        '<button class="btn btn-success btn-sm" onclick="edit_data('+data_return[i]['id']+')" data-target="#edit_modalBox" data-toggle="modal">Edit</button>'+
                        '<button class="btn btn-danger btn-sm" onclick="delete_data('+data_return[i]['id']+')">Delete</button>'


                        // '<a href="'+gallery_link+'" class="btn btn-info rounded-0 btn-sm">Edit Photos</a>'
                    ]).draw( false );
                    }
                    }
                }).fail(function(error){
                    console.log(error);
                });
                    return false;
            });

            $('#insert_task').on('submit',function (e)
            {
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax
                ({
                    type: "POST",
                    url: "{{url('member/insert_task')}}",
                    data:alldata,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        // alert('itwork');
//                        console.log(data);
                        $('#modalBox').modal('hide');
                        toastr.success('Create member account successful');
                        load();
                    }
                });
                return false;
            });

            edit_data=function(id){
                $.ajax({
                    type: "POST",
                    url: "../member/edit_task/"+id,

                    cache: false,
                    success: function(data){
                       // reset();
                        var tasks=JSON.parse(data);
                        $('#edit_modalBox').modal('show');
                        //console.log(company);
                        $('#id_edit').val(tasks['id']);
                        $('#update_name').val(tasks['name']);
                        $('#update_list').val(tasks['list_id']);
                        $('#update_detail').val(tasks['detail']);
                        $('#update_member').val(tasks['user_id']);
                        $('#update_deadline').val(tasks['deadline']);
                    }
                });
            }

            $('#update_data').on('submit',function (e)
            {
                e.preventDefault();
                var updateData = new FormData(this);
                $.ajax
                ({
                    type: 'POST',
                    url: "{{url('member/update_task')}}",
                    data:updateData,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        console.log(data);
                        //alert(data);
                        //$("#text").summernote('reset');
                        $('#edit_modalBox').modal('hide');
                        toastr.success('Update task data successful');
                        load();
                    }
                });
                return false;
            });

            delete_data=function(id){
                if(confirm('Are you sure You want to delete!')==true){
                    $.ajax({
                        type: "get",
                        url: "../member/delete_task/"+id,

                        cache: false,
                        success: function(data){
                            console.log(data);
                            toastr.success('Delete Task Data successful');
                            load();
                        }
                    });
                }else{
                    return false;
                }
            }

             change_done=function(id){
                if(confirm('Are you sure You want to change!')==true){
                    $.ajax({
                        type: "POST",
                        url: "../change_done/task/"+id,

                        cache: false,
                        success: function(data){
                            //console.log(data);
                            toastr.success('Successful');
                            load();
                        }
                    });
                }else{
                    return false;
                }
            }

            change_active=function(id){
                if(confirm('Are you sure You want to change!')==true){
                    $.ajax({
                        type: "POST",
                        url: "../change_active/task/"+id,

                        cache: false,
                        success: function(data){
                            //console.log(data);
                            toastr.success('Successful');
                            load();
                        }
                    });
                }else{
                    return false;
                }
            }

        });
    </script>
@endsection
