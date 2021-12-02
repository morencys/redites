<?php

use PDO;

class showFrontpage{
    public function showTopic(){
        $servername = "192.168.10.15";
        $username = "redites";
        $password = "Bingo123!";
        $bdName = "redites";

        $conn = new PDO("mysql:host=$servername;dbname=$bdName;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $topic = $conn->query("SELECT * FROM tbltopic");

        echo "<select class='topic' name='topic'>";
        while($topicInfo = $topic->fetch()){
            echo "<option value='" . $topicInfo['topicId'] . "'>" . $topicInfo['topicName'] . "</option>";
        }
        echo"</select>";
    }

    public function addPost($title, $text){
        $servername = "192.168.10.15";
        $username = "redites";
        $password = "Bingo123!";
        $bdName = "redites";

        $conn = new PDO("mysql:host=$servername;dbname=$bdName;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*$topicId = $conn->query("SELECT topicId FROM tbltopic WHERE topicName = ". $_POST["topic"]);*/

        $sql = "INSERT INTO tblpost (postTopicId, postTitle, postText) values (?,?,?,?)";
        $conn->prepare($sql)->execute([1, $title, $text]);
    }

    public function showPosts(){
        $servername = "192.168.10.15";
        $username = "redites";
        $password = "Bingo123!";
        $bdName = "redites";

        $conn = new PDO("mysql:host=$servername;dbname=$bdName;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $post = $conn->query("SELECT * FROM tblpost");
        

        while($postInfo = $post->fetch()){

            $topic = $conn->query("SELECT * FROM tbltopic WHERE " . $postInfo['postTopicId'] . " = topicId");
            $topicInfo = $topic->fetch();

            echo'
            <div class="container p-0 pt-5">
            <div class="container p-0 pt-5">
                <div class="row p-3 py-0 border border-3 border-dark rounded">
                    <div class="row my-3">
                        <div class="col-6">
                            <h2>' . $postInfo["postTitle"] . '</h2>
                        </div>
                        <div class="col-6">
                            <h4>' . $topicInfo['topicName'] . '</h4>
                        </div>
                    </div>
                    <div class="row my-3">
                        <p>' . $postInfo["postText"] . '</p>
                    </div>
                </div>
            </div>
        </div>';
        }


    }
}
?>