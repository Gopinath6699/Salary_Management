<!DOCTYPE html>
<html>
<head>
	<title>Salary Increment</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=ABeeZee&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
			position: relative;
			text-align: left;
			width: 1200px;
			top: 120px;
			margin: auto;
			padding: 40px;
			box-shadow: 1px 2px 4px rgba(0, 0, 0, .4);
		}

		.btn-lg{
			font-family: 'ABeeZee', sans-serif;
			width:100px;
    		padding:5px;
		}
		
		.card-title{
			font-family: 'ABeeZee', sans-serif;
			text-align: center;
		}

		form{
			font-family: 'ABeeZee', sans-serif;
		}
		.table{
			text-align: center;
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

    <form class="form-inline" action="" method="POST">
        <div class="card">
        	<div class="card-body ">
			    <h3 class="card-title">SALARY INCREMENT</h3>
                <hr><br>
                    <div class="text-center col-xs-4">
                        <input type="text" name="employee_id" class="form-control mr-4" placeholder="Enter Employee id" required> 
						<input type="text" name="increment_percent" class="form-control mr-4" placeholder="Enter increment %" required>
						<button  type="submit" class="btn btn-outline-success btn-lg" name="go">Go</button><br><br>
						<p class="text-muted">NOTE: SALARY WILL BE INCREMENT EVERY TWO YEARS ONLY.</p>

						
                    </div>
                    
                    
                            <?php
                                session_start();
                                if(!isset($_SESSION["login"]))
                                header('location:Admin_login.php');     
                                
                                $conn = mysqli_connect('localhost','root','','salary_management');

                                $db = mysqli_select_db($conn, 'salary_management');


                                if(isset($_POST['go'])){
									$employee_id = $_POST['employee_id'];
									$increment_percent = $_POST['increment_percent'];

                                        $query = "SELECT * FROM employee JOIN salary,deduction where employee.id = '$employee_id' AND employee.id = salary.id AND employee.id = deduction.id";

                                        $result = mysqli_query($conn,$query);
                                        echo mysqli_error($conn);
                                        if (mysqli_query($conn,$query)){
                                            if($result->num_rows > 0){
                                            
                                                while($row = $result->fetch_assoc()){
                                                   ?>
                                                    <table class="table">
                                                    <thead class="thead-inverse">
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>NAME</th>
																<th>EXPERIENCE</th>
                                                                <th>CURRENT SALARY</th>
                                                                <th>SALARY AFTER INCREMENTED</th>
                                                                <th>INCREMENTED AMOUNT</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody>
												   <?php 
                                                    $id = $row['id'];
                                                    $name = $row['name'];
                                                    $current_ctc = $row['ctc'];
													$experience = $row['experience']+1;
													$future_ctc = $row['ctc'];
													$salary_increment = 0;

													if($experience%2==0){
														$future_ctc = $increment_percent * (1/100) * $current_ctc + $current_ctc;
														$salary_increment = $future_ctc - $current_ctc;
													}else{
														$future_ctc = $current_ctc;
													}

                                                    echo '<tr><td>'.$id.'</td>'.'<td>'.$name.'</td>'.'<td>'.$experience." Years".'</td>'.'<td>'.$current_ctc.'</td>'.
                                                        '<td>'.$future_ctc.'</<td>'.'<td>'.$salary_increment.'</td></<tr>';
                                                }
                                            }else{	
                                                    echo "No Data Found.";
                                                }
                                        }mysqli_close($conn);
                                        die();	
                                    }
                                $conn->close();
                                ?>
                        </tbody>
                     </table>
                </div>
            </div>
        </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>
