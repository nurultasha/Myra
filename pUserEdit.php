<?php
include("connection.php");
session_start();

if(isset($_POST["Save"])){

    $roleID = $_POST["RoleStaff"];
    $permission_id = $_SESSION['newstaffnumber'];
    $status = $_POST["checkAccess"];

  
    $sql = "UPDATE rolepermission SET role_ID = '".$roleID."', cat_ID = '".$status."' 
           WHERE permission_ID = '".$permission_id."' LIMIT 1";

    if(mysqli_query($conn, $sql)){

        header('Location: User.php');
        
    }
    
    else{

        echo "error";
    }
   
}

?>