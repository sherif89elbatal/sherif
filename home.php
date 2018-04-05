<?php
session_start();
$login = "";

if(isset($_SESSION['user'])){
    $login = $_SESSION['user'];
}
    if ($login){
        echo $login['email'];
        echo "you are logged in ";
        ?>
        <br>
        <a href = "jobs_pagination.php"> view all data </a><br>
        <a href = "logout.php">logout</a>
    <?php    
    }else{
        ?>
        <div> please log in or sign up  : </div>
        <a href ="login.php"> login</a>
        <a href ="form1.php"> Sign up</a>
    <?php
    }
?>