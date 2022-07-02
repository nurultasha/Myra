<?php
session_start();
/* include connection file */
include("connection.php");

if(isset($_POST['Submit'])){
	/* capture values from HTML form */
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
		/* execute SQL command */
		$sql = "SELECT * FROM user WHERE USER_ID = '$username'
		AND USER_PASSWORD = '$password'";
	  	$sql2 = "SELECT * FROM rolepermission r JOIN user u ON r.USER_ID = u.USER_ID 
		WHERE r.USER_ID = '$username'";
		$sql3 = "SELECT * FROM rolepermission r JOIN user u ON r.USER_ID = u.USER_ID WHERE r.USER_ID = '$username'";
	  echo $sql;
	  $query = mysqli_query($conn, $sql) or die("Error: " . mysqli_error($conn));
	  $query2 = mysqli_query($conn, $sql2) or die("Error: " . mysqli_error($conn));
	  $query3 = mysqli_query($conn, $sql3) or die("Error: " . mysqli_error($conn));
	  $row = mysqli_num_rows($query);

	  if($row == 0 ){
	   echo "Invalid Username/Password.";
	  }

	  else{
	   $r = mysqli_fetch_assoc($query);
	   $r2 = mysqli_fetch_assoc($query2);
	   $r3 = mysqli_fetch_assoc($query3);

	   if ($r3['cat_ID'] == "1") {
	   $_SESSION['USER_ID'] = $r['USER_ID'];
	   $_SESSION['USER_NAME'] = $r['USER_NAME'];
	   $_SESSION['role_ID'] = $r2['role_ID'];
	   $_SESSION['cat_ID'] = $r3['cat_ID'];
	   header("Location: mainpage.php");
	   }

	   else{
		?>
		<script type="text/javascript">
		alert("You are not obligated to log in.");
		window.location.href = "index.php";
		</script>
		<?php
	}
	  
	}

}

mysqli_close($conn);
?>

