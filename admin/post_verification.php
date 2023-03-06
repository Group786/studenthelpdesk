<?php
@include '../config.php';
session_start();
$sql = "SELECT `answers`.`qid`,`query`.`query` FROM answers INNER JOIN query ON answers.qid = query.id WHERE answers.flag = false GROUP BY query.query";
$result = $db->query($sql);
if(isset($_POST['check'])){
    $_SESSION['qid'] = $_POST['check'];
    header("location: post.php");

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="post_verification.css">
    <link rel="stylesheet" href="utils.css">
    <script src="function.js"></script>
    <title>JMI - Students' Helpdesk</title>
</head>

<body>
    <div class="container">
        <!-- Header of the Website -->
        <header>
            <img src="./images/logo.jpg" alt="JMILogo">
            <div class="mheader flex alignC">
                <h3>Students' Helpdesk</h3>
                <div class="search flex">
                    <input type="text" placeholder="Search Your Query" id="srch">
                    <div id="srchbtn">
                        <img class="cursor" src="./images/searchLogo.png" alt="SearchLogo">
                    </div>
                </div>
                
            </div>
        </header>
        <!-- Content Box of the Website -->
        <div class="content flex">
            <!-- Left Box -->
            <div class="space">
                <div class="sbox">
                    <ul>
                        <li><a href="reported_question.php">Reported Question</a></li>
                        <li><a href="post_verification.php">Post verification</a></li>
                        <!-- <li><a href="#ExamQ">Log Out</a></li> -->
                    </ul>
                </div>
            </div>
            <!-- Right Box -->
            <div class="postContent">
                <!-- Question 1 -->
                <?php if($result->num_rows>0){
                     while($row = $result->fetch_assoc()){?>
                <div  class="question">
                    <div class="ques flex justifySb">
                        <div class="quest cursor">

                           <h4><?php echo $row['query']?></h4>
                           
                           <button onclick="check('<?php echo $row['qid']?>')">CHECK</button>
                        </div>
                    </div>
                </div>
                <?php
                }?>
                <?php
            }else{
            ?>
            <div  class="question">
                <div class="ques flex justifySb">
                    <div class="quest cursor">

                    <h4>No Answers available for verification</h4>
                       
                       
                    </div>
                </div>
            </div>
               <?php }?>
            </div>
        </div>
    </div>
    <form style="diplay:none" action="" method="post">
                        <input type="submit" name="check" id="check">
                    </form>
                    <script>
                        function check(id){
                            let ch = document.getElementById('check');
                            ch.value = id;
                            ch.click();
                        }
                        </script>
</body>

</html>