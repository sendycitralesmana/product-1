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
                    <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (auth()->user()->role_id == 1)
                <li class="nav-item">
                    <a href="/user" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>User</p>
                    </a>
                </li>
                @endif
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{ request()->is(
                        'product-category', 'product-category/*',
                        'product', 'product/*',
                        'specification', 'specification/*',
                        'pv-specification', 'pv-specification/*',
                        'product-variant', 'product-variant/*',
                        'media-type', 'media-type/*',
                        'media-product', 'media-product/*',
                        'product-video', 'product-video/*',
                        ) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            List Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/product-category"
                                class="nav-link {{ request()->is('product-category') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/product"
                                class="nav-link {{ request()->is('product') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/specification"
                                class="nav-link {{ request()->is('specification') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Specification</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/product-variant"
                                class="nav-link {{ request()->is('product-variant') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Variant</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pv-specification"
                                class="nav-link {{ request()->is('pv-specification') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Variant Specification</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/media-type"
                                class="nav-link {{ request()->is('media-type') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Media Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/media-product"
                                class="nav-link {{ request()->is('media-product') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Media Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/product-video"
                                class="nav-link {{ request()->is('product-video') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Product Video</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{ request()->is(
                        'application', 'application/*',
                        'media', 'media/*',
                        'video', 'video/*',
                        ) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            List Applications
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/application"
                                class="nav-link {{ request()->is('application') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Application</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/application-media"
                                class="nav-link {{ request()->is('application-media') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Media</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/application-video"
                                class="nav-link {{ request()->is('application-video') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Video</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
