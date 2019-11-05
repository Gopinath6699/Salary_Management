<?php
session_start();
if(isset($_SESSION["login"]))
	header('location:Admin_home_page.php');

$conn = mysqli_connect('localhost','root','','salary_management');

/*if($conn){
	echo "Connection Successful";
}else{
	echo "Connection Failed";
}*/

$db = mysqli_select_db($conn, 'salary_management');
$flag =0;
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$query = "select * from admin_login where username = '$username' and password = '$password'";

	$result = mysqli_query($conn,$query);

	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		if($row['password'] == $password){
				$_SESSION["login"] = true;
				echo "Login Successful !"; 
				header('location:Admin_home_page.php');
		}else{
			echo "Warning: Password Incorrect !";
			header('location:Admin_login.php');
		}
	}else{
		$flag=1;
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=ABeeZee&display=swap" rel="stylesheet">
	<title>Admin Login</title>
	<style>
		body:before{
			content:'';
			z-index:-1;
			width:100%;
			height:100%;
			position:absolute;
			top:0px;
			left:0px;
			background-image: url(bg.png);
			background-repeat: no-repeat;
			background-size: 100% 107vh; 
			filter: blur(4px);
 			-webkit-filter: blur(4px);
		}
		.card{
			position: relative;
			text-align: left;
			width: 400px;
			top: 100px;
			margin: auto;
			padding: 40px;
			box-shadow: 1px 2px 4px rgba(0, 0, 0, .4);
			
		}

		.btn-lg{
			font-family: 'ABeeZee', sans-serif;
			width:160px;
    		padding:5px;
		}
		
		.card-title{
			font-family: 'ABeeZee', sans-serif;
			text-align: center;
		}

		.form-group{
			font-family: 'ABeeZee', sans-serif;
		}
	</style>
</head>

<body>
<form action="" method="POST">
		<div class="card">
        	<div class="card-body ">
			<h3 class="card-title">ADMIN LOGIN</h3>
			<hr>
				<?php
				if($flag==1)
				echo "<p class='alert alert-danger'>Warning: Username or Password Incorrect !</p>";
				?>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" class="form-control form-control-sm" placeholder="Enter username" required><br>
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control form-control-sm" placeholder="Enter password" required><br>
				</div>

				<div class="text-center">
					<input  type="submit" value="Login" class="btn btn-outline-success btn-lg" name="login"><br>
				</div>
        	</div>
		</div>
</form>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>