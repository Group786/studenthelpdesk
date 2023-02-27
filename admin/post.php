<?php
@include '../config.php';

session_start();
if(!isset($_SESSION['qid'])){
    header("location: postverification.php");

}
$qid = $_SESSION['qid'];
$sql = "SELECT `answers`.`id`,`query`.`query`,`answers`.`answer` FROM answers INNER JOIN query ON answers.qid = query.id WHERE answers.qid = '$qid' && answers.flag = false" ;
$result = $db->query($sql);

if(isset($_POST['flag'])){
    $id = $_POST['aid'];
    $show = $_POST['show'];
    $stat = $_POST['flag'];

    $sql = "UPDATE `answers` SET `flag`=$stat, `view` = $show WHERE id = '$id'";
    $return = $db->query($sql);
    if($return){
        header("Refresh:0");
        }
    }
        

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="post1.css">
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
         <!-- Content Box of the Website -->
         <div class="content flex">
            <!-- Left Box -->
            <div class="space">
                <div class="sbox">
                    <ul>
                        <li><a href="reported_question.html">Reported Question</a></li>
                        <li><a href="#ExamQ">Post verification</a></li>
                        <li><a href="#ExamQ">Log Out</a></li>
                    </ul>
                </div>
            </div>
            <!-- Right Box -->
            <div class="postContent">
                <!-- Question 1 -->
                <?php 
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                       ?>
                <div  class="question">
                    <div class="ques flex justifySb">
                        <div class="quest cursor">
                           <h4><?php echo $row['query']?></h4>
                        </div>
                    </div>
                    <div><p><?php echo $row['answer']?></p></div>
                    <div class="Answer flex alignC justifySb">
                        <button onclick="decline('<?php echo $row['id']?>')" class="hide cursor">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                class="bi bi-x" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                        <button onclick="accept('<?php echo $row['id']?>')" class="hide cursor">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                              </svg>
                        </button>
                    
                    </div>
                    
                </div>
                <?php
                    }?>
                    <form  style="display:none" action="" name="report" id="report" method="post">
                        <input type="text" name="aid" id="aid">
                        <input type="text" name="show" id="show">
                        <input type="submit" name="flag" id="flag" value="true" ></input>
                    </form>
                    <script>
                        
                        function accept(aid){
                            console.log(aid);
                        document.getElementById("show").value = "true";
                        document.getElementById("aid").value = aid; 
                        document.getElementById("flag").click();
                        }

                        function decline(aid){
                            console.log(aid);
                        document.getElementById("show").value = "false";
                        document.getElementById("aid").value = aid;
                        document.getElementById("flag").click();
                        }
                        </script>
                <?php    
                } else{
                    header("location: post_verification.php");

                }?>
            </div>
        </div>
    </div>
</body>

</html>