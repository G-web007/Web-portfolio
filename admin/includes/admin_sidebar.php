<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">Menu</div>
    <!-- Users -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
            aria-expanded="true" aria-controls="collapseUser">
            <i class="fas fa-fw fa-cog"></i>
            <span>User</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User:</h6>
                <a class="collapse-item" href="user.php?source=view_all_user">View All Users</a>
                <a class="collapse-item" href="user.php?source=add_user">Add User</a>
            </div>
        </div>
    </li><!-- Users -->

    <!-- About -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbout"
            aria-expanded="true" aria-controls="collapseAbout">
            <i class="fas fa-fw fa-cog"></i>
            <span>About</span>
        </a>
        <div id="collapseAbout" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">About:</h6>
                <a class="collapse-item" href="about.php?source=view_biography">View Biography</a>
                <a class="collapse-item" href="about.php?source=add_about">Add Biography</a>
                <hr class="dropdown-divider">
                <a class="collapse-item" href="about.php?source=view_all_interests">View Interests</a>
            </div>
        </div>
    </li><!-- About -->

    <!-- Education -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEducation"
            aria-expanded="true" aria-controls="collapseEducation">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Education</span>
        </a>
        <div id="collapseEducation" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Education:</h6>
                <a class="collapse-item" href="education.php?source=view_all_education">View Education</a>
                <a class="collapse-item" href="education.php?source=add_education">Add Education</a>
            </div>
        </div>
    </li><!-- Education -->

    <!-- Employment History -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmployment"
            aria-expanded="true" aria-controls="collapseEmployment">
            <i class="fas fa-fw fa-cog"></i>
            <span>Employment</span>
        </a>
        <div id="collapseEmployment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">About:</h6>
                <a class="collapse-item" href="employment.php?source=view_employment">View History</a>
                <a class="collapse-item" href="employment.php?source=add_employment">Add Employment</a>
                <hr class="dropdown-divider">
                <a class="collapse-item" href="employment.php?source=view_description">View Job Description</a>
            </div>
        </div>
    </li><!-- Employment History -->
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>