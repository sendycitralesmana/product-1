<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">MARECA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @if (auth()->user())
                    {{ auth()->user()->name }}
                    @endif
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="/backoffice/dashboard" class="nav-link {{ request()->is('backoffice/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (auth()->user()->role_id == 1)
                <li class="nav-item">
                    <a href="/backoffice/user" class="nav-link {{ request()->is('backoffice/user') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>User</p>
                    </a>
                </li>
                @endif
                @if (auth()->user()->role_id == 2)
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link {{ request()->is(
                            'backoffice/product', 'backoffice/product/*',
                            ) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                List Products
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/backoffice/product/category"
                                    class="nav-link {{ request()->is('backoffice/product/category') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/backoffice/product"
                                    class="nav-link {{ request()->is('backoffice/product') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>Product</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/backoffice/product/specification"
                                    class="nav-link {{ request()->is('backoffice/product/specification') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>Specification</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/application"
                            class="nav-link {{ request()->is('backoffice/application', 'backoffice/application/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Application</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link {{ request()->is('backoffice/post', 'backoffice/post/*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                            List Post
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="/backoffice/post/category" class="nav-link {{ request()->is('backoffice/post/category', 'backoffice/post/category/*') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Post Category</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/backoffice/post" class="nav-link {{ request()->is('post', 'post/*') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Post</p>
                            </a>
                          </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/client"
                            class="nav-link {{ request()->is('backoffice/client', 'backoffice/client/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Client</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link {{ request()->is('backoffice/about/content', 'backoffice/about/content/*', 'backoffice/about/history', 'backoffice/about/history/*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                            List About
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="/backoffice/about/content" class="nav-link {{ request()->is('backoffice/about/content', 'backoffice/about/content/*') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Content</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/backoffice/about/history" class="nav-link {{ request()->is('backoffice/about/history', 'backoffice/about/history/*') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>History</p>
                            </a>
                          </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
