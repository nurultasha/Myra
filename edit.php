<?php
/* include db connection file*/
include("connection.php");
/* capture staff ID */
$snumber = $_REQUEST['snumber'];
/* execute SQL statement */
$sql= "SELECT * FROM user 
WHERE USER_ID = $snumber";
$query = mysqli_query($conn, $sql) or die ("Error: " . mysqli_error());
$row = mysqli_num_rows($query);
if($row == 0){
echo "No record found";
}
else{
$r = mysqli_fetch_assoc($query);
$id= $r['USER_ID'];
$username= $r['USER_NAME'];
$password= $r['USER_PASSWORD'];
?>
<html>
<body>
<form name="form" method="post" action="process0.php">
User ID:<input type="text" name="id" value="<?php echo $id; ?>"><br>
User name:<input type="text" name="num" value="<?php echo $username; ?>"><br>
Password:<input type="password" name= "password" value="<?php echo $password; ?>"><br>
<input type="submit" name="Update" value="Update">
<input type="submit" name="Delete" value="Delete">
</form>
<a href='login.html'>login</a>
</body>
</html>
<?php
}
mysqli_close($conn);
?>
