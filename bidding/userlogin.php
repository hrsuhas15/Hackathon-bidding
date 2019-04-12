<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User login</title>
<!--CSS for login form-->
<link href="css/login.css" rel="stylesheet">

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<nav class="navbar navbar-inverse">
		 <div class="container-fluid">
				<div class="navbar-header">
				<strong class="navbar-brand"> USER | Online bidding system </strong>
				</div>
		 <ul class="nav navbar-nav navbar-right">
			  <li><a href="index.html">Back to MainPage</a></li>
    </ul>
	</div>
	</nav>
	<hr><br><br>
<div class="login-form">
    <form  action="api/user/loginCheck.php" method="post">
        <h2 class="text-center">Log in</h2>
        <div class="form-group" >
            <input type="number" name="mobile" class="form-control" placeholder="mobile" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="login" id="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
				<div class="someDiv"></div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>
    </form>
    <p class="text-center"><a href="register.html">Create an Account</a></p>
</div>
</body>
</html>
