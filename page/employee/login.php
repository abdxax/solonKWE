<?php
session_start();
require "../db.php";
if (isset($_POST['subm'])) {
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$sql="SELECT * FROM user LEFT JOIN info ON user.username=info.user WHERE user.username='$email' AND password='$pass'";
	$res=mysqli_query($conn,$sql);
	if (mysqli_num_rows($res)==1) {
		while ($row=mysqli_fetch_array($res)) {
			# code...
			if ($row['role']==1) {
				# code...
				$_SESSION['email']=$email;
				header("location:admin/index.php");
			}
			else if($row['role']==2){
				$_SESSION['email']=$email;
				$_SESSION['id_dep']=$row['id_dep'];
				header("location:employee/index.php");
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>
<body>
<div class="bg-img">
<header>
<div class="container">
	<div class="row">
		<div class="col-12">
			
		</div>
			<div class="col-12 ">
		      <img src="logo.png" class="logo-login">
	        </div>

	        <div class="col-6 offset-3">
	        	<div class="card border-light mb-3 cardx">
	        		<div class="card-header">
	        			<h3 class="text-center">
	        				Login
	        			</h3>
	        		</div>
	        		<div class="card-body">
	        			<form method="POST">
	        				<div class="form-group">
	        					<input type="text" name="email" class="form-control" placeholder="Email">
	        				</div>
	        				<div class="form-group">
	        					<input type="password" name="pass" class="form-control" placeholder="Password">
	        				</div>
	        				<div class="form-group">
	        					<input type="submit" name="subm" class="btn btn-primary btns" value="Login">
	        				</div>
	        			</form>
	        		</div>
	        	</div>
	        </div>


	</div>
</div>
</header>
</div>


<script src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>