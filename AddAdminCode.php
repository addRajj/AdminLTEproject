<?php
include('config/dbcon.php');
session_start();
if(isset($_POST['addAdmin']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    
    $sql="INSERT INTO admindetail(name,phone,email,password) VALUES('$name','$phone','$email','$password')";

    $query_result=mysqli_query($conn, $sql);
    if($query_result)
    {
        $_SESSION['status']="User Added Successfully";
        header("location: registered.php");
    }
    else
    {
        $_SESSION['status']="User Registration Failed";
        header("location: registered.php");
    }
}
if(isset($_POST['UpdateAdmin']))
{
    $user_id=$_POST['user_id']; 
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];

    $sql="UPDATE admindetail set name='$name',phone='$phone', email='$email',password='$password' WHERE id='$user_id'";

    $sql_result=mysqli_query($conn, $sql);
    if($sql_result)
    {
        $_SESSION['status']="User Updated Successfully";
        header("Location: registered.php");
    }
    else
    {
        $_SESSION['status']="User Updation Failed";
        header("Location: registered.php");
    }

}
if(isset($_POST['DeleteAdmin']))
{
    $user_id=$_POST['user_id']; 
    
    $sql="DELETE FROM admindetail WHERE id='$user_id'";
    $sql2="UPDATE admindetail
    SET id = id - 1
    WHERE id > $user_id";

    $sql_result=mysqli_query($conn, $sql);
    $sql_result2=mysqli_query($conn, $sql2);
    
    if($sql_result && $sql_result2)
    {
        $_SESSION['status']="User Deleted Successfully";
        header("Location: registered.php");
    }
    else
    {
        $_SESSION['status']="User Deleation Failed";
        header("Location: registered.php");
    }

}
?>