<?php
session_start();
/* include db connection file */
include("connection.php");
/*capture user_id*/ 
$USER_ID = $_POST['search'];

/* execute SQL statement */
$sql = "SELECT * FROM user AS s 
	WHERE USER_ID = $USER_ID";
$query = mysqli_query($conn, $sql) or 
	die ("Error: " . mysqli_error($conn));
$row = mysqli_num_rows($query);
if($row == 0){
	echo "No record found";
	echo "<br><a href='dashboard.php'>Back</a>";
}
else{
	$r = mysqli_fetch_assoc($query);
	$USER_ID = $r['StaffNo'];
	$USER_NAME = $r['StaffName'];
?>
<html>
<body>
<form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="StaffNo">Staff No</label>
                    <input type="type" class="form-control" id="StaffNo" disabled>
                  </div>
                  <div class="form-group">
                    <label for="StaffName">Staff Name</label>
                    <input type="type" class="form-control" id="StaffName" disabled>
                  </div>
</form>

<?php
}
mysqli_close($conn);
?>