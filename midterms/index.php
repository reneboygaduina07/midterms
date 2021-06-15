<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
		<style>
		body{
			margin: 0;
			padding: 0;
			background-color:orange;
            background-size: cover;
			background-position: no-repeat;
			font-family: 'Poppins', sans-serif;
		}
		.boxer{
			width: 320px;
			height: 400px;
			
			color: #004444;
			top: 50%;
			left: 50%;
			position: absolute;
			transform: translate(-50%, -50%);
			box-sizing: border-box;
			padding: 30px 30px;
		}
		.pik{
			width: 100px;
			height: 100px;
			border-radius: 50%;
			position: absolute;
			top: -50px;
			left: calc(50% - 50px);
		}
		.h1{
			margin: 0;
			padding: 0 0 20px;
			text-align: center;
			font-size: 22px;
			color: yellow;
		}
		.boxer p {
			margin: 0;
			padding: 0;
			font-weight: bold;
		}
		.boxer input{
			width: 100%;
			margin-bottom: 20px;
		}
		.boxer input[type="text"], input[type="password"]{
			border: none;
			border-bottom: 3px solid black;
			background: transparent;
			outline: none;
			height: 40px;
			color: red;
			font-size: 24px;	
		}
		.boxer input[type="submit"]{
			border: none;
			outline: none;
			height: 40px;
			background: red;
			color: #fff;
			font-size: 18px;
			border border-radius: 20px;
		}
		.ca{
			color:black;
		}
</style>
</head>
<body>

     <form action="login.php" method="post">
     	<div class="boxer">
            <center></center>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
		<p style="color:red;font-size:20px;">LOGIN YOUR ACCOUNT</p>
		<br>
		<br>
     	<input type="text" name="uname" placeholder="Username"><br>

     	<input type="password" name="password" placeholder="Password"><br>
            
        <input type="submit" value="Login">
<a href="logout.php" class="ca"></a><br/><br>
			<a href="changpass.php" class="ca">Forgot Password</a>&nbsp&nbsp&nbsp&nbsp&nbsp
			<a href="signup.php" class="ca">Create Account</a><br><br>
     	    
          
     </form>
</body>
</html>