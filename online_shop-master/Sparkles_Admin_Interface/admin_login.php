
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Login Page - Sparkles Administration</title>
	<link rel="stylesheet" href="admin_login.css" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
</head>
<body>


	<!-- header -->
	<div id="header" >
		<div class="logo">
			<a href=""><img src="Layout/Images/white_logo.png" alt="logo image" /></a>
		</div>
		<div id="additionalNote" style="text-align: center;">
    Sparkles Admin
</div>
	</div>

	<div class="login-box">
		<h1>Administrator Area</h1>


	<form id="login-form" name="login-form" method="post" action="admin_index.php">
		<input class="form-control" type="text" placeholder="User Name" maxlength="128" size="32" name="login" id="login"></input><br/>
		<input class="form-control" type="password" placeholder="Password" maxlength="128" size="32" name="password" id="password"></input><br />
		<button class="btn regular-button regular-main-button submit" type="submit">
			<span>Log in</span>
		</button>
	</form>
	</div>
	<div id="copyright">
		<p>&copy; 2016 - <b>Sparkles</b> by Team Echo</p>
	</div>




    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
