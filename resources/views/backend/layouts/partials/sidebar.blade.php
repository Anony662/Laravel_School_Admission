@php
    $usr = Auth::guard('admin')->user();
@endphp

<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h4 class="text-white">Admission</h4>
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    
                    @if ($usr->can('dashboard.view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('role.create') || $usr->can('role.view') || $usr->can('role.edit') || $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Roles & Permissions</span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.roles.index') || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                            @endif
                            @if ($usr->can('role.create'))
                                <li class="{{ Route::is('admin.roles.create') ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('admin.create') || $usr->can('admin.view') || $usr->can('admin.edit') || $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>Admins</span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index') || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                            @endif
                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create') ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('student.create') || $usr->can('student.view') || $usr->can('student.edit') || $usr->can('student.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-graduation-cap"></i><span>Student Admission</span></a>
                        <ul class="collapse {{ Route::is('admin.students.create') || Route::is('admin.students.index') || Route::is('admin.students.edit') || Route::is('admin.students.show') ? 'in' : '' }}">
                            @if ($usr->can('student.view'))
                                <li class="{{ Route::is('admin.students.index') || Route::is('admin.students.edit') ? 'active' : '' }}"><a href="{{ route('admin.students.index') }}">All Admissions</a></li>
                            @endif
                            @if ($usr->can('student.create'))
                                <li class="{{ Route::is('admin.students.create') ? 'active' : '' }}"><a href="{{ route('admin.students.create') }}">Create Admission</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('employee.create') || $usr->can('employee.view') || $usr->can('employee.edit') || $usr->can('employee.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-users"></i><span>Employees</span></a>
                        <ul class="collapse {{ Route::is('admin.employees.create') || Route::is('admin.employees.index') || Route::is('admin.employees.edit') || Route::is('admin.employees.show') ? 'in' : '' }}">
                            @if ($usr->can('employee.view'))
                                <li class="{{ Route::is('admin.employees.index') || Route::is('admin.employees.show') ? 'active' : '' }}"><a href="{{ route('admin.employees.index') }}">All Employees</a></li>
                            @endif
                            @if ($usr->can('employee.create'))
                                <li class="{{ Route::is('admin.employees.create') ? 'active' : '' }}"><a href="{{ route('admin.employees.create') }}">Create Employee</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                                       
                    @if ($usr->can('department.create') || $usr->can('department.view') ||  $usr->can('department.edit') ||  $usr->can('department.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-building"></i><span>Departments</span></a>
                        <ul class="collapse {{ Route::is('admin.departments.create') || Route::is('admin.departments.index') || Route::is('admin.departments.edit') || Route::is('admin.departments.show') ? 'in' : '' }}">
                            @if ($usr->can('department.view'))
                                <li class="{{ Route::is('admin.departments.index')  || Route::is('admin.departments.edit') ? 'active' : '' }}"><a href="{{ route('admin.departments.index') }}">All Departments</a></li>
                            @endif
                            @if ($usr->can('department.create'))
                                <li class="{{ Route::is('admin.departments.create')  ? 'active' : '' }}"><a href="{{ route('admin.departments.create') }}">Create Department</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                              
                    @if ($usr->can('course.create') || $usr->can('course.view') || $usr->can('course.edit') || $usr->can('course.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-book"></i><span>Courses</span></a>
                        <ul class="collapse {{ Route::is('admin.courses.create') || Route::is('admin.courses.index') || Route::is('admin.courses.edit') || Route::is('admin.courses.show') ? 'in' : '' }}">
                            @if ($usr->can('course.view'))
                                 <li class="{{ Route::is('admin.courses.index') || Route::is('admin.courses.edit') ? 'active' : '' }}"><a href="{{ route('admin.courses.index') }}">All Courses</a></li>
                            @endif
                            @if ($usr->can('course.create'))
                                <li class="{{ Route::is('admin.courses.create') ? 'active' : '' }}"><a href="{{ route('admin.courses.create') }}">Create Course</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
      
                    @if ($usr->can('notice.create') || $usr->can('notice.view') || $usr->can('notice.edit') || $usr->can('notice.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-bullhorn"></i><span>Notices</span></a>
                        <ul class="collapse {{ Route::is('admin.notices.create') || Route::is('admin.notices.index') || Route::is('admin.notices.edit') || Route::is('admin.notices.show') ? 'in' : '' }}">
                            @if ($usr->can('notice.view'))
                                <li class="{{ Route::is('admin.notices.index') || Route::is('admin.notices.edit') ? 'active' : '' }}"><a href="{{ route('admin.notices.index') }}">All Notices</a></li>
                            @endif
                            @if ($usr->can('notice.create'))
                                <li class="{{ Route::is('admin.notices.create') ? 'active' : '' }}"><a href="{{ route('admin.notices.create') }}">Create Notice</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('message.create') || $usr->can('message.view') || $usr->can('message.edit') || $usr->can('message.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-envelope"></i><span>Messages</span></a>
                        <ul class="collapse {{ Route::is('admin.message.create') || Route::is('admin.message.index') || Route::is('admin.message.edit') || Route::is('admin.message.show') ? 'in' : '' }}">
                            @if ($usr->can('message.view'))
                                 <li class="{{ Route::is('admin.message.index') || Route::is('admin.message.show') ? 'active' : '' }}"><a href="{{ route('admin.message.index') }}">All Messages</a></li>
                            @endif
                            @if ($usr->can('message.create'))
                                 <li class="{{ Route::is('admin.message.create') ? 'active' : '' }}"><a href="{{ route('admin.message.create') }}">Send New Message</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
