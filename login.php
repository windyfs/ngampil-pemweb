<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Ngampil</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/Logo-02-01.png" rel="icon">
    <link href="assets/img/Logo-02-01.png" rel="apple-touch-icon">
	<link rel="stylesheet" type="text/css" href="assets/style2.css">
</head> 
<body>
     <form action="loginprocess.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
		 <a href="signup.php" class="ca">Create an account</a>
     </form>
</body>
</html>