@extends('admin.layouts.site_admin.site_admin_design')
@section('title','Admin | Member')
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
    Member Account
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
{{--                           <h5> Member List</h5>--}}
                            <button type="button" name="button" class="btn btn-success pull-right" data-target="#modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Add</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="datatable">
                                    <thead class="text-primary">
                                    <th width="8%">
                                        No
                                    </th>
                                    <th width="18%">
                                        Name
                                    </th>
                                    <th width="20%">
                                        Phone
                                    </th>
                                    <th width="30%">
                                        Address
                                    </th>
                                    <th width="30%">Action</th>
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
            <div class="modal-dialog modal-md" style="max-width:800px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Member</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="insert_member" enctype="multipart/form-data" class="md-form">
                            {{csrf_field()}}
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <img src="{{asset('images/default.jpg')}}" id="image" class="imagePreview img-thumbnail" style="width:200px!important">
                                        <label class="btn btn-primary upload_btn" style="width:200px;">
                                        Upload<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('upload_photo','image')" id="upload_photo" name="photo" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" required>
                                    </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                         <input type="phone" name="phone" class="form-control" id="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position">Position</label>
                                         <input type="text" name="position" class="form-control" id="position" required>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="education"><b>Education</b></label>
                                        <input type="text" name="education" id="education" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="c_password">Confirm Password</label>
                                        <input type="password" name="confirm_password" id="c_password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address
                                            "><b>Address</b></label><br>
                                        <textarea name="address" rows="1" class="form-control" id="address" required></textarea>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="detail
                                            "><b>Detail</b></label><br>
                                        <textarea name="detail" id="detail" rows="2" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Create</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit modal -->
        <div class="modal fade" id="edit_modalBox">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Member Data</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">

                         <form id="update_data">
                            {{csrf_field()}}
                            <input type="hidden" name="id" id="id_edit">
                              <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <img src="{{asset('images/default.jpg')}}" id="imgs" class="imagePreview img-thumbnail">
                                        <label class="btn btn-primary upload_btn">
                                        Upload<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('upload_img','imgs')" id="upload_img" name="image" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_name">Name</label>
                                        <input type="text" name="name" class="form-control" id="update_name" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_phone">Phone</label>
                                         <input type="phone" name="phone" class="form-control" id="update_phone" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_position">Position</label>
                                         <input type="text" name="position" class="form-control" id="update_position" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_address
                                            "><b>Address</b></label><br>
                                        <textarea name="address" rows="2" class="form-control" id="update_address" required></textarea>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_education"><b>Education</b></label><br>
                                        <input type="text" name="education" id="update_education" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_detail"><b>Detail</b></label><br>
                                        <textarea name="detail" id="update_detail" rows="2" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
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

            load();

            function load(){
                $.ajax({
                    type: "get",
                    url: "{{url('admin/get_all_member')}}",

                    cache: false,
                    success: function(data){
                        var data_return=JSON.parse(data);
                        // console.log(data);
                        t.clear();
                        var no = 1;
                        for(var i = 0;i<data_return.length;i++){
                            var link="{{url('/admin/member_detail/')}}/"+data_return[i]['id'];
                            t.row.add([
                                no++,
                                data_return[i]['name'],
                                data_return[i]['phone'],
                                data_return[i]['address'],
                                '<a href="'+link+'" class="btn btn-primary rounded-0 btn-sm" target="_blank">Detail</a>'+
                                '<button class="btn btn-info btn-sm" onclick="edit_data('+data_return[i]['id']+')" data-target="#edit_modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Edit</button>'+
                                '<button class="btn btn-danger btn-sm" onclick="delete_data('+data_return[i]['id']+')">Delete</button>'
                            ]).draw( false );
                        }

                        $('#insert_member')[0].reset();
                    }
                });
            }

            $('#insert_member').on('submit',function (e)
            {
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax
                ({
                    type: "POST",
                    url: "{{url('admin/insert_member')}}",
                    data:alldata,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        // alert('itwork');
                        console.log(data);
                        $('#modalBox').modal('hide');
                        toastr.success('Create member account successful');
                        load();
                    }
                });
                return false;
            });

            edit_data=function(id){
                // alert(id);
                $.ajax({
                    type: "get",
                    url: "././edit/member/"+id,

                    cache: false,
                    success: function(data){
                    //    reset();
                        // console.log(data);
                        var member=JSON.parse(data);
                        console.log(member);
                        $('#edit_modalBox').modal('show');
                        $("#imgs").attr("src", member['photo_url']);
                        $('#id_edit').val(member['id']);
                        $('#update_name').val(member['name']);
                        $('#update_type').val(member['type']);
                        $('#update_phone').val(member['phone']);
                        $('#update_position').val(member['position']);
                        $('#update_address').val(member['address']);
                        $('#update_education').val(member['education']);
                        $('#update_detail').val(member['detail']);
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
                    url: "{{url('/update_member')}}",
                    data:updateData,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        console.log(data);
                        // alert('it work');
                        $('#edit_modalBox').modal('hide');
                        toastr.success('Update Member data successful');
                        load();
                    }
                });
                return false;
            });

            // delete_data=function(id){
            //     if(confirm('Are you sure You want to delete!')==true){
            //         $.ajax({
            //             type: "get",
            //             url: "../delete_member/"+id,

            //             cache: false,
            //             success: function(data){
            //                 toastr.success('Delete Account Data successful');
            //                 load();
            //             }
            //         });
            //     }else{
            //         return false;
            //     }
            // }

            delete_data=function(id){
            var delete_url="{{url('admin/delete_member')}}/"+id;
            var url="{{url('admin/delete/mem_task')}}/"+id;
                $.ajax({
                    url : url,
                    type : "get",
                    dataType : "json"
                    }).done(function(response){
                        if(confirm(`This member has ${response} task. Are you sure you want to delete?`)){
                            $.ajax({
                            url : delete_url,
                            type : "post",
                            data : {'_method' : 'delete'},
                            dataType : "json"
                            }).done(function(response){
                            toastr.success("Delete Data Successful!");
                            load();
                            
                            }).fail(function(error){
                            console.log(error);
                            });
                        }

                    }).fail(function(error){
                    console.log(error);
                    });
                 }
        });
    </script>
@endsection

 {{-- id="btn_submit" --}}
