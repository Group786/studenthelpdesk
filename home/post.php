<?php
@include 'config.php';
@include 'query.php';
session_start();
if(!isset($_POST['qid'])){
    header("location: ./");
}

if(isset($_POST['qid'])){
    $qid = $_POST['qid'];
    $sqlq = "SELECT `query` FROM `query` where id = '$qid' ";
    $get = $db->query($sqlq);
    $quest = $get->fetch_assoc();
    $sql = "SELECT `id`,`answer` FROM `answers` where qid = '$qid' && view = true";
    $return = $db->query($sql);
    if($return->num_rows == 0){
        header("location: ./");
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="post.css">
    <link rel="stylesheet" href="utils.css">
    <script src="function.js"></script>
    <script src="add query/addq.js"></script>
    <script src="create post/createp.js"></script>
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
                            <a href="./add query/addq.html">Add query</a>
                            <a href="./create post/createp.html">Create post</a>
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
            <?php 

            if($return->num_rows > 0){
                while($anc = $return->fetch_assoc()){
                    ?>
                <div id="<?php echo $anc['id']?>" class="question">
                    <div class="ques flex justifySb">
                        <div class="quest cursor">
                           <h4><?php echo $quest['query'];?></h4>
                        </div>
                    </div>
                    <div id="p">
                        <p>
                        <?php echo $anc['answer']?>
                        </p>
                    </div>
                    <div class="Answer flex alignC justifySb">
                        
                    
                    </div>
                    
                </div>
                <?php
             }
             }
          
             ?>
            </div>
          
        </div>
    </div>
</body>

</html>