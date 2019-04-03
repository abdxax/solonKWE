<?php
session_start();
require "../../db.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="../logo.png" width="75px" height="70px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Account</a>
      </li>
      
    </ul>
   
  </div>
</nav>
</header>
<section>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h4 class="text-center">Title</h4>
			</div>
			<div class="col-10">
				<table class="table">
					<tr>
						<th>Name</th>
						<th>Date</th>
						<th>Time</th>
						<th>Serviec </th>
					</tr>
					 <tbody>
        <?php
        $se=$_SESSION['id_dep'];
            $sql_dep="SELECT * FROM booking LEFT JOIN service ON booking.id_serv=service.id_servi Where service.id_depart='$se' ";
                $res=mysqli_query($conn,$sql_dep);
                while ($row=mysqli_fetch_array($res)) {
                  echo '
                       <tr>
                       <td>'.$row['serv|_name'].'</td>
                          <td>'.$row['da'].'</td>
                             <td>'.$row['tim'].'</td>
                             <td>'.$row['serv|_name'].'</td>
                       </tr>
                     
                  ';
                }
        ?>
      </tbody>
				</table>
			</div>
		</div>
	</div>
</section>
</body>
</html>