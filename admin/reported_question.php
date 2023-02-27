<?php
@include '../config.php';
@include '../home/query.php';

$sql = "SELECT COUNT(u_id) , `q_id`, CASE WHEN COUNT(u_id) > 0 THEN COUNT(u_id) END AS `count` FROM report where status=false GROUP BY q_id";
$result = $db->query($sql);

if(isset($_POST['sign'])){
    $stat = $_POST['stat'];

    $qid = $_POST['sign'];

    $sql = "UPDATE `report` SET status=true WHERE q_id = '$qid'";
    $return = $db->query($sql);
    if($return){
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
                        <li><a href="#ExamQ">Log Out</a></li>
                    </ul>
                </div>
            </div>
            <!-- Right Box -->
            <div class="postContent">
                <!-- Question 1 -->
                <?php if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        $data = data($row['q_id'])?>
                <div id="<?php echo $row['q_id']?>" class="question">
                    <div class="ques flex justifySb">
                        <div class="quest cursor">
                           <h4><?php echo $data['query']?></h4>
                        </div>
                    </div>
                    <div class="Answer flex alignC justifySb">
                        <button onclick="decline('<?php echo $row['q_id']?>')" class="hide cursor">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-x" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                        <button onclick="accept('<?php echo $row['q_id']?>')" class="hide cursor">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                              </svg>
                        </button>
                    </div>
                </div>
                <?php
                    }?>
                    <form style="display:none" action="" name="report" id="report" method="post">
                        <input type="text" name="stat" id="stat">
                        <input type="submit" name="sign" id="sign" ></input>
                    </form>
                    <script>
                        
                        function accept(qid){
                        document.getElementById("stat").value = "true";
                         let click = document.getElementById("sign");
                         click.value = qid;
                         click.click();
                        }
                        function decline(qid){
                        document.getElementById("stat").value = "false";
                         let click = document.getElementById("sign");
                         click.value = qid;
                         click.click();
                        }
                        </script>
                <?php    
                } else{
                ?>
                <div  class="question">
                    <div class="ques flex justifySb">
                        <div class="quest cursor">
                           <h4>No reported QUERY AVAILABLE</h4>
                        </div>
                    </div>
                    
                </div>
                <?php
                    }?>
            </div>
        </div>
    </div>
</body>

</html>