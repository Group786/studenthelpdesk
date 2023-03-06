<?php
@include 'config.php';
@include 'query.php';
session_start();
if(!isset($_SESSION['name'])){
    header("location: ../login/");
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
                <div class="button flex">
                    <div class="dropdown">
                        <input class="dropbtn cursor" type="button" value="<?Php echo $_SESSION['name'];?>">
                        <div class="dropdown-content">
                            
                            <a href="logout.php">LogOut</a>
                        </div>
                    </div>
                </div>
                <div class="button flex">
                    <div class="dropdown">
                        <input class="dropbtn cursor" type="button" value="Add Query">
                        <div class="dropdown-content">
                            <a href="./add_query/addq.php">Add query</a>
                            <a href="./create_post/createp.html">Create post</a>
                        </div>
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
                        <li id="first">
                            <div class="addSpace">
                                <a href="#Space"><span class="big">+</span> Create Space</a>
                            </div>
                        </li>
                        <li><a href="#DepartQ">Departmental Queries</a></li>
                        <li><a href="#ExamQ">Examination Queries</a></li>
                        <li><a href="#StudyM">Study Material</a></li>
                    </ul>
                </div>
            </div>
            <!-- Right Box -->
            <div class="postContent">
                <div class="qapBox">
                    <div class="usBox flex">
                        <div class="user">
                            <img src="./images/user.png" alt="user">
                        </div>
                        <a style="text-decoration:none" href="./add_query/addq.php" class="askShare flex alignC cursor">
                            <div class="whatadq">What do you want to ask?</div>
                        </a>
                    </div>
                   
                </div>
                <div class="qfu flex alignC justifySb">
                    <div class="wrapqfu flex alignC">
                        <div class="qLogo"><img src="./images/Question.png" alt="ideaLogo"></div>
                        <div class="qfutext">Questions for you</div>
                    </div>
                    <div class="rarrow"><img src="./images/rightarrow.png" alt="right arrow"></div>
                </div>
                <!-- Question 1 -->
                <?php $get = quest();
                while ($quest = $get->fetch_assoc()) {
                    $id = $quest['id'];
                    $sql = "SELECT id FROM answers WHERE qid = '$id' && view = true";
                    $result = $db->query($sql);
                    $count = $result->num_rows;
                
                ?>
                
                <div id="<?php echo $quest['id']?>" class="question">
                    <div class="ques flex justifySb">
                        <div class="quest cursor">
                        <?php echo $quest['query']?>
                        </div>
                        <button onclick="hide('<?php echo $quest['id']?>')" class="hide cursor">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-x" viewBox="0 0 16 16">
                                <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                    </div>
                    <div class="ansStatus cursor">
                        <form action="post.php" method="post">
                            <button type="submit" name="qid" id="qid" value="<?php echo $quest['id']?>">
                                <?php echo $count;?> Answer
                </button>
                </form>
                    </div>
                    <div class="Answer flex alignC justifySb">
                        <form action="./answer/" method="post">
                            <input type="text" style="display:none" name="query" id="query" value="<?php echo $quest['query']?>">
                            <button type="submit" name="quest" value="<?php echo $quest['id']?>" class="ansbtn flex alignC cursor">
                                <div class="ansi"><img src="./images/answer.png" alt="answerLogo"></div>
                                <div class="ans">Answer</div>
                            </button>
                        </form>
                        <button class="dots cursor" onclick="repo('<?php echo $quest['id']?>')">
                            <div class="dot"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
  <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
</svg></div>
                                
                        </button>
                    </div>
                </div>
                
                <?php }?>
            </div>
        </div>
    </div>
    <form name="report" method="post" action="report.php">
        <input type="text" id="qqid" name="qqid" value="xyz">
        <input type="submit" id="uid" name="uid" value="<?php echo $_SESSION['email']?>">
    </form>
</body>

</html>