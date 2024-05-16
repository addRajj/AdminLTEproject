<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php 
            include 'config.php';
            if (isset($_SESSION['email'])) {
              $email = $_SESSION['email'];    
              $sql_res=mysqli_query($conn,"SELECT image FROM `admindetail` where email='$email' LIMIT 1")or die();
              if(mysqli_num_rows($sql_res)>0)
              {
                foreach($sql_res as $row)
                {
                  $image_path='UploadedImage/'.$row['image'];
                }
              }
              
            }

        ?>  
          <img src="<?php echo htmlspecialchars($image_path); ?>" class="img-circle elevation-2" alt="User Image">
        
        </div>
        <div class="info">
          <?php 
            if (isset($_SESSION['email'])) {
              $email = $_SESSION['email'];        
          }
          ?>
          <a href="profileadmin.php?email=<?php echo ($email);?>" class="d-block">
          <?php 
          if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            echo "$email<br>";
        }

          
          ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Features</li>
          <li class="nav-item">
            <a href="profileadmin.php?email=<?php echo ($email);?>" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Admin Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Admin Panel
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="registered.php?email=<?php echo ($email);?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Registration</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-calendar-alt"></i>
              <p>
                Event Panel
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="events.php?email=<?php echo ($email);?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Event Registration
                  </p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
            <a href="logoutadmin.php?email=<?php echo ($email);?>" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  