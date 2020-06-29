<?php include 'dir/dbconnection.php' ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
       .white{
        margin: 8px 14px
       }
       #fin{
         position: sticky;
         top: 0px;
       }
    </style>
  </head>
  <body>
  <?php
     include 'dir/_navbar.php'?>
     <?php
       include 'dir/dbconnection.php'; 
       $id = $_GET['threadid'];
       $sql = 'select * from threads where thread_id ="'.$id.'"';
       $res = mysqli_query($result,$sql);
       while($row = mysqli_fetch_assoc($res))
       {
           $name = $row['thread_title'];
           $desc = $row['thread_desc'];
           $user = $row['thread_user_id'];
           $sql3 = 'select * from users where user_id ="'.$user.'"';
           $res3 = mysqli_query($result,$sql3);
           $row3 = mysqli_fetch_assoc($res3);
           $username = $row3['user_name'];

       }?>

      <?php
       $method = $_SERVER['REQUEST_METHOD'];
       if($method == 'POST')
       {
         $desc1 = $_POST['desc'];
         $desc1 = str_replace("<","&lt;",$desc1);
         $desc1 = str_replace(">","&gt;",$desc1);
         if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true )
           { $email2 = $_SESSION['useremail'];
             $sql3 = "select * from `users` where `user_mail` ='$email2'" ;
             $res3 = mysqli_query($result,$sql3);
             $row3 = mysqli_fetch_assoc($res3);
             $user = $row3['user_id'];
            $sql = "INSERT INTO `comment` (`comment_content`, `thread_id`,`comment_user_id`, `comment_date`) VALUES ( '$desc1', '$id','$user', current_timestamp());";
            $res = mysqli_query($result,$sql);
          }

        }

         
         ?>


     <div class="container my-4">
        <div class="jumbotron">
        <h1 class="display-4"><?php echo $name; ?></h1>
        <p class="lead"><?php echo $desc; ?></p>
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p><b>Posted By : <?php echo $username; ?> </b> </p>
        </div>
        <div class="container">


        <?php

        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true ){

          echo '
          <h1>Post a Comment</h1>
          <form action=';?><?php echo $_SERVER['REQUEST_URI']?> <?php echo 'method="post">
              <div class="form-group">
              <label for="desc">Your Answer:</label>
                  <textarea type="text" class="form-control" id="desc" name="desc" rows="3"></textarea>
                  
              </div>
              <button type="submit" class="btn btn-primary btn-success">Post Your Comment</button>';
        }
        else
        {
          echo '<h3> You have to logged in to give a comment</h3>';
        } ?>

    
           

      
      </form>
      </div>



          <h1 class="my-4">Comments</h1>

          <?php
       $id = $_GET['threadid'];
       $sql = 'select * from comment where thread_id ="'.$id.'"';
       $res = mysqli_query($result,$sql);
       while($row = mysqli_fetch_assoc($res))
       {
           
           $sql2 = 'select * from users where user_id ="'.$row['comment_user_id'].'"';
           $res2 = mysqli_query($result,$sql2);
           $row2 =mysqli_fetch_assoc($res2);
           $descr = $row['comment_content'];
           $title= $row2['user_name'];
           echo '<div class="media my-4">
           <img src="img/user.jpg" width="54px" class="mr-3" alt="...">
           <div class="media-body">
             <h5 class="mt-1">'. $title.' </h5>
             '.$descr.'
             </div>
         </div>';
       }?> 
        <!-- <div class="media my-4">
  <img src="img/user.jpg" width="54px" class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-1">Media heading</h5>
    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
  </div>
</div>


<div class="media my-4">
  <img src="img/user.jpg" width="54px" class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-1">Media heading</h5>
    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
  </div>
</div>


<div class="media my-4">
  <img src="img/user.jpg" width="54px" class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-1">Media heading</h5>
    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
  </div>
</div> -->
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>