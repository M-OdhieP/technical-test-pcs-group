<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="<?= base_url() ?>">
            </a>
        </div>

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100" id="product-menu">
                <a class="nav-link" href="<?= base_url() ?>">
                    <i class="fe fe-shopping-bag fe-16"></i>
                    <span class="ml-3 item-text">Product</span>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav flex-fill w-100 mb-2" id="summary-menu" style="display: none;">
            <li class="nav-item w-100 active">
                <a class="nav-link" href="<?= base_url() ?>">
                    <i class="fe fe-file-text fe-16"></i>
                    <span class="ml-3 item-text">Summary</span>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav flex-fill w-100 mb-2">

            <li class="nav-item w-100">
                <a class="nav-link" href="<?= base_url("blank") ?>">
                    <i class="fe fe-file fe-16"></i>
                    <span class="ml-3 item-text">blank page</span>
                </a>
            </li>


            <li class="nav-item dropdown">
                <a href="#charts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">User Setting</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="charts">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?= base_url("auth") ?>"><span class="ml-1 item-text">User List</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?= base_url("auth/create_user") ?>"><span class="ml-1 item-text">Create User</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?= base_url("auth/groups") ?>"><span class="ml-1 item-text">Groups</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?= base_url("auth/create_group") ?>"><span class="ml-1 item-text">Create Group</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?= base_url("auth/change_password") ?>"><span class="ml-1 item-text">Change Password</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?= base_url("auth/logout") ?>"><span class="ml-1 item-text">Logout</span></a>
                    </li>
                </ul>
            </li>


            <li class="nav-item w-100">
                <a class="nav-link" href="<?= base_url("dashboard/setting") ?>">
                    <i class="fe fe-settings fe-16"></i>
                    <span class="ml-3 item-text">Setting</span>
                </a>
            </li>

        </ul>


    </nav>
</aside>