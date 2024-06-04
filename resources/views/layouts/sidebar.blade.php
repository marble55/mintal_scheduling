<div class="logo-tag d-flex">
    <button class="toggle-btn" type="button">
        <img src="{{ asset('dist/assets/images/CDM_Logo.png') }}" style="width:50px; height:50px;">
    </button>
    <div class="sidebar-logo">
        <a href="#">
            <h2>UMSS</h2>
        </a>
    </div>
</div>
<ul class="sidebar-nav">
    
    <!-- Dashboard -->
    <li class="sidebar-item">
        <a href="{{ route('dashboard') }}" class="sidebar-link">
            <i class="lni lni-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>
    
    <!-- Schedule -->
    <li class="sidebar-item has-dropdown">
        <a href="#" class="sidebar-link">
            <i class="lni lni-layout"></i>
            <span>Schedule</span>
            <i class="lni lni-chevron-down arrow"></i>
        </a>
        <ul class="sidebar-dropdown list-unstyled">
            <li class="sidebar-item">
                <a href="{{ route('schedule.index') }}" class="sidebar-link">
                    <i class="lni lni-calendar"></i> Schedule
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('schedule.create') }}" class="sidebar-link">
                    <i class="lni lni-pencil"></i> Assign
                </a>
            </li>
        </ul>
    </li>
    
    <!-- Faculty -->
    <li class="sidebar-item has-dropdown">
        <a href="#" class="sidebar-link">
            <i class="lni lni-users"></i>
            <span>Faculty</span>
            <i class="lni lni-chevron-down arrow"></i>
        </a>
        <ul class="sidebar-dropdown list-unstyled">
            <li class="sidebar-item">
                <a href="{{ route('faculty.index', ['category' => 'faculty']) }}" class="sidebar-link">
                    <i class="lni lni-graduation"></i> View Faculty
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('faculty.index', ['category' => 'part-timer']) }}" class="sidebar-link">
                    <i class="lni lni-star-half"></i> View Part Timer
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('faculty.create') }}" class="sidebar-link">
                    <i class="lni lni-pencil"></i> Add Faculty
                </a>
            </li>
        </ul>
    </li>

    @can('isAdmin')
        <!-- Classroom -->
        <li class="sidebar-item has-dropdown">
            <a href="#" class="sidebar-link">
                <i class="lni lni-school-bench"></i>
                <span>Classroom</span>
                <i class="lni lni-chevron-down arrow"></i>
            </a>
            <ul class="sidebar-dropdown list-unstyled">
                <li class="sidebar-item">
                    <a href="{{ route('classroom.index') }}" class="sidebar-link">
                        <i class="lni lni-eye"></i> View Room
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('classroom.create') }}" class="sidebar-link">
                        <i class="lni lni-pencil"></i> Add Room
                    </a>
                </li>
            </ul>
        </li>

        <!-- Subject -->
        <li class="sidebar-item has-dropdown">
            <a href="#" class="sidebar-link">
                <i class="lni lni-notepad"></i>
                <span>Subject</span>
                <i class="lni lni-chevron-down arrow"></i>
            </a>
            <ul class="sidebar-dropdown list-unstyled">
                <li class="sidebar-item">
                    <a href="{{ route('subject.index') }}" class="sidebar-link">
                        <i class="lni lni-eye"></i> View Subject
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('subject.create') }}" class="sidebar-link">
                        <i class="lni lni-pencil"></i> Add Subject
                    </a>
                </li>
            </ul>
        </li>

        <!-- Block -->
    <li class="sidebar-item has-dropdown">
        <a href="#" class="sidebar-link">
            <i class="lni lni-blackboard"></i>
            <span>Block</span>
            <i class="lni lni-chevron-down arrow"></i>
        </a>
        <ul class="sidebar-dropdown list-unstyled">
            <li class="sidebar-item">
                <a href="{{ route('block.index') }}" class="sidebar-link">
                    <i class="lni lni-eye"></i> View Block
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('block.create') }}" class="sidebar-link">
                    <i class="lni lni-pencil"></i> Add Block
                </a>
            </li>
        </ul>
    </li>

    <!-- Program Head -->
    <li class="sidebar-item has-dropdown">
        <a href="#" class="sidebar-link">
            <i class="lni lni-user"></i>
            <span>Program Head</span>
            <i class="lni lni-chevron-down arrow"></i>
        </a>
        <ul class="sidebar-dropdown list-unstyled">
            <li class="sidebar-item">
                <a href="{{ route('program-head.index') }}" class="sidebar-link">
                    <i class="lni lni-eye"></i> View Program Head
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('program-head.create') }}" class="sidebar-link">
                    <i class="lni lni-pencil"></i> Add Program Head
                </a>
            </li>
        </ul>
    </li>

    <!-- Academic Calendar Settings -->
    <li class="sidebar-item">
        <a href="{{ route('academic-calendar.create') }}" class="sidebar-link">
            <i class="lni lni-cog"></i>
            <span>Academic Calendar</span>
        </a>
    </li>
    @endcan
</ul>
