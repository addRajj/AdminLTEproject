<?php
session_start();
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<div class="content-wrapper">
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Delete-Admin</h3>
                            <a href="registered.php" class="btn btn-primary btn-sm float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="AddAdminCode.php" method="POST">
                                        <div class="modal-body">
                                        <!-- Now here we will create the modal for our Resgistration process -->
                                        <?php 
                                        if(isset($_GET['user_id']))
                                        {
                                            $user_id=$_GET['user_id'];
                                            $sql="SELECT * FROM admindetail WHERE id='$user_id' LIMIT 1";
                                            $query_result=mysqli_query($conn, $sql);
                                            if(mysqli_num_rows($query_result)>0)
                                            {
                                                foreach($query_result as $row)
                                                {
                                                    ?>
                                                        <input type="hidden"
                                                        readonly style="pointer-events: none;"
                                                        name="user_id" value="<?php echo $row['id']?>">
                                                        <div class="form-group">
                                                            <label for="">Name</label>
                                                            <input type="text"
                                                            readonly style="pointer-events: none;"
                                                            name="name" class="form-control" 
                                                            value="<?php echo $row['name']?> "
                                                            placeholder="Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Email Id</label>
                                                            <input type="email" 
                                                            readonly style="pointer-events: none;"
                                                            class="form-control" 
                                                            name="email"
                                                            value="<?php echo $row['email']?> "
                                                            placeholder="Email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Phone Number</label>
                                                            <input 
                                                            readonly style="pointer-events: none;"
                                                            type="text" name="phone" class="form-control" 
                                                            value="<?php echo $row['phone']?> "
                                                            placeholder="Phone Number">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Password</label>
                                                            <input
                                                            readonly style="pointer-events: none;"
                                                            type="password" name="password" class="form-control"
                                                            value="<?php echo $row['password']?> " 
                                                            placeholder="Password">
                                                        </div>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "<h4>No record Found.</h4>";
                                            }
                                        }
                                        ?>

                                        <div class="modal-footer">
                                        <button type="submit" class="btn btn-info" name="DeleteAdmin">Delete Record</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
include('includes/script.php');
?>
<?php
include('includes/footer.php');
?>