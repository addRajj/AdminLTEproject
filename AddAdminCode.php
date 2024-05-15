<?php
include('config/dbcon.php');
session_start();
if(isset($_POST['addAdmin']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    
    $sql1="SELECT * FROM admindetail WHERE email='$email'";
    $sql_result=mysqli_query($conn, $sql1);
    if(mysqli_num_rows($sql_result)>0)
    {
        die("The email is already registered");
        header("location: registered.php");
    }
    $sql="INSERT INTO admindetail(name,phone,email,password, role) VALUES('$name','$phone','$email','$password', '$role')";

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
    $role=$_POST['role'];

    $sql="UPDATE admindetail set name='$name',phone='$phone', email='$email',password='$password' ,  role='$role' WHERE id='$user_id'";

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
if(isset($_POST['addEvent']))
{

    $e_title=$_POST['title'];
    // $e_image=$_POST['image'];
    $e_venue=$_POST['venue'];
    // $e_video=$_POST['video'];
    $e_date=$_POST['date'];
    $e_time=$_POST['time'];
    $e_desc=$_POST['desc'];
    echo "hello";
    // image information
    if(isset($_FILES['image']))
    {
    $img_name=$_FILES['image']['name'];
    $img_size=$_FILES['image']['size'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $image_error=$_FILES['image']['error'];

    
    echo "it is working";

    if ($image_error === 0) {
       
        $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc=strtolower($img_ex);
        $allowed_img_exs=array("jpg", "jpeg", "png");
    	

    	if (in_array($img_ex_lc, $allowed_img_exs)) {
    		
    		
            $new_img_name=uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path='UploadedImage/'.$new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path );
    		// Now let's Insert the video path into database
            $sql = "INSERT INTO events(title, image,  description, venue, date, time) 
                   VALUES('$e_title', '$new_img_name',  '$e_desc', '$e_venue', '$e_date', '$e_time')";
            mysqli_query($conn, $sql);
            header("Location: events.php");
    	}
    }   
    } 
    else
    {
        echo "not working ji";
    }
}
?>