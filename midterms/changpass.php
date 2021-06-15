<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<style>
		body{
			margin: 0;
			padding: 0;
			background-color:orange;
			background-size: auto;
			background-position: center;
			font-family: 'Poppins', sans-serif;
		}
		.boxer{
			width: 400px;
			height: 450px;
			background-color:coral;
			color:black;
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
			color: black;
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
		.rene{
			color:black;
		}
</style>
</head>
<body>
	<div class="boxer">
     <form action="foxcheck.php" method="post">
     	<center><p><h2>FORGOT PASSWORD</h2></p></center>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>


          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="username" 
                      placeholder="Username"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Username"><br>
          <?php }?>


     	
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

        
          <input type="password" 
                 name="re_password" 
                 placeholder=" Confirm Password"><br>
<a href="index.php" class="ca">Already have an account?</a><br><br>

     	<input type="submit" value="Update Password">
	
          
     </form>
</body>
</html>