<?php
@include '../config.php';
@include 'rand.php';
session_start();
$qid = $email = "" ;
if(isset($_POST['quest'])){
    $_SESSION['id'] = $_POST['quest'];
    
}
if(isset($_POST['submit'])){
    $qid =  $_SESSION['id'] ;
    $ques = $_POST['query'];
    $email = $_SESSION['email'];
    $id = generateRandomString();
    $ans = $_POST['answer'];
    $sql = "INSERT INTO `answers`(`id`, `qid`, `email`, `answer`) VALUES ('$id','$qid','$email','$ans')";
    $set = $db->query($sql);
    if($set){
        header("location: ../");
    }

}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="answer.css">
   
    <title>Create new Item</title>

</head>
<body>
    <!-- <button class="open-button" onclick="openForm()">Add query</button> -->
    <div class="popup" id="pop">
        <button id="close" onclick="closeForm()">&times;</button>
        
        <h2><?php echo $_POST['query'];?></h2>
        <form action="" method="post">

            <div class="question">
                <textarea name="answer" ></textarea>
            </div>
            <div class="rule"></div>
           <input type="submit" name="submit" id="anc" value="Add Answer">
        </div>
    </form>

    <script >
        function closeForm() {
  window.location.href = "../";
}
    </script>
</body>
</html>