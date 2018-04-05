
<?php
session_start();

if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}

?>


<form action="login_process.php" method="post">
    <input type="email" name="email" placeholder="please enter your email">
    <input type="password" name="password" placeholder="please enter your password">
    <input type="submit" value="login">
    
</form>