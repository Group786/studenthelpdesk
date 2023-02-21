<?php
@include 'config.php';
@include 'query.php';
session_start();
if(isset($_POST['qid'])){
    $qid = $_POST['qid'];
    $sqlq = "SELECT `query` FROM `query` where id = '$qid'";
    $get = $db->query($sql);
    $quest = $get->fetch_assoc();
    $sql = "SELECT `answer` FROM `answers` where qid = '$qid'";
    $return = $db->query($sql);
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
            <?php if($return->num_rows > 0){?>
            <div class="postContent">
                <!-- Question 1 -->
                    <?php while($anc = $return->fetch_assoc()) {?>
                <div id="<?php echo $anc['id'];?>" class="question">
                    <div class="ques flex justifySb">
                        <div class="quest cursor">
                           <h4><?php echo $quest['query'];?></h4>
                        </div>
                    </div>
                    <div><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, cum! Consequatur, et, natus minima soluta possimus amet voluptatibus cum aperiam voluptates explicabo perspiciatis aspernatur! Nisi ab esse recusandae corrupti laboriosam!
                    Reprehenderit iste pariatur placeat veritatis debitis eligendi, quibusdam dicta, dolorem saepe aut tenetur esse. Cumque dolorum quos tempore, facere, mollitia est reprehenderit labore animi minus laborum facilis exercitationem temporibus sit!
                    Autem, nihil odio dolorem velit qui unde eveniet deserunt quibusdam fugit omnis, rem nobis quos quam, labore fuga ea suscipit! In beatae perferendis dolor, ratione ullam deserunt laboriosam molestiae vel!
                    Quisquam quos, aut repudiandae vitae ipsa, enim ad veniam optio esse mollitia quia illum nemo commodi voluptate repellendus, ratione aliquid autem quod adipisci officiis ipsum ab corrupti ducimus! Iure, aspernatur?
                    Molestias, assumenda deleniti ut labore aperiam iste quia velit veritatis quos consequatur officiis exercitationem laboriosam quibusdam aspernatur quam tempora aliquid, et distinctio quo, sit ea asperiores maxime porro. Quibusdam, est.
                    Magnam omnis, dignissimos incidunt deserunt eligendi ipsa quos rem voluptate non minima eum odit, facilis repellat harum neque adipisci nostrum? Placeat deserunt laboriosam sed, quibusdam cum voluptas molestiae dignissimos odit?
                    Commodi delectus quis enim. Illum distinctio enim facere veniam, asperiores temporibus veritatis ex, soluta, cupiditate perferendis dolor sed sapiente atque incidunt exercitationem repudiandae quod reiciendis assumenda quibusdam. Consequuntur, itaque nulla?
                    Saepe dolores culpa consequuntur tempore ullam vitae atque dolor voluptatibus consectetur rerum perferendis sint ab, doloribus error necessitatibus, ipsum sunt, provident ratione optio tempora pariatur exercitationem eius porro odio? Ratione.
                    Neque nemo quod omnis! Officia fugiat molestiae ex quae dicta similique ullam illum molestias, ducimus veniam minima recusandae culpa aut modi porro quaerat ipsa ipsam, nisi explicabo eius delectus eveniet!
                    Maxime libero est deleniti ipsam animi veniam rem cum rerum aspernatur modi quidem, perferendis ab ex in reiciendis reprehenderit cumque possimus ullam laboriosam excepturi expedita alias! Voluptatibus exercitationem sed vero?
                    Laudantium aperiam ducimus, reiciendis impedit error voluptatibus nisi, modi iusto, necessitatibus quisquam eum id dolorum possimus deserunt eveniet quae vel! Amet, voluptas enim soluta aut quasi temporibus iste incidunt corrupti.
                    Error, recusandae qui voluptatem, nisi, eos dicta mollitia repellat explicabo magnam ab placeat a excepturi odit soluta adipisci quia laboriosam fugit voluptate ipsa deleniti alias unde ducimus! Quisquam, eum dolore.
                    Illum in ut voluptatum enim molestiae sint facere, eius aliquam neque laudantium soluta maxime temporibus voluptas quae quas, eligendi ad cupiditate suscipit harum ullam magnam quos voluptate. Hic, voluptate maiores!
                    Similique officia excepturi ex reprehenderit animi ratione. Blanditiis laboriosam mollitia cupiditate quo a minima ipsum error nulla tenetur, veritatis voluptatibus ullam eius autem totam praesentium voluptatem impedit dicta ex. Animi!
                    Vero animi commodi eligendi magni velit deserunt? Corporis omnis cumque totam ab quae numquam, error in aliquam vitae voluptate deserunt praesentium est facere earum quaerat impedit placeat quisquam culpa iste.</p></div>
                    <div class="Answer flex alignC justifySb">
                        <button onclick="hide('<?php echo $anc['id']; ?>')" class="hide cursor">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-x" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                        <button onclick="" class="hide cursor">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                              </svg>
                        </button>
                    
                    </div>
                    
                </div>
                <?php}?>
            </div>
            <?php}?>
        </div>
    </div>
</body>

</html>