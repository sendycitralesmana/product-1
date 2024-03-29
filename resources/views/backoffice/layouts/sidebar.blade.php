<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="/backoffice/dashboard" class="brand-text text-center ">
        <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image mt-2" style="opacity: .8">
    </a> --}}
    <a href="/backoffice/dashboard" class="brand-link">
        <img src="{{ asset('images/logo.webp') }}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light" style="text-transform: uppercase">
            <b>Matahari LED</b>
        </span>
      </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3  ">
            <div class="info text-center">
                <p href="#" class="d-block text-white" style="text-transform: uppercase">
                    @if (auth()->user())
                    {{ auth()->user()->role->name }}
                    @endif
                </p>
            </div>
        </div> --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{-- <div class="image">
              <img src="{{ asset('storage/image/user/'. auth()->user()->avatar) }}" class="img-circle elevation-2" alt="User Image"
              style="height: 35px; width: 35px">
            </div> --}}
            <div class="info text-center">
                <a href="#" class="d-block" style="text-transform: uppercase">
                    <b>{{ auth()->user()->role->name }}</b>
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
                        <i class="nav-icon fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                @if (auth()->user()->role_id == 1)
                <li class="nav-item">
                    <a href="/backoffice/user" class="nav-link {{ request()->is('backoffice/user') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Akun</p>
                    </a>
                </li>
                @endif
                @if (auth()->user()->role_id == 2)
                    {{-- <li class="nav-item has-treeview">
                        <a href="#" class="nav-link {{ request()->is(
                            'backoffice/product', 'backoffice/product/*',
                            ) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Daftar produk
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/backoffice/product/category"
                                    class="nav-link {{ request()->is('backoffice/product/category') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Kategori</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/backoffice/product"
                                    class="nav-link {{ request()->is('backoffice/product') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Produk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/backoffice/product/specification"
                                    class="nav-link {{ request()->is('backoffice/product/specification') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Spesifikasi</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="nav-item">
                        <a href="/backoffice/product"
                            class="nav-link {{ request()->is('backoffice/product', 'backoffice/product/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-list"></i>
                            <p>Produk</p>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="/backoffice/product/specification"
                            class="nav-link {{ request()->is('backoffice/product/specification') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-list"></i>
                            <p>Spesifikasi</p>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="/backoffice/application"
                            class="nav-link {{ request()->is('backoffice/application', 'backoffice/application/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>Proyek</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/post" class="nav-link {{ request()->is('backoffice/post', 'backoffice/post/*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-newspaper"></i>
                          <p>Artikel</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/gallery" class="nav-link {{ request()->is('backoffice/gallery', 'backoffice/gallery/*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-image"></i>
                          <p>Galeri</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/client"
                            class="nav-link {{ request()->is('backoffice/client', 'backoffice/client/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Klien</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/feedback"
                            class="nav-link {{ request()->is('backoffice/feedback', 'backoffice/feedback/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>Pesan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/about/content" class="nav-link {{ request()->is('backoffice/about/content', 'backoffice/about/content/*') ? 'active' : '' }}">
                          <i class="fa fa-columns nav-icon"></i>
                          <p>Konten</p>
                        </a>
                      </li>
                    {{-- <li class="nav-item has-treeview">
                        <a href="#" class="nav-link {{ request()->is('backoffice/about/content', 'backoffice/about/content/*', 'backoffice/about/history', 'backoffice/about/history/*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                            Daftar konten
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="/backoffice/about/content" class="nav-link {{ request()->is('backoffice/about/content', 'backoffice/about/content/*') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Konten</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/backoffice/about/history" class="nav-link {{ request()->is('backoffice/about/history', 'backoffice/about/history/*') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>History</p>
                            </a>
                          </li>
                        </ul>
                    </li> --}}
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
