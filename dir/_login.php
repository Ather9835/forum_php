<?php
 
 include 'dbconnection.php';
 if($_SERVER['REQUEST_METHOD']=='POST')
 {
     $email = $_POST['email'];
     $pass = $_POST['password'];
     $sql = "select * from `users` where `user_mail` ='$email'" ;
     $res = mysqli_query($result,$sql);
     $num = mysqli_num_rows($res);
     if($num == 1)
     {
         $row = mysqli_fetch_assoc($res);
         if(password_verify($pass, $row['user_pass']))
         {
             echo 'You are logged in';
             session_start();
             $_SESSION['loggedin'] = true;
             $_SESSION['useremail'] = $email;
             $_SESSION['username'] = $row['user_name'];
             $_SESSION['comment'] = $row['no_comments'];
             $_SESSION['discussion'] = $row['no_discussion'];
             $_SESSION['photo'] = $row['photo'];
             header('Location: /forum/index.php?logsuccess=true');

         }
         else{

            header('Location: /forum/index.php?logsuccess=false');
         }
     }
}

?>