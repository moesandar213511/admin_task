@extends('admin.layouts.site_admin.site_admin_design')
@section('title','Admin | List Name')
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
    List Name
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            {{-- <button type="button" name="button" class="btn btn-success pull-right" data-target="#modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Add</button> --}}
                            <h3>List Name</h3>
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

        <!-- edit modal -->
        <div class="modal fade" id="edit_modalBox">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit List Name</h4>
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
                            </div>
                             
                            <button class=" btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary pull-right" id="update_btn">Update</button>
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
                    url: "{{url('admin/get_all_list')}}",

                    cache: false,
                    success: function(data){
                        var data_return=JSON.parse(data);
                        // console.log(data_return);
                        t.clear();
                        var no = 1;
                        for(var i = 0;i<data_return.length;i++){ 
                            t.row.add([
                                no++,
                                data_return[i]['name'],
                                '<button class="btn btn-info btn-sm" onclick="edit_data('+data_return[i]['id']+')" data-target="#edit_modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Edit</button>'+
                                '<button class="btn btn-danger btn-sm" onclick="delete_data('+data_return[i]['id']+')">Delete</button>'
                            ]).draw( false );
                        }

                        $('#insert_list')[0].reset();
                    }
                });
            }

            // $('#insert_main_category').on('submit',function (e)
            // {
            //     e.preventDefault();
            //     var alldata = new FormData(this);
            //     $.ajax
            //     ({
            //         type: "POST",
            //         url: "{{url('admin/insert_main_category')}}",
            //         data:alldata,
            //         cache:false,
            //         processData: false,
            //         contentType: false,
            //         success: function(data){
            //             // alert('itwork');
            //             //console.log(data);
            //             $('#modalBox').modal('hide');
            //             toastr.success('Create successful');
            //             load();
            //         }
            //     });
            //     return false;
            // });

            edit_data=function(id){

                $.ajax({
                    type: "POST",
                    url: "../edit/list/"+id,

                    cache: false,
                    success: function(data){
                        reset();
                        var list=JSON.parse(data);

                        console.log(list);
                        $('#id_edit').val(list['id']);
                        $('#update_name').val(list['name']);

                        $('#edit_modalBox').modal('show');
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
                    url: "{{url('update/listname')}}",
                    data:updateData,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        //console.log(data);
                        //alert(data);
                        $('#edit_modalBox').modal('hide');
                        toastr.success('Update successful');
                        load();
                    }
                });
                return false;
            });

             delete_data=function(id){
            var delete_url="{{url('/admin/delete_list')}}/"+id;
            var url="{{url('admin/delete/list_task')}}/"+id;
                $.ajax({
                    url : url,
                    type : "get",
                    dataType : "json"
                    }).done(function(response){
                        if(confirm(`This list has ${response} task. Are you sure you want to delete?`)){
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