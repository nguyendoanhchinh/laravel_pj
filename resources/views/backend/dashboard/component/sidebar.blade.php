<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="backend/img/profile_small.jpg" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        @if(Auth::check())
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
                        <li><a href="{{route('auth.logout')}}">Logout</a></li>
                    </ul>
                </div>

            </li>
            <li class="active">
                <a href="{{route('dashboard.index')}}"><i class="fa fa-th-large"></i> <span class="nav-label">QL Thành viên</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li class="active"><a href="{{route('dashboard.index')}}">QL Nhóm thành viên</a></li>
                    <li><a href="{{route('user.index')}}">QL thành viên</a></li>

                </ul>
            </li>

        </ul>

    </div>
</nav>
