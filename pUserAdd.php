<?php

include("connection.php");
session_start();

if(isset($_POST["Save"])){

    //Valdiation 
    $id = $_SESSION['idNewAdd'];
    $sql2 = "SELECT * FROM rolepermission where USER_ID = '".$id."'";
    $qry = mysqli_query($conn, $sql2);
    $row = mysqli_num_rows($qry);
    
    if($row > 0){

        echo "Data already exists";
        echo $id;
        exit;
    }else{

        $roleStaff = $_POST["RoleStaff"];
        $access = $_POST["checkAccess"];
        $userID = $_SESSION["idNewAdd"];
       
    
        $sql = "INSERT INTO rolepermission (role_ID, cat_ID, USER_ID) values ('".$roleStaff."', '".$access."', '".$userID."');";
    
        if(mysqli_query($conn,$sql)){
    
            header("Location: User.php");
          
        }else{
            echo "error";
        }


    }




   

   
    


        
}

?>