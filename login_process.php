<?php
    
    session_start();
    $errors = [];
    //check email
    
    if(isset($_POST['email'])){
        if(!empty($_POST['email'])){
            
        }
    }else{
        $errors [] = " email is required";
    }
    
    
    // end of check email
    
    
    if (count($errors) == 0){
        $con = mysqli_connect('localhost','root','','elbatal');
        if(mysqli_connect_error($con)){
            echo mysqli_connect_error ($con);
        }
        
        $sql = "SELECT * FROM users WHERE email = '{$_POST['email']}' LIMIT 1" ;
        $result = mysqli_query($con,$sql);
        
        $user = mysqli_fetch_assoc($result);
        
        if ($user){
            if($user['password'] == $_POST['password']){
                $_SESSION['success'] = "you are logged in ";
                $_SESSION['user'] = $user ;
                header("location: home.php");
                
            }else{
                $_SESSION['error'] = "wrong password";
                header("location: login.php");
            }
            

        }else{
            $_SESSION['error'] = "email is not valid";
            header("location: login.php");
        }
        
    }else{
        $_SESSION['errors'] = $errors;
        header('location: login.php');
        
    }


?>

