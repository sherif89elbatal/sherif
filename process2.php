<?php
     // validation of  form 2
     
     $errors2 = [];
     
     //check name
     if(isset($_GET['name'])){
    if(empty($_GET["name"])){
        $errors2[] = " name is empty you have to fill it ";
    }else{
        if(is_string($_GET["name"])){
            if(strlen($_GET["name"]) < 3){
                $errors2[] = "sorry  name shoud not be less than 3 characters";
            }
        }else{
            $errors2[] = " name is not a string";
        }
    }
    
}else {
    $errors2[] = "Sorry  name is not exist";
}
     
     //End of checking name
     
            // check country
            
    if(isset($_GET['country'])){
    if(empty($_GET["country"])){
        $errors2[] = " country is empty you have to fill it ";
    }else{
        if(is_string($_GET["country"])){
            if(strlen($_GET["country"]) < 3){
                $errors2[] = "sorry  country shoud not be less than 3 characters";
            }
        }else{
            $errors2[] = " country is not a string";
        }
    }
    
}else {
    $errors2[] = "Sorry  country is not exist";
}
        // End checking country
        
        // check Gender
    if(isset($_GET['gender'])){
    if(empty($_GET["gender"])){
        $errors2[] = " gender is empty you have to fill it ";
    }else{
        if(is_string($_GET["gender"])){
            if(strlen($_GET["gender"]) < 3){
                $errors2[] = "sorry  gender shoud not be less than 3 characters";
            }
        }else{
            $errors2[] = " gender is not a string";
        }
    }
    
}else {
    $errors2[] = "Sorry  gender is not exist";
}
        // end check of Gender
        
    // final step is => check error and if it's true  insert into database if is not return to the form page and show the Error
         
    if(count($errors2)==0){
        $con2 = mysqli_connect('localhost','root','','elbatal');
        $sql2 = "INSERT INTO jobs (name,title,description,country,approved,available,gender,education,salary,experience,more_info) VALUES('{$_GET['name']}','{$_GET['title']}','{$_GET['description']}','{$_GET['country']}','{$_GET['approved']}','{$_GET['available']}','{$_GET['gender']}','{$_GET['education']}','{$_GET['salary']}','{$_GET['experience']}','{$_GET['more_info']}')";
        
         $result = mysqli_query($con2,$sql2);
         echo $result;
         header("location: successful_page.php");
        
        
        
}else{
        
        session_start();
        $_SESSION['errors2'] = $errors2;
        header("location: form2.php");
        
    }
?>