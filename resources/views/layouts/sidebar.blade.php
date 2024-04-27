<div class="d-flex">
    <button class="toggle-btn" type="button">
        <img src="{{ asset('dist/assets/images/CDM_Logo.png') }}" style="width:50px; height:50px;">
    </button>
    <div class="sidebar-logo">
        <a href="#">USeP Mintal <br> Scheduling System</a>
    </div>
</div>
<ul class="sidebar-nav">
    <li class="sidebar-item">
        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth"
            aria-expanded="false" aria-controls="auth">
            <i class="lni lni-layout"></i>
            <span>Dashboard</span>
        </a>
        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

            <li class="sidebar-item">
                <a href="#" class="sidebar-link" style="margin-left:35px;"> <i class="lni lni-calendar"></i>
                    Schedule</a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link" style="margin-left:35px;"> <i class="lni lni-pencil"></i>
                    Assign</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#multi"
            aria-expanded="false" aria-controls="multi">
            <i class="lni lni-users"></i>
            <span>Faculty</span>
        </a>
        <ul id="multi" class="sidebar-dropdown list-unstyled collapse">

            <li class="sidebar-item">
                <a href="#" class="sidebar-link" style="margin-left:35px;"> <i class="lni lni-graduation"></i>
                    Graduate</a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link" style="margin-left:35px;"> <i class="lni lni-star-half"></i> Part
                    Timer</a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link" style="margin-left:35px;"> <i class="lni lni-pencil"></i> Add
                    Faculty</a>
            </li>
        </ul>
    </li>

    </li>
    <li class="sidebar-item">
        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#room"
            aria-expanded="false" aria-controls="room">
            <i class="lni lni-school-bench"></i>
            <span>Classroom</span>
        </a>
        <ul id="room" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

            <li class="sidebar-item">
                <a href="#" class="sidebar-link" style="margin-left:35px;"> <i class="lni lni-eye"></i> View
                    Room</a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link" style="margin-left:35px;"> <i class="lni lni-pencil"></i> Add
                    Room</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
            data-bs-target="#subject" aria-expanded="false" aria-controls="subject">
            <i class="lni lni-notepad"></i>
            <span>Subject</span>
        </a>
        <ul id="subject" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

            <li class="sidebar-item">
                <a href="#" class="sidebar-link" style="margin-left:35px;"> <i class="lni lni-eye"></i> View
                    Subject</a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link" style="margin-left:35px;"> <i class="lni lni-pencil"></i> Add
                    Subject</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#block"
            aria-expanded="false" aria-controls="block">
            <i class="lni lni-blackboard"></i>
            <span>Block</span>
        </a>
        <ul id="block" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

            <li class="sidebar-item">
                <a href="#" class="sidebar-link" style="margin-left:35px;"> <i class="lni lni-eye"></i> View
                    Block</a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link" style="margin-left:35px;"> <i class="lni lni-pencil"></i> Add
                    Block</a>
            </li>
        </ul>
    </li>

</ul>
