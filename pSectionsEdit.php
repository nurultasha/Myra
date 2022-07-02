<?php
//ini_set('display_error', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
include('connection.php'); 
session_start();
if(isset($_POST['Save']))
{
    //$sectionid = $_POST['SecID'];
    //$secNumber = $_SESSION["newSecNumber"];
    //$_POST['sectionNumber'];
                    
    $secNum = $_POST['secNumber'];
    $sectionTitleMalay = $_POST['SecTitleMalay'];
    $sectionTitleEnglish = $_POST['SecTitleEng'];
    //$sectionDescription = $_POST['sectionDescription'];
    $sql = "UPDATE section SET sec_num = '$secNum',
    secTitleMalay = '$sectionTitleMalay', secTitleEng = '$sectionTitleEnglish' WHERE sec_ID = '$sectionid'";
    

    if(mysqli_query($conn, $sql)){
      header('Location: sections.php');
      
    }
    else{
      echo "error";}
}
?>
