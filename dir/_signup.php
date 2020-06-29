<?php
 
  include 'dbconnection.php';
  if($_SERVER['REQUEST_METHOD']=='POST')
  {   
      $name = $_POST['name'];
      $email = $_POST['email'];
      $pass = $_POST['Password'];
      $cpass = $_POST['CPassword'];

      echo $email;
      echo $pass;
      echo $cpass;

      $sql = "select * from `users` where `user_mail` ='$email'" ;
      $res = mysqli_query($result,$sql) or die("Error");
      if(mysqli_num_rows($res)){

         $aler = "Email_ Exist";
         header('Location: /forum/index.php?signupsuccess=false&error='.$aler.'');

      }
      else{

        if($pass == $cpass)
        {   

            $hash = password_hash($pass,PASSWORD_DEFAULT);
            $sql2= "INSERT INTO `users` (`user_name`,`user_mail`, `user_pass`, `timestamp`) VALUES ('$name','$email', '$hash', current_timestamp());";
            $res2 = mysqli_query($result,$sql2);
            if($res2){
                $showAlert = true;
                header('Location: /forum/index.php?signupsuccess=true');
            }
        }
        else{
            $alert = "Password is not matching";
            header('Location: /forum/index.php?signupsuccess=false&error='.$alert.'');
        }
      }
  }

?>