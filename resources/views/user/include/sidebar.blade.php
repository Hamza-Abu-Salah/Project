<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">

                </li>
                <li class="@yield('dashboard')">
                    <a href="/user"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="@yield('projects')">
                    <a href="/user/projects"><i class="fe fe-layout"></i> <span>Project</span></a>
                </li>
                <li class="@yield('to_do')">
                    <a href="/user/tasks/to-do"><i class="fe fe-list-task"></i> <span>To Do Tasks</span></a>
                </li>
                <li class="@yield('doing')">
                    <a href="/user/tasks/doing"><i class="fe fe-list-task"></i> <span>Doing Tasks</span></a>
                </li>
                <li class="@yield('done')">
                    <a href="/user/tasks/done"><i class="fe fe-list-task"></i> <span>Done Tasks</span></a>
                </li>
                <li class="@yield('cancelled')">
                    <a href="/user/tasks/cancelled"><i class="fe fe-list-task"></i> <span>Cancelled Tasks</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
