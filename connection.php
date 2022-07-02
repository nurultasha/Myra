<?php 
//database connection file
//save this file as connection.php inside the newly created folder
$dbuser = "root";
$dbpass = "";
$dbhost = "localhost";
$dbname = "myra";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

/*if(!isset($conn))
    echo "connection is not ok";
else
    echo "hahaha connection is ok";
*/
?>

