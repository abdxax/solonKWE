<?php
require "../../db.php";
if (isset($_POST['sub'])) {
 
  $name=$_POST['sname'];
 $price=$_POST['price'];
  $role=$_POST['role'];
  
     echo "string";
   $sql="INSERT INTO `service` (`id_depart`, `serv|_name`, `id_pachage`, `price`) VALUES ( '$role', '$name', '0', '$price') ";
   if (mysqli_query($conn,$sql)) {
    
   }
   else{
    echo "s";
   }
  
}
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
     <script src="../js/bootstrap.js"></script>
</head>
<body>
<div class="bg-img">
<div class="text-block3">
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="../logo.png" width="150px" height="80px"></a>
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
  <div class="">
    <div class="row">
      <div class="col-3">
    <aside>
      <ul>
        <li><a href="user.php">User</a></li>
         <li><a href="department.php">Department</a></li>
          <li><a href="service.php">Service </a></li>
           
      </ul>
    </aside>
  </div>
  <div class="col-9">
    <div class="col-12">
      <div class="text-center">
        <a href="#" class="btn btn-info " data-toggle="modal" data-target="#exampleModal" data-whatever="@fat"> Add new Service  </a>
      </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>Service Name</th>
          <th> Department</th>
          <th>Price </th>
        </tr>
      </thead>
       <tbody>
        <?php
            $sql_dep="SELECT * FROM service LEFT JOIN department ON service.id_depart=department.depart_id";
                $res=mysqli_query($conn,$sql_dep);
                while ($row=mysqli_fetch_array($res)) {
                  echo '
                       <tr>
                       <td>'.$row['serv|_name'].'</td>
                          <td>'.$row['depart_name'].'</td>
                             <td>'.$row['price'].'</td>
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
</div>
</div>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Service Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="sname">
          </div>

            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Service price:</label>
            <input type="text" class="form-control" id="recipient-name" name="price">
          </div>

          
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">اDepartment</label>
            <select name="role">
              <?php
                $sql_dep="SELECT * FROM department";
                $res=mysqli_query($conn,$sql_dep);
                while ($row=mysqli_fetch_array($res)) {
                  echo '
                       <option value='.$row['depart_id'].'>'.$row['depart_name'].'</option>
                     
                  ';
                }
              ?>
             
             
            </select>
          </div>

           

        
      </div>
      <div class="modal-footer">
        <input type="submit" name="sub" class="btn btn-info" value="حفظ">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>