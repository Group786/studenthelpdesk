<?php
@include '../config.php';
@include 'rand.php';
if(isset($_POST['query'])){
    $id = generateRandomString();
    $q = $_POST['quest'];
    $sql = "INSERT INTO `query`(`id`, `query`,`flag`) VALUES ('$id','$q',true)";
    $return = $db->query($sql);
    if ($return) {
        header("location: ../");
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addq.css">
   
    <title>Create new Item</title>

</head>
<body>
    <!-- <button class="open-button" onclick="openForm()">Add query</button> -->
    <div class="popup" id="pop">
        <button id="close" onclick="closeForm()">&times;</button>
        <h2>Write down the Query...</h2>
        <form action="" method="post">

            <div class="question">
                <textarea name="quest" placeholder="Start your question with 'What', 'How', 'Why', etc."></textarea>
            </div>
            <div class="rule"></div>
           <input type="submit" name="query" id="anc" value="Add Query">
        </div>
    </form>
    <script >
        function closeForm() {
  window.location.href = "../";
}
    </script>
</body>
</html>