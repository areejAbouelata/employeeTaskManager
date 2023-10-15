<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
    @if(auth()->user()->user_type == 'super_admin')
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link {{ Route::is('admin.user.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Users
                    <span class="badge badge-info right">{{$userCount}}</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.employee.index') }}" class="nav-link {{ Route::is('admin.employee.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Employee
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.department.index') }}" class="nav-link {{ Route::is('admin.department.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    departments
                </p>
            </a>
        </li>
        @elseif(auth()->user()->user_type =="manager")
            <li class="nav-item">
                <a href="{{ route('admin.task.index') }}" class="nav-link {{ Route::is('admin.task.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        task
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.employee.index' , ['user'=> 'manager']) }}" class="nav-link {{ Route::is('admin.employee.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Employee
                    </p>
                </a>
            </li>
        @elseif(auth()->user()->user_type =="employee")

            <li class="nav-item">
                <a href="{{ route('admin.employee_task.index') }}" class="nav-link {{ Route::is('admin.employee_task.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        task
                    </p>
                </a>
            </li>
        @endif

    </ul>
</nav>
