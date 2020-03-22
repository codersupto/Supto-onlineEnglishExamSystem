<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a target="_blank" href="{{ config('app.developer.web_url') }}" class="brand-link">
        <img src="{{ Gravatar::get(config('app.developer.email')) }}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.developer.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Gravatar::get(auth()->guard('admin')->user()->email) }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="@auth('admin') {{ route('admin.dashboard') }} @elseauth('teacher') {{ 'teacher' }} @endauth"
                   class="d-block">
                    @auth('admin') {{ auth()->guard('admin')->user()->name }} @endauth
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


                <li class="sidebar-item nav-item user-panel has-treeview {{ request()->segment(2) === 'locations' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->segment(2) === 'locations' ? 'active' : '' }}">
                        <i class="fas fa-map-marker-alt nav-icon"></i>
                        <p>
                            Location
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.locations.index') }}"
                               class="nav-link {{ request()->url() === route('admin.locations.index') ? 'active' : '' }}">
                                <i class="fas fa-map-marker-alt nav-icon"></i>
                                <p>All Location</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.locations.create') }}"
                               class="nav-link {{ request()->url() === route('admin.locations.create') ? 'active' : '' }}">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Location</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.location.trash') }}"
                               class="nav-link {{ request()->url() === route('admin.location.trash') ? 'active' : '' }}">
                                <i class="fas fa-trash nav-icon"></i>
                                <p>Trash Location</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item nav-item user-panel has-treeview {{ request()->segment(2) === 'teachers' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->segment(2) === 'teachers' ? 'active' : '' }}">
                        <i class="fas fa-user-graduate nav-icon"></i>
                        <p>
                            Teachers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.teachers.index') }}"
                               class="nav-link {{ request()->url() === route('admin.teachers.index') ? 'active' : '' }}">
                                <i class="fas fa-users nav-icon"></i>
                                <p>All teacher</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.teachers.create') }}"
                               class="nav-link {{ request()->url() === route('admin.teachers.create') ? 'active' : '' }}">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Add teacher</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item nav-item user-panel has-treeview {{ request()->segment(2) === 'students' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->segment(2) === 'students' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Students
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.students.index') }}"
                               class="nav-link {{ request()->url() === route('admin.students.index') ? 'active' : '' }}">
                                <i class="fas fa-users nav-icon"></i>
                                <p>All Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.students.create') }}"
                               class="nav-link {{ request()->url() === route('admin.students.create') ? 'active' : '' }}">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Add Student</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


{{--<li class="nav-item">--}}
{{--    <a href="../widgets.html" class="nav-link">--}}
{{--        <i class="nav-icon fas fa-th"></i>--}}
{{--        <p>--}}
{{--            Widgets--}}
{{--            <span class="right badge badge-danger">New</span>--}}
{{--        </p>--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li class="nav-item has-treeview menu-open">--}}
{{--    <a href="#" class="nav-link active">--}}
{{--        <i class="nav-icon fas fa-copy"></i>--}}
{{--        <p>--}}
{{--            Layout Options--}}
{{--            <i class="fas fa-angle-left right"></i>--}}
{{--            <span class="badge badge-info right">6</span>--}}
{{--        </p>--}}
{{--    </a>--}}
{{--    <ul class="nav nav-treeview">--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../layout/top-nav.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Top Navigation</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../layout/top-nav-sidebar.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Top Navigation + Sidebar</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../layout/boxed.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Boxed</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../layout/fixed-sidebar.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Fixed Sidebar</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../layout/fixed-topnav.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Fixed Navbar</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../layout/fixed-footer.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Fixed Footer</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../layout/collapsed-sidebar.html" class="nav-link active">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Collapsed Sidebar</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
{{--<li class="nav-item has-treeview">--}}
{{--    <a href="#" class="nav-link">--}}
{{--        <i class="nav-icon fas fa-chart-pie"></i>--}}
{{--        <p>--}}
{{--            Charts--}}
{{--            <i class="right fas fa-angle-left"></i>--}}
{{--        </p>--}}
{{--    </a>--}}
{{--    <ul class="nav nav-treeview">--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../charts/chartjs.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>ChartJS</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../charts/flot.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Flot</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../charts/inline.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Inline</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
{{--<li class="nav-item has-treeview">--}}
{{--    <a href="#" class="nav-link">--}}
{{--        <i class="nav-icon fas fa-tree"></i>--}}
{{--        <p>--}}
{{--            UI Elements--}}
{{--            <i class="fas fa-angle-left right"></i>--}}
{{--        </p>--}}
{{--    </a>--}}
{{--    <ul class="nav nav-treeview">--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../UI/general.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>General</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../UI/icons.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Icons</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../UI/buttons.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Buttons</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../UI/sliders.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Sliders</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../UI/modals.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Modals & Alerts</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../UI/navbar.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Navbar & Tabs</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../UI/timeline.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Timeline</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../UI/ribbons.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Ribbons</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
{{--<li class="nav-item has-treeview">--}}
{{--    <a href="#" class="nav-link">--}}
{{--        <i class="nav-icon fas fa-edit"></i>--}}
{{--        <p>--}}
{{--            Forms--}}
{{--            <i class="fas fa-angle-left right"></i>--}}
{{--        </p>--}}
{{--    </a>--}}
{{--    <ul class="nav nav-treeview">--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../forms/general.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>General Elements</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../forms/advanced.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Advanced Elements</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../forms/editors.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Editors</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../forms/validation.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Validation</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
{{--<li class="nav-item has-treeview">--}}
{{--    <a href="#" class="nav-link">--}}
{{--        <i class="nav-icon fas fa-table"></i>--}}
{{--        <p>--}}
{{--            Tables--}}
{{--            <i class="fas fa-angle-left right"></i>--}}
{{--        </p>--}}
{{--    </a>--}}
{{--    <ul class="nav nav-treeview">--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../tables/simple.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Simple Tables</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../tables/data.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>DataTables</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../tables/jsgrid.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>jsGrid</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
{{--<li class="nav-header">EXAMPLES</li>--}}
{{--<li class="nav-item">--}}
{{--    <a href="../calendar.html" class="nav-link">--}}
{{--        <i class="nav-icon far fa-calendar-alt"></i>--}}
{{--        <p>--}}
{{--            Calendar--}}
{{--            <span class="badge badge-info right">2</span>--}}
{{--        </p>--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--    <a href="../gallery.html" class="nav-link">--}}
{{--        <i class="nav-icon far fa-image"></i>--}}
{{--        <p>--}}
{{--            Gallery--}}
{{--        </p>--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li class="nav-item has-treeview">--}}
{{--    <a href="#" class="nav-link">--}}
{{--        <i class="nav-icon far fa-envelope"></i>--}}
{{--        <p>--}}
{{--            Mailbox--}}
{{--            <i class="fas fa-angle-left right"></i>--}}
{{--        </p>--}}
{{--    </a>--}}
{{--    <ul class="nav nav-treeview">--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../mailbox/mailbox.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Inbox</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../mailbox/compose.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Compose</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../mailbox/read-mail.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Read</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
{{--<li class="nav-item has-treeview">--}}
{{--    <a href="#" class="nav-link">--}}
{{--        <i class="nav-icon fas fa-book"></i>--}}
{{--        <p>--}}
{{--            Pages--}}
{{--            <i class="fas fa-angle-left right"></i>--}}
{{--        </p>--}}
{{--    </a>--}}
{{--    <ul class="nav nav-treeview">--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/invoice.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Invoice</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/profile.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Profile</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/e_commerce.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>E-commerce</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/projects.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Projects</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/project_add.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Project Add</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/project_edit.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Project Edit</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/project_detail.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Project Detail</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/contacts.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Contacts</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
{{--<li class="nav-item has-treeview menu-open">--}}
{{--    <a href="#" class="nav-link">--}}
{{--        <i class="nav-icon far fa-plus-square"></i>--}}
{{--        <p>--}}
{{--            Extras--}}
{{--            <i class="fas fa-angle-left right"></i>--}}
{{--        </p>--}}
{{--    </a>--}}
{{--    <ul class="nav nav-treeview">--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/login.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Login</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/register.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Register</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/forgot-password.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Forgot Password</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/recover-password.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Recover Password</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/lockscreen.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Lockscreen</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/legacy-user-menu.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Legacy User Menu</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/language-menu.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Language Menu</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/404.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Error 404</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/500.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Error 500</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/pace.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Pace</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../examples/blank.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Blank Page</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="../../starter.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Starter Page</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
{{--<li class="nav-header">MISCELLANEOUS</li>--}}
{{--<li class="nav-item">--}}
{{--    <a href="https://adminlte.io/docs/3.0" class="nav-link">--}}
{{--        <i class="nav-icon fas fa-file"></i>--}}
{{--        <p>Documentation</p>--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li class="nav-header">MULTI LEVEL EXAMPLE</li>--}}
{{--<li class="nav-item">--}}
{{--    <a href="#" class="nav-link">--}}
{{--        <i class="fas fa-circle nav-icon"></i>--}}
{{--        <p>Level 1</p>--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li class="nav-item has-treeview">--}}
{{--    <a href="#" class="nav-link">--}}
{{--        <i class="nav-icon fas fa-circle"></i>--}}
{{--        <p>--}}
{{--            Level 1--}}
{{--            <i class="right fas fa-angle-left"></i>--}}
{{--        </p>--}}
{{--    </a>--}}
{{--    <ul class="nav nav-treeview">--}}
{{--        <li class="nav-item">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Level 2</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item has-treeview">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>--}}
{{--                    Level 2--}}
{{--                    <i class="right fas fa-angle-left"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="far fa-dot-circle nav-icon"></i>--}}
{{--                        <p>Level 3</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="far fa-dot-circle nav-icon"></i>--}}
{{--                        <p>Level 3</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="far fa-dot-circle nav-icon"></i>--}}
{{--                        <p>Level 3</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Level 2</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--    <a href="#" class="nav-link">--}}
{{--        <i class="fas fa-circle nav-icon"></i>--}}
{{--        <p>Level 1</p>--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li class="nav-header">LABELS</li>--}}
{{--<li class="nav-item">--}}
{{--    <a href="#" class="nav-link">--}}
{{--        <i class="nav-icon far fa-circle text-danger"></i>--}}
{{--        <p class="text">Important</p>--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--    <a href="#" class="nav-link">--}}
{{--        <i class="nav-icon far fa-circle text-warning"></i>--}}
{{--        <p>Warning</p>--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--    <a href="#" class="nav-link">--}}
{{--        <i class="nav-icon far fa-circle text-info"></i>--}}
{{--        <p>Informational</p>--}}
{{--    </a>--}}
{{--</li>--}}