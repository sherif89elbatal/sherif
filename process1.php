<?php
$errors = [];

    // check first name 
if(isset($_GET['first_name'])){
    if(empty($_GET["first_name"])){
        $errors[] = "first name is empty you have to fill it ";
    }else{
        if(is_string($_GET["first_name"])){
            if(strlen($_GET["first_name"]) < 3){
                $errors[] = "sorry first name shoud not be less than 3 characters";
            }
        }else{
            $errors[] = "first name is not a string";
        }
    }
    
}else {
    $errors[] = "Sorry first name is not exist";
}
    // End of check first name 

    // check last name 
if(isset($_GET['last_name'])){
    if(empty($_GET["last_name"])){
        $errors[] = "last name is empty you have to fill it ";
    }else{
        if(is_string($_GET["last_name"])){
            if(strlen($_GET["last_name"]) < 3){
                $errors[] = "sorry last name shoud not be less than 3 characters";
            }
        }else{
            $errors[] = "last name is not a string";
        }
    }
    
}else {
    $errors[] = "Sorry last name is not exist";
}
    // End of check last name
    
    // check  email

if(isset($_GET["email"])){
    if(strlen($_GET["email"])<5){
        $errors[] = "sorry email must be more than 5 characters";
    }
}else{
    $errors[] = " Error you have to enter your e-mail (required)";
}
 
    // End of check E-mail
    
    // check password
    
if(isset($_GET["password"])){
        if(empty($_GET["password"])){
            $errors [] = "you have to enter your password";
        }
 }else{
    $errors[] = " the password field  is not exist";
}
    // End of check password
    
    // check  role
if(isset($_GET["role"])){
    if(empty($_GET["role"])){
        $errors [] = " you have to enter your role";
    }
  if(is_string($_GET["role"])){
    
  }else{
    $errors[] = "the field of role  is not string "; 
  }
}else{
    $errors[] ="sorry you have to fill the field of role";
}
  //End check of role
 
  // check phone
  
if(isset($_GET["phone"])){
    if(strlen($_GET["phone"]) < 11 ){
        $errors[] = " Error your phone num should be more than 10 numbers";
    }
}else{
    $errors[] = "you have to enter your phone number";
}
    // End of check number
    
    // check country
if (isset($_GET["country"])){
    if(is_string($_GET["country"])){
        
    }else{
        $errors [] = " write a string only";
    }
}else{
    $errors[] = "Error you have to enter your country";
}

    // End country
    // check Gender
if (isset($_GET["gender"])){
    if(is_string($_GET["gender"])){
        
    }else{
        $errors [] = " write a string only";
    }
}else{
    $errors[] = "Error you have to enter your gender";
}
    // end check of Gender
    
    // insert into data base 

        
if(count($errors) == 0){
   $con = mysqli_connect('localhost','root','','elbatal');
   
   $check = mysqli_query($con, "SELECT * FROM users WHERE email = '{$_GET['email']}'");
   if(mysqli_num_rows($check) > 0){
    echo "this email is already taken";
    die();
   }
    $sql = "INSERT INTO users(first_name,last_name,email,password,role,phone,country,dob,about,salary,experience,current_position,gender,image) VALUES ('{$_GET['first_name']}','{$_GET['last_name']}','{$_GET['email']}','{$_GET['password']}','{$_GET['role']}','{$_GET['phone']}','{$_GET['country']}','{$_GET['dob']}','{$_GET['about']}','{$_GET['salary']}','{$_GET['experience']}','{$_GET['current_position']}','{$_GET['gender']}','{$_GET['image']}')";
    
    $res = mysqli_query($con,$sql);
    
    if(mysqli_error($con)){
        echo mysqli_error($con);
        die();
    }
    
    
    echo $res ;
    
    header("location: form2.php");
    
}else{
    header("location: form1.php");
    session_start();
    $_SESSION['errors'] = $errors ;
    
    
    
}
 


?>