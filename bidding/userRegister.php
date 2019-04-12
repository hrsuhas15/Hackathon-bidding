<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<title>User Registration</title>
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
				<strong class="navbar-brand">USER | Online bidding system </strong>
				</div>
		 <ul class="nav navbar-nav navbar-right">
			  <li><a href="index.html">Back to MainPage</a></li>
    </ul>
	</div>
	</nav>
	<hr>
<div class="login-form">
    <form id="p" action="api/user/createUser.php" method="post">
        <h2 class="text-center">Register</h2>
        <div class="form-group">
            <input type="text" name="name"  id="name" class="form-control" placeholder="Name" required="required">
        </div>
        <div class="form-group">
            <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" required="required">
        </div>
        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">
        </div>
				<div class="form-group">
						<input type="text" name="address" id="address"class="form-control" placeholder="address" required="required">
				</div>
        <div class="form-group">
            <button type="submit" name="create" id="create" class="btn btn-primary btn-block" value="create">Register</button>
        </div>
    </form>
		<script type="text/javascript">
		$(document).ready(function() {
	    $('#p').submit(function(e) {
	        e.preventDefault();
	        $.ajax({
	            type: "POST",
	            url:'api/user/createUser.php',
							dataType: 'json',
	            data: $(this).serialize(),
	            success: function(response)
	            {
	                var jsonData = JSON.parse(response);

	                // user is logged in successfully in the back-end
	                // let's redirect
									alert(jsonData);
	                if (jsonData.message)
	                {
                      alert(jsonData.message);
											location.href = '../';
	                }
	                else
	                {
	                    alert('Invalid Credentials!');
	                }
	           }
						 error: function()
						 {
							 alert('error');
						 }
	       });
	     });
	});
		</script>
</div>
</body>
</html>
