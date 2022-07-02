<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>MyRA Search System</title>
	<link rel="stylesheet" href="styleindex.css">
	<script language="javascript">
</head>
<body>
function checkEmptyFields()
{
	var username = document.form1.username.value;
	var password = document.form1.password.value;
	if(username == "" || password == "")
	{
		alert("Please enter user ID/password!");
		return false;
	}
	else if(username.length != 6)
	{
		alert("User ID should be 6 digits!");
		return false;
	}
	else
		return true;
}
</script>
<div class="center">
	<h1> MyRA Login </h1>
<form method="post" action="login0.php">
	<div class="txt_field">
		<input type="text" name="username" required>
		<span></span>
		<label>User ID</label>
	</div>
	<div class="txt_field">
		<input type="password" name="password"required>
		<span></span>
		<label>Password</label>
	</div>
  	<td colspan="2" align="center"><input type="submit" name="Submit" value="Login" onClick="return checkEmptyFields()"> 
</form>
</div>
</body>
</html>