<!DOCTYPE html>
<html>
<head>

	<title>Test Site</title>
	
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" charset="utf-8"/>
	
</head>


<body>

<div id="login_form">

	<h1>Please Login!</h1>
	
	<form name="form1" method="post" action="login_check.php">
		
		Username<input name="username" type="text" id="username" style="width:100px">
	
		Password<input name="password"  type="text" id="password" style="width:100px">
		
		<input type="submit" name="Submit" value="Login">
		
	</form>
	
	<a href="registration.php">Create Account</a>
		
</div>


</body>

</html>