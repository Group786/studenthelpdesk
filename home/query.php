<?php 


function quest(){
    @include 'config.php';
    $sql = "SELECT * FROM `query` WHERE flag = true ORDER BY RAND(5)  ";
    $return = $db->query($sql);
    if ($return->num_rows > 0){
        return $return;
    }

}

function data($id){
    @include 'config.php';
    $sql = "SELECT `query` FROM `query` where id = '$id'";
    $return = $db->query($sql);

    if($return->num_rows>0){
        $data = $return->fetch_assoc();
        return $data;
    }
    

}
?>