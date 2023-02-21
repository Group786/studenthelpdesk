<?php
@include '../config.php';
@include 'rand.php';

if(isset($_POST['quest'])){
    $qid = $_POST['quest'];
    $id = generateRandomString();
    $ques = $_POST['query'];

    echo $ques;
}
?>
