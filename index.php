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
     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/1600x550/?coding,python" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1600x550/?programmer,microsoft" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1600x550/?coding,google" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
 <div class="container">
      <div class="row">
      

     <?php
       include 'dir/dbconnection.php';
       $sql = "select * from category";
       $res = mysqli_query($result,$sql);
       while($row = mysqli_fetch_assoc($res))
       {
         echo '<div class=" col-md-4 my-4">
         <div class="card" style="width: 18rem;">
        <img src="https://source.unsplash.com/400x400/?coding,marvel" class="card-img-top" alt="...">
          <div class="card-body">
       <h5 class="card-title">' . $row['category_name'] . '</h5>
       <p class="card-text">' . substr($row['category_desc'],0,50) . '...</p>
       <a href="threadlist.php?id='.$row['category_id'].'" class="btn btn-primary">Open Threads</a>
     </div>
   </div>
         </div>';
       }
      ?>
      <!-- <div class=" col-md-4 my-4">
      <div class="card" style="width: 18rem;">
     <img src="https://source.unsplash.com/400x400/?coding,marvel" class="card-img-top" alt="...">
       <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
      </div>




      <div class=" col-md-4 my-4">
      <div class="card" style="width: 18rem;">
     <img src="https://source.unsplash.com/400x400/?coding,marvel" class="card-img-top" alt="...">
       <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
      </div>




      <div class=" col-md-4 my-4">
      <div class="card" style="width: 18rem;">
     <img src="https://source.unsplash.com/400x400/?coding,marvel" class="card-img-top" alt="...">
       <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
      </div>



      <div class=" col-md-4 my-4">
      <div class="card" style="width: 18rem;">
     <img src="https://source.unsplash.com/400x400/?coding,marvel" class="card-img-top" alt="...">
       <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
      </div> -->

s


      </div>
 </div>
     <?php
     include 'dir/_footer.php'?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>