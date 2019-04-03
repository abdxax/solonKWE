<?php
require "../../db.php";
if (isset($_POST['sub'])) {
 
  $name=$_POST['name'];
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $pass2=$_POST['password2'];
  $role=$_POST['role'];
  $phone=$_POST['phone'];
  if ($pass==$pass2) {
    // echo "string";
     $sql_ins="INSERT INTO `user` (`username`, `password`, `role`) VALUES ('$email', '$pass', '2')";
   if (mysqli_query($conn,$sql_ins)) {
     $sql_info="INSERT INTO `info` (`user`, `name`, `phone`, `id_dep`) VALUES ('$email', '$name', '$phone', '$role')";
     if (mysqli_query($conn,$sql_info)) {
       # code...
     }
   }
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
        <a href="#" class="btn btn-info " data-toggle="modal" data-target="#exampleModal" data-whatever="@fat"> Add new User </a>
      </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email </th>
          <th>Phone </th>
          <th>Department </th>
        </tr>
      </thead>
      <tbody>
       <?php
   $sql_dep="SELECT * FROM info LEFT JOIN department ON info.id_dep=department.depart_id";
                $res=mysqli_query($conn,$sql_dep);
                while ($row=mysqli_fetch_array($res)) {
                  echo '
                       <tr>
                          <td>'.$row['name'].'</td>
                           <td>'.$row['user'].'</td>
                            <td>'.$row['phone'].'</td>
                             <td>'.$row['depart_name'].'</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="name">
          </div>

           <div class="form-group">
            <label for="recipient-name" class="col-form-label">اEmail:</label>
            <input type="email" class="form-control" id="recipient-name" name="email">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" id="recipient-name" name="phone">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label"> Password</label>
            <input type="password" class="form-control" id="recipient-name" name="password">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Conf-Password</label>
            <input type="password" class="form-control" id="recipient-name" name="password2">
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