<?php
    require 'funct.php';
    require 'conn.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    


    if(isset($_POST['register']))
    { 

      if ($password == $cpassword)
    {
       $register = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `users` WHERE `email`='$email'"));
        if($register == 0)
        {
            $insert = mysqli_query($con,"INSERT INTO `users` (`email`,`password`,`photo`,`fullname`) VALUES ('$email','$password','','')");
            if($insert)
                redirectFunct();
            else
                header("location: signup.php?action=tryAgain");
        }
        else if($register != 0)
            header("location: signup.php?action=userExist");  
    }
    else
    {
        redirectFunctPwdSame();
    }

    }
    else if(isset($_POST['login']))
    {
        $login = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'"));
        if($login != 0)
       {
        session_start();
        $user = mysqli_query($con , "SELECT * FROM `users` WHERE email = '$email'");
        $userData = mysqli_fetch_array($user);

         $_SESSION['email'] = $userData['email'];
         $_SESSION['password'] = $userData['password'];

        goToDashboard();

        echo $_SESSION['email'];
        echo $_SESSION['password'];
       }
        else
        {
           redirectFunctNotRegistered();
        }
    }

    
    mysqli_close($con);
?>