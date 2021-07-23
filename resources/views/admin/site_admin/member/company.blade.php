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
    Company List
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            {{-- <h3>Company List</h3> --}}
                            @if(\Illuminate\Support\Facades\Auth::user()->type=="admin")
                            <button type="button" name="button" class="btn btn-success pull-right" data-target="#modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Add</button>
                                @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="datatable">
                                    <thead class=" text-primary">
                                    <th width="10%">
                                        No
                                    </th>
                                    <th width="20%">
                                        Photo
                                    </th>
                                    <th width="15%">
                                        Name
                                    </th>
                                    <th width="10%">
                                        Email
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
                        <h4 class="modal-title">Create New Company</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="insert_company" enctype="multipart/form-data" class="md-form">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-sm-4 imgUp">
                                    <img src="{{asset('images/default.jpg')}}" id="image" class="imagePreview img-thumbnail">
                                    <label class="btn btn-primary upload_btn">
                                        Upload Logo<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('upload_logo','image')" id="upload_logo" name="logo" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" required>
                                    </label>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name"><b>Company Name</b></label>
                                                <input type="text" name="name" class="form-control" id="name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name"><b>Select Member</b></label>
                                                <select name="member_id" class="form-control">
                                                    @foreach ($member as $data)
                                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name"><b>Company Type(Ads or Normal)</b></label>
                                                <select name="type" class="form-control">
                                                   <option value="ads">Ads Company</option>
                                                   <option value="normal">Normal Company</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name"><b>Ads Date</b></label>
                                                <input type="date" class="form-control" name="ads_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for=""><b>Sub Category</b></label>
                                                <select name="sub_category" class="form-control">
                                                    @foreach ($subcategories as $subcategory)
                                                        <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email"><b>Email</b></label>
                                                <input type="email" name="email" class="form-control" id="email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="btn btn-primary upload_btn">
                                                    Upload Photos<input type="file" accept="image/png,image/jpeg,image/jpg" id="upload_photo" name="photos[]" class="uploadFile img" value="Upload Photos" style="width: 0px;height: 0px;overflow: hidden;" required multiple="multiple">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone"><b>Phone</b></label>
                                        <input type="phone" name="phone" class="form-control" id="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address
                                            "><b>Address</b></label>
                                        <textarea name="address" rows="3" class="form-control" id="address" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="web_url
                                            "><b>web-url</b></label>
                                        <input type="text" name="web_url" class="form-control" id="web_url" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="facebook_url
                                            "><b>facebook-url</b></label>
                                        <input type="text" name="facebook_url" class="form-control" id="facebook_url" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="what_we_do"
                                            "><b>what-we-do</b></label>
                                        <textarea name="what-we-do" rows="3" class="form-control" id="what_we_do" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="why_join_us
                                            "><b>why-join-us</b></label>
                                        <textarea name="why-join-us" rows="3" class="form-control" id="why_join_us" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="vision
                                            "><b>vision</b></label>
                                        <textarea name="vision" rows="3" class="form-control" id="vision" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mission
                                            "><b>mission</b></label>
                                        <textarea name="mission" rows="3" class="form-control" id="mission" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="about_us
                                            "><b>about us</b></label>
                                        <textarea name="about-us" rows="3" class="form-control" id="about_us" required></textarea>
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Company Data</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="update_data" class="md-form">
                            {{csrf_field()}}
                            <input type="hidden" name="id" id="id_edit">
                            <div class="row">
                                <div class="col-sm-4 imgUp">
                                    <img src="{{asset('images/default.jpg')}}" id="imgs" class="imagePreview img-thumbnail">
                                    <label class="btn btn-primary upload_btn">
                                        Upload Logo<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('update_logo','imgs')" id="update_logo" name="logo" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_name">CompanyName</label>
                                                <input type="text" name="name" class="form-control" id="update_name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for=""><b>Company Type (Ads or Normal)</b></label>
                                                <select name="type" class="form-control">
                                                    <option value="normal" id="normal">Normal Company</option>
                                                    <option value="ads" id="ads">Ads Company</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for=""><b>Ads Date</b></label>
                                                <input type="date" name="ads_date" id="ads_date" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for=""><b>Category</b></label>
                                                <select name="sub_category" class="form-control">
                                                        <option value="" id="update_sub_category"></option>
                                                    @foreach ($subcategories as $subcategory)
                                                        <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_email">Email</label>
                                                <input type="email" name="email" class="form-control" id="update_email" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_phone">Phone</label>
                                        <input type="tel" name="phone" class="form-control" id="update_phone" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_address"><b>Address</b></label><br>
                                        <textarea name="address" rows="3" class="form-control" id="update_address" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_web_url"><b>web-url</b></label><br>
                                        <input type="text" name="web_url" class="form-control" id="update_web_url" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_facebook_url"><b>facebook-url</b></label><br>
                                        <input type="text" name="facebook_url" class="form-control" id="update_facebook_url" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_what_we_do"><b>what-we-do</b></label><br>
                                        <textarea name="what-we-do" rows="3" class="form-control" id="update_what_we_do" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_why_join_us"><b>why-join-us</b></label><br>
                                        <textarea name="why-join-us" rows="3" class="form-control" id="update_why_join_us" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_vision"><b>vision</b></label><br>
                                        <textarea name="vision" rows="3" class="form-control" id="update_vision" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_mission"><b>mission</b></label><br>
                                        <textarea name="mission" rows="3" class="form-control" id="update_mission" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_about_us"><b>about us</b></label><br>
                                        <textarea name="about-us" rows="3" class="form-control" id="update_about_us" required></textarea>
                                    </div>
                                </div>
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="update_about_us"><b>Company Type (Ads or Normal)</b></label><br>--}}
{{--                                        <input type="radio" class="form-control rdo_type" name="type" id="rdo_ads"><label--}}
{{--                                            for="rdo_ads">Ads</label>--}}
{{--                                        <input type="radio" class="form-control rdo_type" name="type" id="rdo_normal"><label--}}
{{--                                            for="rdo_normal">Normal</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="update_about_us"><b>Ads Date</b></label><br>--}}
{{--                                        <input type="date" id="update_ads_date" class="form-control" name="ads_date">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
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
                    url: "{{url('member/get_all_company')}}",

                    cache: false,
                    success: function(data){
                        var data_return=JSON.parse(data);
                        //console.log(data);
                        t.clear();
                        var no = 1;
                        for(var i = 0;i<data_return.length;i++){
                            var link="{{url('company')}}/"+data_return[i]['id'];
                            var gallery_link="{{url('/member/company_photodetail/')}}/"+data_return[i]['id'];
                            t.row.add([
                                no++,
                                '<img src="'+data_return[i]['photo_url']+'" alt="" style="width:80px;height:80px">',
                                data_return[i]['name'],
                                data_return[i]['email'],
                                '<a target="_blank" href="'+link+'" class="btn btn-primary rounded-0 btn-sm">Detail</a>'+
                                '<button class="btn btn-success btn-sm" onclick="edit_data('+data_return[i]['id']+')" data-target="#edit_modalBox" data-toggle="modal">Edit</button>'+
                                '<button class="btn btn-danger btn-sm" onclick="delete_data('+data_return[i]['id']+')">Delete</button>'+
                                '<a href="'+gallery_link+'" class="btn btn-info rounded-0 btn-sm">Edit Photos</a>'
                            ]).draw( false );
                        }

                        $('#insert_company')[0].reset();
                    }
                });
            }

            $('#insert_company').on('submit',function (e)
            {
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax
                ({
                    type: "POST",
                    url: "{{url('member/insert_company')}}",
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
                    url: "../member/edit_company/"+id,

                    cache: false,
                    success: function(data){
                       // reset();
                        var company=JSON.parse(data);
                        $('#edit_modalBox').modal('show');
                        //console.log(company);
                        $("#imgs").attr("src", company['photo_url']);
                        $('#id_edit').val(company['id']);
                        $('#update_name').val(company['name']);
                        $('#update_sub_category').html(company['subcategory_name']);
                        $('#update_sub_category').val(company['sub_category_id']);
                        $('#update_email').val(company['email']);
                        $('#update_phone').val(company['phone']);
                        $('#update_address').val(company['address']);
                        $('#update_web_url').val(company['web_url']);
                        $('#update_facebook_url').val(company['facebook_url']);
                        $('#update_what_we_do').val(company['what-we-do']);
                        $('#update_why_join_us').val(company['why-join-us']);
                        $('#update_vision').val(company['vision']);
                        $('#update_mission').val(company['mission']);
                        $('#update_about_us').val(company['about-us']);
                        $('#ads_date').val(company['ads_date']);
                        company['type']=="ads"?$("#ads").attr("selected","selected"):$("#ads").attr("selected","selected");
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
                    url: "{{url('member/update_company')}}",
                    data:updateData,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        console.log(data);
                        //alert(data);
                        //$("#text").summernote('reset');
                        $('#edit_modalBox').modal('hide');
                        toastr.success('Update blog data successful');
                        load();
                    }
                });
                return false;
            });

            delete_data=function(id){
                if(confirm('Are you sure You want to delete!')==true){
                    $.ajax({
                        type: "get",
                        url: "../member/delete_company/"+id,

                        cache: false,
                        success: function(data){
                            console.log(data);
                            toastr.success('Delete Company Data successful');
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
