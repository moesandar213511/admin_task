<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('images/admin_image//sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{url('/')}}" target="_blank" class="simple-text logo-normal">
            <img src="{{asset('/upload/ghi.png')}}" alt="" width="80px" height="80px;">
        </a>
    </div>
 <div class="sidebar-wrapper">
        <ul class="nav">
            {{-- <li class="nav-item @if($url=="dashboard") active @endif">
                <a class="nav-link" href="{{url('admin')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li> --}}
            {{-- <li class="nav-item @if($url=="company_profile") active @endif">
                <a class="nav-link" href="{{url('admin/company_profile')}}">
                    <i class="material-icons">person</i>
                    <p>Manage Website</p>
                </a>
            </li>
            <li class="nav-item @if($url=="company_list") active @endif">
                <a class="nav-link" href="{{url('admin/company_list')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Company List</p>
                </a>
            </li>
            <li class="nav-item @if($url=="category") active @endif">
                <a class="nav-link" href="{{url('admin/category')}}">
                    <i class="material-icons">library_books</i>
                    <p>Manage Category</p>
                </a>
            </li> --}}
            @if(Auth::check())
            <?php $type=Auth::user()->type; ?>
                @if($type == "admin")
                    <li class="nav-item @if($url=="member") active @endif">
                        <a class="nav-link" href="{{url('admin/member')}}">
                            <i class="material-icons">person</i>
                            <p>Member Account</p>
                        </a>
                    </li>
                    <li class="nav-item @if($url=="task") active @endif">
                        <a class="nav-link" href="{{url('admin/task')}}">
                            <i class="material-icons">book</i>
                            <p>Task</p>
                        </a>
                    </li>
                    {{-- <li class="nav-item @if($url=="list") active @endif">
                        <a class="nav-link" href="{{url('admin/list')}}">
                            <i class="material-icons">dashboard</i>
                            <p>List Name</p>
                        </a>
                    </li> --}}

                    {{-- <li class="nav-item @if($url=="company") active @endif">
                        <a class="nav-link" href="{{url('admin/company')}}">
                            <i class="material-icons">book</i>
                            <p>Company</p>
                        </a>
                    </li> --}}
                    <!-- <li class="nav-item @if($url=="main_category") active @endif">
                        <a class="nav-link" href="{{url('admin/main_category')}}">
                            <i class="material-icons">dashboard</i>
                            <p>Main Category</p>
                        </a>
                    </li>  -->
                    {{-- <li class="nav-item @if($url=="sub_category") active @endif">
                        <a class="nav-link" href="{{url('admin/sub_category')}}">
                            <i class="material-icons">bubble_chart</i>
                            <p>Category</p>
                        </a>
                    </li> --}}
                @else
                    {{-- <li class="nav-item @if($url=="event") active @endif">
                        <a class="nav-link" href="{{url('member/event')}}">
                            <i class="material-icons">person</i>
                            <p>Manage Event</p>
                        </a>
                    </li> --}}
                    <li class="nav-item @if($url=="task") active @endif">
                        <a class="nav-link" href="{{url('member/task')}}">
                            <i class="material-icons">book</i>
                            <p>Task</p>
                        </a>
                    </li>
                    
                @endif
            @endif
             <li class="nav-item @if($url=="profile") active @endif">
                        <a class="nav-link" href="{{url('member/profile')}}">
                            <i class="material-icons">person</i>
                            <p>Profile</p>
                        </a>
                    </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('logout')}}">
                    <i class="material-icons">logout</i>
                    <p>Logout</p>
                </a>
            </li>

            {{-- <li class="nav-item @if($url=="feedback") active @endif">
                <a class="nav-link" href="{{url('admin/feedback')}}">
                    <i class="material-icons">location_ons</i>
                    <p>Manage Feedback</p>
                </a>
            </li> --}}
            {{--<li class="nav-item ">--}}
                {{--<a class="nav-link" href="./notifications.html">--}}
                    {{--<i class="material-icons">notifications</i>--}}
                    {{--<p>Notifications</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item ">--}}
                {{--<a class="nav-link" href="./rtl.html">--}}
                    {{--<i class="material-icons">language</i>--}}
                    {{--<p>RTL Support</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item active-pro ">--}}
                {{--<a class="nav-link" href="./upgrade.html">--}}
                    {{--<i class="material-icons">unarchive</i>--}}
                    {{--<p>Upgrade to PRO</p>--}}
                {{--</a>--}}
            {{--</li>--}}
        </ul>
    </div>
</div>
