  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Dashboard Admin</span>
    </a>
        <!-- Sidebar -->
          <!-- Sidebar Menu -->
          <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">
                    <i class="nav-icon fas fa-calendar-alt"></i>
                    Language Test
                </li>
                <li class="nav-item">
                    <a href="/admin/toep" class="nav-link">
                      <p>TOEP</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/toefl" class="nav-link">
                      <p>TOEFL</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/ielts" class="nav-link">
                      <p>IELTS</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/ubipa" class="nav-link">
                      <p>UBIPA</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/jlpt" class="nav-link">
                      <p>JLPT</p>
                    </a>
                  </li>
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">
                    <i class="nav-icon fas fa-user"></i>
                    User Management
                </li>
                <li class="nav-item">
                    <a href="/admin/verifktp" class="nav-link">
                      <p>Verifikasi KTP</p>
                    </a>
                  </li>
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">
                    <i class="nav-icon fas fa-user"></i>
                    Administration
                </li>
                <li class="nav-item">
                    <a href="{{route("admin.paymentmethod")}}" class="nav-link">
                      <p>Payment Method</p>
                    </a>
                  </li>
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

