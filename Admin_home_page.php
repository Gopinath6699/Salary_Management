<?php 
session_start();
if(!isset($_SESSION["login"]))
	header('location:Admin_login.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Home Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=ABeeZee&display=swap" rel="stylesheet">
	<style>
		body:before{
			content:'';
			z-index:-1;
			width:100%;
			height:100%;
			position:absolute;
			top:0px;
			left:0px;
			background-image: url(bg2.jpeg);
			background-repeat: no-repeat;
			background-size: 100% 107vh; 
			filter: blur(4px);
 			-webkit-filter: blur(4px);
		}
		.card{
			font-family: 'ABeeZee', sans-serif;
			position: relative;
			text-align: center;
			width: 400px;
			top: 70px;
			margin: auto;
			padding: 40px;
			box-shadow: 1px 2px 4px rgba(0, 0, 0, .4);
		}

		.btn-lg{
			width:200px;
    		padding:5px;
		}

	</style>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-2">
	<div class="container">
          	<a class="navbar-brand"  href="#">SALARY MANAGEMENT</a>
              	<ul class="navbar-nav">
                  	<li class="nav-item">
                     	 <a class="nav-link " href="Admin_home_page.php"><i class="fa fa-home" style="font-size:20px" aria-hidden="true"></i> HOME </a>
                  	</li>
                  	<li class="nav-item">
                      	<a class="nav-link" href="Admin_logout.php"><i class="fa fa-sign-out" style="font-size:20px" aria-hidden="true"></i> LOGOUT</a>
                  	</li>
            	</ul>
		</div>
</nav>

<div class="card">
    <div class="card-body">
		<h4 class="card-title"></h4>
		<h3 class="card-title">MENU</h3>
        <hr><br>
		<form action="Employee_details.php" method="POST">
			<button type="submit" class="btn btn-outline-dark btn-lg mb-3" name="Employee-details">Employee Details</button><br>
		</form>
		
		<form action="Salary_details.php" method="POST">
			<button type="submit" class="btn btn-outline-dark btn-lg mb-3" name="Salary-details">Salary Details</button><br>
		</form>
		
		<form action="Salary_inhand.php" method="POST">
			<button type="submit" class="btn btn-outline-dark btn-lg mb-3" name="Salary-inhand-details">Salary in hand</button><br>
		</form>

		<form action="Salary_increment.php" method="POST">
			<button type="submit" class="btn btn-outline-dark btn-lg mb-3"  name="Salary-increment">Salary Increment</button><br>
		</form>
		
		<form action="Salary_deduction.php" method="POST">
			<button type="submit" class="btn btn-outline-dark btn-lg mb-3" name="Salary-deduction">Salary Deduction</button><br>
		</form>
		
	</div>
</div>

	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>
