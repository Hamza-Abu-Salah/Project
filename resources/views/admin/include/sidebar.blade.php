<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">

                </li>
                <li class="@yield('dashboard')">
                    <a href="/admin"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="@yield('employer')">
                    <a href="/admin/employer"><i class="fe fe-users"></i> <span>Leaders</span></a>
                </li>
                <li class="@yield('users')">
                    <a href="/admin/users"><i class="fe fe-users"></i> <span>Users</span></a>
                </li>
                <li class="@yield('projects')">
                    <a href="/admin/projects"><i class="fe fe-layout"></i> <span>Project</span></a>
                </li>
                <li class="@yield('tasks')">
                    <a href="/admin/tasks"><i class="fe fe-list-task"></i> <span>Tasks</span></a>
                </li>
                <li class="@yield('users_tasks')">
                    <a href="/admin/tasks/users"><i class="fe fe-list-task"></i> <span>Users Tasks</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
