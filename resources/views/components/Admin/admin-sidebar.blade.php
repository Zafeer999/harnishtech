<header class="main-nav">
    <nav class="h-100">
        <div class="main-navbar h-100">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav" class="h-100">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General </h6>
                        </div>
                    </li>
                    @can('dashboard.view')
                        <li class="dropdown">
                            <a class="nav-link menu-title link-nav {{ request()->routeIs('dashboard') ? 'active-bg' : '' }}" href="{{ route('dashboard') }}">
                                <i data-feather="home"></i><span>Dashboard</span></a>
                        </li>
                    @endcan

                    @canany(['categories.view', 'subcategories.view', 'coupons.view', 'timeslots.view', 'cities.view', 'documents.view'])
                        <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i data-feather="list"></i><span>Masters</span>
                            </a>
                            <ul class="nav-submenu menu-content">
                                @can('categories.view')
                                    <li><a href="{{ route('categories.index') }}">Categories </a></li>
                                @endcan
                                @can('subcategories.view')
                                    <li><a href="{{ route('subcategories.index') }}">SubCategories </a></li>
                                @endcan
                                @can('coupons.view')
                                    <li><a href="{{ route('coupons.index') }}">Coupons </a></li>
                                @endcan
                                @can('timeslots.view')
                                    <li><a href="{{ route('timeslots.index') }}">Time Slots </a></li>
                                @endcan
                                @can('cities.view')
                                    <li><a href="{{ route('cities.index') }}">Cities </a></li>
                                @endcan
                                @can('documents.view')
                                    <li><a href="{{ route('documents.index') }}">Documents </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @can(['users.view'])
                        <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i data-feather="user"></i><span>User Management</span>
                            </a>
                            <ul class="nav-submenu menu-content">
                                @can('users.view')
                                    <li><a href="{{ route('users.index') }}">Users </a></li>
                                @endcan
                                @can('roles.view')
                                    <li><a href="{{ route('roles.index') }}">Roles </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan


                    @canany(['banner_sliders.view'], ['cta_sections.view'])
                        <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i data-feather="settings"></i><span>Website Configuration</span>
                            </a>
                            <ul class="nav-submenu menu-content">
                                @can('banner_sliders.view')
                                    <li><a href="{{ route('banner_sliders.index') }}">Banner Sliders </a></li>
                                @endcan
                                @can('cta_sections.view')
                                    <li><a href="{{ route('cta_sections.index') }}">CTA Section </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @canany(['service_boys.view'])
                        <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i data-feather="briefcase"></i><span>Manage Service Boy</span>
                            </a>
                            <ul class="nav-submenu menu-content">
                                @can('service_boys.view')
                                    <li><a href="{{ route('service_boys.index') }}">Service Boy </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @can(['visitors.view'])
                        <li class="dropdown">
                            <a class="nav-link menu-title link-nav {{ request()->routeIs('visitors.index') ? 'active-bg' : '' }}" href="{{ route('visitors.index') }}">
                                <i data-feather="user-plus"></i><span>Visitors</span>
                            </a>
                        </li>
                    @endcan

                    @can(['queries.view'])
                        <li class="dropdown">
                            <a class="nav-link menu-title link-nav {{ request()->routeIs('queries.index') ? 'active-bg' : '' }}" href="{{ route('queries.index') }}">
                                <i data-feather="message-square"></i><span>Queries</span>
                            </a>
                        </li>
                    @endcan

                    @can(['orders.view'])
                        <li class="dropdown">
                            <a class="nav-link menu-title link-nav {{ request()->routeIs('orders.index') ? 'active-bg' : '' }}" href="{{ route('orders.index') }}">
                                <i data-feather="package"></i><span>Orders</span>
                            </a>
                        </li>
                    @endcan



                    @can('employees.view')
                        <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i data-feather="users"></i><span>Employees</span>
                            </a>
                            <ul class="nav-submenu menu-content">
                                @can('employees.create')
                                    <li><a href="{{ route('employees.create') }}">Add </a></li>
                                @endcan
                                @can('employees.view')
                                    <li><a href="{{ route('employees.index') }}">Employees List </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan


                    @can('manual-attendance.view')
                        <li class="dropdown">
                            <a class="nav-link menu-title link-nav {{ request()->routeIs('punches.index') ? 'active-bg' : '' }}" href="{{ route('punches.index') }}">
                                <i data-feather="cpu"></i><span>Manual Attendance</span>
                            </a>
                        </li>
                    @endcan


                    @can('apply-leaves.view')
                        <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i data-feather="file-text"></i><span>Apply Leaves</span>
                            </a>
                            <ul class="nav-submenu menu-content">
                                <li><a href="{{ route('leave-requests.index', ['page_type' => 'full_day']) }}">Full Day </a></li>
                                <li><a href="{{ route('leave-requests.index', ['page_type' => 'half_day']) }}">Half Day </a></li>
                                <li><a href="{{ route('leave-requests.index', ['page_type' => 'outpost']) }}">Outpost </a></li>
                            </ul>
                        </li>
                    @endcan


                    @can('apply-medical-leaves.view')
                        <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i data-feather="file-text"></i><span>Apply Medical Leaves</span>
                            </a>
                            <ul class="nav-submenu menu-content">
                                <li><a href="{{ route('leave-requests.active-medical-leave') }}">Unapproved Leaves </a></li>
                                <li><a href="{{ route('leave-requests.completed-medical-leave') }}">Approved Leaves </a></li>
                            </ul>
                        </li>
                    @endcan


                    @can('leave-application.pending')
                        <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i data-feather="file-text"></i><span>Leave Applications</span>
                            </a>
                            <ul class="nav-submenu menu-content">
                                @can('leave-application.pending')
                                    <li><a href="{{ route('leave-requests.application', ['page_type' => 'pending']) }}">Pending </a></li>
                                @endcan
                                @can('leave-application.approve')
                                    <li><a href="{{ route('leave-requests.application', ['page_type' => 'approved']) }}">Approved </a></li>
                                @endcan
                                @can('leave-application.reject')
                                    <li><a href="{{ route('leave-requests.application', ['page_type' => 'rejected']) }}">Rejected </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan


                    @can('roster.view')
                        <li class="dropdown">
                            <a class="nav-link menu-title link-nav {{ request()->routeIs('rosters.index') ? 'active-bg' : '' }}" href="{{ route('rosters.index') }}">
                                <i data-feather="repeat"></i><span>Employee Roster</span>
                            </a>
                        </li>
                    @endcan


                    @can('reports.month-wise')
                        <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i data-feather="layout"></i><span>Reports</span>
                            </a>
                            <ul class="nav-submenu menu-content">
                                @can('reports.month-wise')
                                    <li><a href="{{ route('reports.index') }}">Month wise report </a></li>
                                @endcan
                                @can('reports.muster')
                                    <li><a href="{{ route('reports.muster') }}">Muster report </a></li>
                                @endcan
                                @can('reports.muster')
                                    <li><a href="{{ route('reports.leave-report') }}">Leave report </a></li>
                                @endcan
                                @can('reports.month-wise')
                                    <li><a href="{{ route('dashboard.device-log-report') }}">Daily attendance </a></li>
                                @endcan
                                @can('reports.month-wise')
                                    <li><a href="{{ route('dashboard.todays-present-report') }}">Today's present </a></li>
                                @endcan
                                @can('reports.month-wise')
                                    <li><a href="{{ route('dashboard.todays-absent-report') }}">Today's absent </a></li>
                                @endcan
                                @can('reports.month-wise')
                                    <li><a href="{{ route('dashboard.department-wise-report') }}">Department wise </a></li>
                                @endcan
                                @can('reports.month-wise')
                                    <li><a href="{{ route('dashboard.todays-leave-bifurcation') }}">Leave bifurcation </a></li>
                                @endcan
                                @can('reports.month-wise')
                                    <li><a href="{{ route('dashboard.employee-wise-report') }}">Emp wise report </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan


                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{ request()->routeIs('show-change-password') ? 'active-bg' : '' }}" href="{{ route('show-change-password') }}">
                            <i data-feather="lock"></i><span>Change Password</span>
                        </a>
                    </li>


                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{ request()->routeIs('logout') ? 'active-bg' : '' }}" onclick="event.preventDefault(); document.getElementById('side-logout-form').submit();" href="{{ route('logout') }}">
                            <i data-feather="log-out"></i><span>Logout</span>
                        </a>
                        <form id="side-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
