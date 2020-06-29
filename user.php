<!DOCTYPE html>
<?php
 include 'dir/dbconnection.php';
 session_start();
 if(isset($_SESSION['username'])){
     $name = $_SESSION['username'];
     $comment = $_SESSION['comment'];
     $discussion = $_SESSION['discussion'];
     $email = $_SESSION['useremail'];
     $image = $_SESSION['photo'];
 }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <title>Document</title>
</head>
<body>
     <div class="container1">
       <div class="box first" id="first">
           <div class="header">
               <div class="imag">
               <img src="<?php echo $image; ?>"></div>
               <p class="center large"> <?php echo $name; ?> </p>
            </div>
            <hr>
            <ul>
                <li class="item" id="item-1"><a href="/forum/index.php"><i class="fas fa-home mx-3"></i>Home</a></li>
                <li class="item " id="item-2"><i class="fas fa-address-book mx-3"></i>About</li>
                <li class="item " id="item-3"><i class="fas fa-user-circle mx-3"></i>Profile</li>
                <li class="item " id="item-4"><i class="fas fa-cog mx-3"></i>Settings</li>
                <li class="item " id="item-4"><a href="/forum/dir/_logout.php"><i class="fas fa-user-circle mx-3"></i>Log Out</a></li>
            </ul>
       </div>
       <div class="box second" id="second">
           <div class="navi">
               <div class="burger" id="no">
                   <ul>
                       <li class="line"></li>
                       <li class="line"></li>
                       <li class="line"></li>
                   </ul>
               </div>

               <div id="set">
               </div>

           </div>
           <section class="para">
               <h3 class="center">Your Data</h3>
           <table class="table">
            <thead class="thead-dark">
                <tr>
                
                <th scope="col" class="center">No of Discussions</th>
                <th scope="col" class="center">No of Comments</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row"class="center"><?php echo $discussion; ?></th>
                <td class="center"><?php echo $comment; ?></td>
                </tr>
            </tbody>
            </table>
            <hr>

            <h3 class="center">Your Comments</h3>
            <div class="comment">
                <?php
                   
                   $sql = "select * from `users` where `user_mail` ='$email'" ;
                   $res = mysqli_query($result,$sql);
                   $row = mysqli_fetch_assoc($res);
                   $id = $row['user_id'];
                   $sql1 = "select * from `comment` where `comment_user_id` ='$id'" ;
                   $res2 = mysqli_query($result,$sql1);
                   while($row1 = mysqli_fetch_assoc($res2))
                   {
                       $desc = $row1['comment_content'];
                       echo '<p>'.$desc.'</p><br><br>';
                   }

                ?>
            </div>

            <hr>

            <h3 class="center">Your Discussion</h3>
            <div class="discuss">
            <?php
                   
                   $id = $row['user_id'];
                   $sql1 = "select * from `threads` where `thread_user_id` ='$id'" ;
                   $res2 = mysqli_query($result,$sql1);
                   while($row1 = mysqli_fetch_assoc($res2))
                   {
                       $desc = $row1['thread_desc'];
                       echo '<p>'.$desc.'</p><br><br>';
                   }

                ?>
            </div>

            
           </section>
        </div>

     </div>


     <script>

         var element = document.getElementById('no');
         var click = 0;
         element.addEventListener('click',()=>{
             console.log('clicked');
             element2 = document.getElementById('second');
             element3 = document.getElementById('first');
             element4 = document.getElementById('set');
             element2.classList.toggle('allWidth');
             element3.classList.toggle('noWidth');
             if(click==0)
             {
                element4.innerHTML = '<a class="btn btn-outline-danger my-2 my-sm-0" href="/forum/dir/_logout.php" role="button">Log Out</a>';
                click=1;  
             }
             else
             {
                element4.innerHTML = '';
                click=0;
             }
             
         })
     </script> 
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
    
</body>
</html>