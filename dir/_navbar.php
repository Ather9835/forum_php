<?php
include 'dir/dbconnection.php';
session_start();
 ?>

<?php

echo '<nav id="fin" class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="index.php">iDiscuss</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">'; 

        $sql = "select * from category";
        $res = mysqli_query($result,$sql);
        while($row = mysqli_fetch_assoc($res))
        {
          echo ' <a class="dropdown-item" href="threadlist.php?id='.$row['category_id'].'">'. $row['category_name'] .'</a>';
        }
        

      echo '
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact.php" tabindex="-1" >Contact</a>
    </li>
  </ul>';
    
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true )
  {

    echo'
  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    <p class="white" style="color: white "> Welcome '. $_SESSION['username'].'</p>
    <a role="button" href="/forum/user.php" class="btn btn-success my-2 my-sm-0 ml-2" >Profile</a>
  </form>
  </div>
</nav>';

  }
  else{

    echo'
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <button class="btn btn-success my-2 my-sm-0 ml-2"  data-toggle="modal" data-target="#loginModal">Login</button>
  <button class="btn btn-success my-2 my-sm-0 ml-2" data-toggle="modal" data-target="#signupModal">SignUp</button>
</div>
</nav>';

  }

include 'dir/loginmodal.php';
include 'dir/signupmodel.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'true')
{

 echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success</strong> You can login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

}
?>

