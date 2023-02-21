<?php 

function quest(){
    @include './config.php';
    $sql = "SELECT * FROM `query` ORDER BY RAND(5) ";
    $return = $db->query($sql);
    if ($return->num_rows > 0){
        return $return;
    }

}
?>