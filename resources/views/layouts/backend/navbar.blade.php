<!-- Main Sidebar Container -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('theme-assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <h3 class="brand-text font-weight-light">HZ-Tech</h3>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset(getUser_image(auth()->id()))}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ucwords(Auth::user()->fullname)}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link active ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('dashboard.v1')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                    </ul>
                </li>
                @if(count_role_previliges('user') > 0)
                    <li class="nav-item has-treeview @if(\Request::is('/users/*')) menu-open @endif">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users "></i>
                            <p>
                                Users
                                <i class="fas fa-angle-left right"></i>
                                {{--                            {{users_count()}}--}}
                                <span class="badge badge-info right">{{( !empty(users_count())) ? users_count() : '0'  }}</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ">
                            <?php if(check_role_previliges('add', 'add user'))
                            { ?>
                            <li class="nav-item">
                                <a href="{{route('users.add')}}" class="nav-link @if(\Request::is('/User/add')) menu-open active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New</p>
                                </a>
                            </li><?php
                            } ?>
                            <?php if(check_role_previliges('view', 'view user'))
                            { ?>
                            <li class="nav-item">
                                <a href="{{route('users.show')}}" class="nav-link @if(\Request::is('/User/show')) menu-open active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View All</p>
                                </a>
                            </li><?php
                            } ?>
                        </ul>
                    </li>
                @endif
                @if(count_role_previliges('holiday') > 0)
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-globe-europe"></i>
                            <p>
                                Holidays
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if(check_role_previliges('add', 'add holiday'))
                            { ?>
                            <li class="nav-item">
                                <a href="{{route('holidays.add')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New</p>
                                </a>
                            </li><?php }?>
                            <?php if(check_role_previliges('view', 'view holiday'))
                            { ?>
                            <li class="nav-item">
                                <a href="{{route('holidays.show')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View All</p>
                                </a>
                            </li><?php }?>
                        </ul>
                    </li>
                @endif
                @if(count_role_previliges('profile') > 0)
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-astronaut"></i>
                            <p>
                                Profile
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if(check_role_previliges('view', 'view profile') || check_role_previliges('Edit', 'edit profile'))
                            { ?>
                            <li class="nav-item">
                                <a href="{{route('users.profile')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Edit Profile</p>
                                </a>
                            </li><?php } ?>
                        </ul>
                    </li>
                @endif
                @if(count_role_previliges('logs') > 0)
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-clock"></i>
                            <p>
                                User Logs
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <?php if(check_role_previliges('attendance', 'mark attendance'))
                        { ?>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('users.UserLog')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mark Attendance</p>
                                </a>
                            </li>
                        </ul><?php } ?>
                        <?php if(check_role_previliges('day-logs', 'day logs'))
                        { ?>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('users.DayLog')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Day Logs</p>
                                </a>
                            </li>
                        </ul><?php } ?>
                        <?php if(check_role_previliges('month-logs', 'month logs'))
                        { ?>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('users.MonthLog')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Month Logs</p>
                                </a>
                            </li>
                        </ul><?php } ?>
                    </li>
                @endif
                @if(count_role_previliges('role') > 0)
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-tag"></i>
                            <p>
                                Roles
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if(check_role_previliges('add', 'add role'))
                            { ?>
                            <li class="nav-item">
                                <a href="{{route('roles.add')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New</p>
                                </a>
                            </li><?php } ?>
                            <?php if(check_role_previliges('view', 'view role'))
                            { ?>
                            <li class="nav-item">
                                <a href="{{route('roles.show')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View All</p>
                                </a>
                            </li><?php } ?>
                        </ul>
                    </li>
                @endif
                @if(count_role_previliges('suggestion') > 0)
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Suggestions
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if(check_role_previliges('add', 'add suggestion'))
                            { ?>
                            <li class="nav-item">
                                <a href="{{route('suggestions.add')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New</p>
                                </a>
                            </li><?php } ?>
                            <li class="nav-item">
                                <?php if(check_role_previliges('view', 'view suggestion'))
                                { ?>
                                <a href="{{route('suggestions.show')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Your Suggestions</p>
                                </a>
                            </li><?php } ?>
                            <li class="nav-item">
                                <?php if(check_role_previliges('view all', 'view all suggestion'))
                                { ?>
                                <a href="{{route('suggestions.viewall')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View All</p>
                                </a>
                            </li><?php } ?>
                        </ul>
                    </li>
                @endif
                @if(count_role_previliges('application') > 0)
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Applications
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if(check_role_previliges('add', 'add application'))
                            { ?>
                            <li class="nav-item">
                                <a href="{{route('applications.add')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New</p>
                                </a>
                            </li><?php } ?>
                            <?php if(check_role_previliges('view', 'view application'))
                            { ?>
                            <li class="nav-item">
                                <a href="{{route('applications.show')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Your Applications</p>
                                </a>
                            </li><?php } ?>
                            <?php if(check_role_previliges('view all', 'view all application'))
                            { ?>
                            <li class="nav-item">
                                <a href="{{route('applications.viewall')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View All</p>
                                </a>
                            </li><?php } ?>
                        </ul>
                    </li>
                @endif
                @if(count_role_previliges('complain') > 0)
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-angry"></i>
                            <p>
                                Complains
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if(check_role_previliges('add', 'add complain'))
                            { ?>
                            <li class="nav-item">
                                <a href="{{route('complains.add')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New</p>
                                </a>
                            </li><?php } ?>
                            <?php if(check_role_previliges('view', 'view complain'))
                            { ?>
                            <li class="nav-item">
                                <a href="{{route('complains.show')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Your Complains</p>
                                </a>
                            </li><?php } ?>
                            <?php if(check_role_previliges('view all', 'view all complain'))
                            { ?>
                            <li class="nav-item">
                                <a href="{{route('complains.viewall')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View All</p>
                                </a>
                            </li><?php } ?>
                        </ul>
                    </li>
                @endif
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shield-alt"></i>
                        <p>
                            Give Role Permissions
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!--                        --><?php //if(check_role_previliges('add', 'add permission'))
                        //                        { ?>
                        <li class="nav-item">
                            <a href="{{route('previliges.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                        <!--                    --><?php //} ?>
                    <!--                        --><?php //if(check_role_previliges('view', 'view permission'))
                        //                        { ?>
                        <li class="nav-item">
                            <a href="{{route('previliges.show')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All</p>
                            </a>
                        </li>
                        <!--                        --><?php //} ?>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shield-alt"></i>
                        <p>
                            Give Users Permissions
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!--                        --><?php //if(check_role_previliges('add', 'add permission'))
                        //                        { ?>
                        <li class="nav-item">
                            <a href="{{route('permissions.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                        <!--                    --><?php //} ?>
                    <!--                        --><?php //if(check_role_previliges('view', 'view permission'))
                        //                        { ?>
                        <li class="nav-item">
                            <a href="{{route('permissions.show')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All</p>
                            </a>
                        </li>
                        <!--                        --><?php //} ?>
                    </ul>
                </li>

                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.0" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->

</aside>
<!-- /. Main Sidebar Container End -->
