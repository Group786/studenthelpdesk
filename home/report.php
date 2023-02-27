<?php
@include 'config.php';
@include 'rand.php';
if(isset($_POST['uid'])){
    $uid = $_POST['uid'];
    $qid = $_POST['qqid'];
    $rid = generateRandomString(9);

    $sql = "INSERT INTO `report` (`id`,`u_id`,`q_id`) VALUES ('$rid','$uid','$qid')";
    $return = $db->query($sql);
    if($return){
        header("location: ./");
    }
    else{
        // header("location: ./");

        echo "reportttttt!!!!!";
    }

}


?>
