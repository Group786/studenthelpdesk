<?php
@include 'config.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $pass = $_POST['password'];
    $sql = "INSERT INTO `users` (`email`,`name`,`contact`,`password`) VALUE ('$email','$name','$contact','$pass')";
    $return = $db->query($sql);
    if($return){

        if(isset($_POST['student'])){
            $enroll = $_POST['enrollment'];    
            $sql = "INSERT INTO `student` (`email`,`enrollment`) VALUE ('$email','$enroll')";
            $return = $db->query($sql);
            if($return){
                header("location: /studenthelpdesk/home/");

            }
        
        }

        
    }
}
?>