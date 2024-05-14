<?php
session_start();
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Model To add Admin -->
    <div class="modal fade" id="AddUserModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="AddAdminCode.php" method="POST">
            <div class="modal-body">
              <!-- Now here we will create the modal for our Resgistration process -->
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="">Email Id</label>
                <input type="email" class="form-control" name="email" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="phone" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Name">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="addAdmin">Save changes</button>
            </div>
            </form>
          </div>
      </div>
    </div> 

    <!-- Model to delete User-->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Admin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="AddAdminCode.php" method="POST">
            <div class="modal-body">
              <input type="hidden" name="delete_id" class="delete_user_id">
              <p>Are you sure, you want to delete this admin entry?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="DeleteAdmin">Yes! Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div> 

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Register Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Register Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php
            if(isset($_SESSION['status']))
            {
              echo "<h4 style=color:green>".$_SESSION['status']."</h4>";
              unset($_SESSION['status']);
            }
          ?>
          <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">DataTable with default features</h3>
                      <a href="#" data-toggle="modal" data-target="#AddUserModel" class="btn btn-primary btn-sm float-right">Add Admin</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone Number</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                            $sql="SELECT * FROM admindetail";
                            $sql_result=mysqli_query($conn, $sql);
                            if(mysqli_num_rows($sql_result)>0)
                            {
                              foreach($sql_result as $row)
                              {
                                ?>
                                  <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?>
                                    </td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td>
                                      <a href="registered-edit.php?user_id=<?php echo $row['id']; ?>"  class="btn btn-info btn-sm">Edit</a>
                                      <a href="registered-delete.php?user_id=<?php echo $row['id']; ?>"class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                  </tr>
                                <?php
                              }
                            }
                            else
                            {
                              ?>
                              <tr>
                                <td>No record Found</td>
                              </tr>
                              <?php
                            }

                          ?>
                        
                        </tbody>
                      </table>
                    </div>
          </div>
        </div>
      </div>
    </div>
    <section>
</div>
<?php
include('includes/script.php');
?>
<?php
include('includes/footer.php');
?>