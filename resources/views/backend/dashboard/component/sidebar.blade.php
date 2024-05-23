

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="backend/img/profile_small.jpg" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        @if (Auth::check())
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">{{ Auth::user()->name }}</strong>
                                </span>
                            </span>
                        @endif
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                        </ul>
                </div>

            </li>
           
            @foreach (config('apps.module.module') as $key => $val)
            <li>
                <a href="">
                    <i class="{{ $val['icon'] }}"></i>
                    <span class="nav-label">{{ $val['title'] }}</span>
                    <span class="fa arrow"></span>
                </a>
                @if (isset($val['subModule']))
                    <ul class="nav nav-second-level">
                        @foreach ($val['subModule'] as $module)
                            <li>
                                {{-- <a href="{{ ($module['route']) }}">{{ $module['title'] }}</a> --}}
                                <a href="{{ url($module['route']) }}">{{ $module['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        



            {{-- <li>
                <a href="{{ route('dashboard.index') }}"><i class="fa fa-file"></i> <span class="nav-label">QL Bài
                        viết</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li class="active"><a href="{{ route('user.catalogue.index') }}">QL Nhóm Bài viết</a></li>
                    <li><a href="{{ route('user.index') }}">QL Bài viết</a></li>

                </ul>
            </li> --}}
        </ul>

    </div>
</nav>
