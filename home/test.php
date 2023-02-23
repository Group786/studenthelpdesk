<?php if(isset($_POST['qid'])){
    $qid = $_POST['qid'];
    $sqlq = "SELECT `query` FROM `query` where id = '$qid'";
    $get = $db->query($sql);
    $quest = $get->fetch_assoc();
    $sql = "SELECT `id`,`answer` FROM `answers` where qid = '$qid'";
    $return = $db->query($sql);
    if($return->num_rows > 0){
        while($anc = $return->fetch_assoc()){
            echo $anc['id'];
            echo $anc['answer'];
        }
    }
}
?>