<?php
require "db.php";
?>
<!DOCTYPE html>
<html>
<head>

   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../css/css.css">
   
<style>

body {font-family: "Lato", sans-serif;}
.bg-img {
  /* The image used */
  background-image: url("../pic/file.gif");

  min-height: 550px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
/* Style the tab */
.tab {
  float: left;
 /* border: 1px solid #ccc; */
  background-color: #ffffff;
  width: 15%;
  height: 300px;
  padding : 20px;
  margin-left: 100px;
  margin-top: 60px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: #ffffff;
  color: black;
  padding: 22px 16px;
  width: 100%;
 border: none;
  outline: none;
  text-align: center;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  /*border: 1px solid #ccc;*/
  width: 70%;
  border-left: none;
  height: 300px;
}
/* Create four equal columns that floats next to each other */
.column {
  float: left;
  width: 25%;
  padding: 15px;
  height: 300px; /* Should be removed. Only for demonstration */
  margin-top : 60px ;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: inline;
  clear: both;
  overflow: hidden;
}
</style>
</head>
<body>
<div class="header">

<a href="#default" class="logo"><img src="../pic/logo.png"></a>
 
  <div class="header-right">
    <a class="active" href="test1.html">HOME</a>
    <a href="book.html">BOOK</a>
    <a href="About.html">About Us</a>
  </div>
  
</div>

<div class="bg-img">
<br>
<div class="tab">
  <?php
   $sql="SELECT * FROM department";
   $res=mysqli_query($conn,$sql);
   $ids;
   while ($row=mysqli_fetch_array($res)) {
    $ids=$row['depart_id'];
     echo ' <button class="tablinks" onclick="openCity(event, '.$row['depart_id'].')" id="defaultOpen">'.$row['depart_name'].'</button>';
   }

  ?>
 <!-- <button class="tablinks" onclick="openCity(event, 'NAILS')" id="defaultOpen">NAILS</button>
  <button class="tablinks" onclick="openCity(event, 'HAIR')">HAIR</button>
  <button class="tablinks" onclick="openCity(event, 'FACIAL')" id="defaultOpen">FACIAL</button>-->
</div>
<?php
echo '
<div id='.$ids.' class="tabcontent">
<div class="row">';
$sql2="SELECT * FROM service where id_depart='$ids' ";
$resu=mysqli_query($conn,$sql2);
while ($rows=mysqli_fetch_array($resu)) {
  echo '
     <div class="column" style="background-color:#ffffff;">
    <h2>'.$rows['serv|_name'].'</h2>
    <p>1 hr | $30.00</p>
    <a href="confirm.php?id='.$rows['id_servi'].'" >Book Now ></a>
  </div>
  ';
}

  echo '

</div>

</div>
';
?>
<!--<div id="NAILS" class="tabcontent">
<div class="row">

  <div class="column" style="background-color:#ffffff;">
    <h2>Pedicure</h2>
    <p>1 hr | $30.00</p>
    <a href="confirm.html" >Book Now ></a>
  </div>
  
  <div class="column" style="background-color:#ffffff;">
    <h2>Gel Manicure</h2>
    <p>45 min | $45.00</p>
    <a href="confirm.html" >Book Now ></a>
  </div>
  
  <div class="column" style="background-color:#ffffff;">
    <h2>Mani-Pedi</h2>
    <p>45 min | $30.00</p>
    <a href="confirm.html" >Book Now ></a>
  </div>
  
  <div class="column" style="background-color:#ffffff;">
    <h2>Full Mani-Pedi</h2>
    <p>1 hr 30 min | $60.00</p>
    <a href="confirm.html" >Book Now ></a>
  </div>

</div>

</div>

<div id="HAIR" class="tabcontent">

<div class="row">

  <div class="column" style="background-color:#ffffff;">
    <h2>Haircut</h2>
    <p>1 hr 30 min | $60.00</p>
    <a href="confirm.html" >Book Now ></a>
  </div>
  
  <div class="column" style="background-color:#ffffff;">
    <h2>Highlights</h2>
    <p>2 hr 30 min | $50.00</p>
    <a href="confirm.html" >Book Now ></a>
  </div>
  
  <div class="column" style="background-color:#ffffff;">
    <h2>Hair Styling</h2>
    <p>1 hr 30 min | $50.00</p>
    <a href="confirm.html" >Book Now ></a>
  </div>

</div>  
</div>

<div id="FACIAL" class="tabcontent">
<div class="row">

  <div class="column" style="background-color:#ffffff;">
    <h2>Anti-Ageing Facial</h2>
    <p>1 hr 30 min | $30.00</p>
    <a href="confirm.html" >Book Now ></a>
  </div>
  
  <div class="column" style="background-color:#ffffff;">
    <h2>Oxygen Facial</h2>
    <p>1 hr 30 min | $50.00</p>
    <a href="confirm.html" >Book Now ></a>
  </div>
  
  <div class="column" style="background-color:#ffffff;">
    <h2>Deep Cleansing Facial</h2>
    <p>1 hr 30 min | $50.00</p><br>
    <a href="confirm.html" >Book Now ></a>
  </div>
  


</div>

</div>-->


<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

   </div>
   
<div class="footer">
                        <div>
                            <span>Copyright &copy; 2019 Albandari </span>
                            <ul>
                                <li><img src="../pic/online_social_media_facebook-128.png" alt="facebook logo"></li>
                                <li><img src="../pic/online_social_media_tumblr-128.png" alt="tumblr logo"></li>
                                <li><img src="../pic/snap.png" alt="snap logo"></li>
                                <li><img src="../pic/twitter_online_social_media-128.png" alt="twitter logo"></li>
                            </ul>
                        </div>
                    </div>
</body>
</html> 
