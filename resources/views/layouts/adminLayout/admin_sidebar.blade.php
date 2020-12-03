<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="active"><a href="{{url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Degree/module</span> <span class="label label-important">3</span></a>
            <ul>
                <li><a href="{{url('/admin/add-degree')}}">Add Degree/module</a></li>
                <li><a href="{{url('/admin/view-degrees')}}">View Degree/module</a></li>
            </ul>
        </li>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Past Exam Papers</span> <span class="label label-important">3</span></a>
            <ul>
                <li><a href="{{url('/admin/add-paper')}}">Add Past Paper</a></li>
                <li><a href="{{url('/admin/view-papers')}}">View Past Paper</a></li>
            </ul>
        </li>

    </ul>
</div>
<!--sidebar-menu-->
