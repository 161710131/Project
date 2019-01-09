<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="active">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              
                Dashboard
              </p>
            </a>
          </li>

          <li class="active">
            <a href="{{Route('kategori.index')}}" class="nav-link">
              <i class="nav-icon fa fa-folder"></i>
              
                Kategori
              </p>
            </a>
          </li>

          <li class="active">
            <a href="{{Route('barang.index')}}" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
              
                Barang
              </p>
            </a>
          </li>

          <li class="active">
            <a href="{{Route('konsumen.index')}}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              
                Data Konsumen
              </p>
            </a>
          </li>

          <li class="active">
            <a href="{{Route('peminjaman.index')}}" class="nav-link">
              <i class="nav-icon fa fa-shopping-cart"></i>
              
                Barang Rental
              </p>
            </a>
          </li>

          <li class="active">
            <a href="{{Route('pengembalian.index')}}" class="nav-link">
              <i class="nav-icon fa fa-refresh"></i>
                Pengembalian
              </p>
            </a>
          </li>
        
          <li class="nav-header">LABELS</li>
          <li class="active">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-danger"></i>
              <p class="text">Forget Password</p>
            </a>
          </li>
          <li class="active">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-warning"></i>
              Register</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>