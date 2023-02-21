<?php 
@include '../config.php';
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['EMail'];
    $pass = $_POST['passw'];
    $sql = "SELECT `name` FROM `users` WHERE email = '$email'  && password = '$pass'";
    $result = $db->query($sql);
    try {
        $result = $db->query($sql);
    } catch (Throwable $th) {
        $_SESSION['logerr'] = true;
        header('location:login.php');
    }
    
    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);
        $_SESSION['logged'] = true;
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $email;
        header('location: ../home/');

    }
}

?>