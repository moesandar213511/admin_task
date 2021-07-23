@extends('admin.layouts.site_admin.site_admin_design')
@section('title','Admin | Company Detail')
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
    Task Detail
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- <div class="card-header card-header-primary">
                        <button type="button" name="button" class="btn btn-success pull-right" data-keyboard="false" data-backdrop="static"><a href="">Update Photos</a></button>
                        </div> --}}
                        <div class="card-body">
                            <div class="table-responsive">
                               <table class="table table-hovered">
                                    <tbody>
                                        @foreach($task_arr as $task_each)
                                      <tr>
                                        <td><b>Name</b></td>
                                        <td>{{$task_each->name}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>List Name</b></td>
                                        <td>{{$task_each['list_id']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Detail</b></td>
                                        <td>{{$task_each['detail']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Member</b></td>
                                        <td>{{$task_each['user_id']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Deadline</b></td>
                                        <td>{{$task_each['deadline']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Status</b></td>
                                        <td>{{$task_each['status']}}</td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection