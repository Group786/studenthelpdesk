<?php
@include '../config.php';

$sql = "SELECT `answers`.`id`,`query`.`query`,`answers`.`answer` FROM answers INNER JOIN query ON answers.qid = query.id WHERE answers.qid = 'oSBu26' && answers.flag = false" ;
$result = $db->query($sql);
echo $result->num_rows;
while($row = $result->fetch_assoc()){

echo $row['id'];
echo $row['answer'];
}



?>
