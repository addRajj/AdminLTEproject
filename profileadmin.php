<?php
session_start();
if(empty($_GET['email']))
{
    die("access denied");
}
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
                            <h3 class="card-title">Edit User/Admin Detail</h3>
                            <a href="registered.php" class="btn btn-primary btn-sm float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="AddAdminCode.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                        <!-- Now here we will create the modal for our Resgistration process -->
                                        <?php 
                                        if(isset($_GET['email']))
                                        {
                                            $email=$_GET['email'];
                                            $sql="SELECT * FROM admindetail WHERE email='$email' LIMIT 1";
                                            $query_result=mysqli_query($conn, $sql);
                                            if(mysqli_num_rows($query_result)>0)
                                            {
                                                foreach($query_result as $row)
                                                {
                                                    ?>
                                                        <input type="hidden" name="user_id" value="<?php echo $row['id']?>">
                                                        <div class="form-group">
                                                            <label for="">Name</label>
                                                            <input type="text" name="name" class="form-control" 
                                                            value="<?php echo $row['name']?> "
                                                            placeholder="Name" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Email Id</label>
                                                            <input type="email" class="form-control" 
                                                            name="email"
                                                            value="<?php echo $row['email']?> "
                                                            placeholder="Email" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Phone Number</label>
                                                            <input 
                                                            type="text" name="phone" class="form-control" 
                                                            value="<?php echo $row['phone']?> "
                                                            placeholder="Phone Number">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Password</label>
                                                            <input
                                                            type="password" name="password" class="form-control"
                                                            value="<?php echo $row['password']?> " 
                                                            placeholder="Password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Admin Image</label>
                                                            <input
                                                            type="file" name="image" 
                                                            value="" 
                                                            placeholder="image">
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
                                        <button type="submit" class="btn btn-info" name="UpdateAdmin">Update changes</button>
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