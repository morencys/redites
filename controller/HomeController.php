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

    public function addPost(){
        $servername = "192.168.10.15";
        $username = "redites";
        $password = "Bingo123!";
        $bdName = "redites";

        $conn = new PDO("mysql:host=$servername;dbname=$bdName;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $topicId = $conn->query("SELECT topicId FROM tbltopic WHERE topicName = ". $_REQUEST["topic"]);

        $sql = "INSERT INTO tblpost (postTopicId, postTitle, postText) values (?,?,?,?)";
        $conn->prepare($sql)->execute([$topicId, $_REQUEST['title'], $_REQUEST['text']]);
    }

    public function addComment(){
        $servername = "192.168.10.15";
        $username = "redites";
        $password = "Bingo123!";
        $bdName = "redites";

        $conn = new PDO("mysql:host=$servername;dbname=$bdName;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $comment = $conn->query("SELECT * FROM tblcomment");

        echo "<select class='topic' name='topic'>";
        while($commentInfo = $comment->fetch()){
            echo "<option value='" . $commentInfo['topicId'] . "'>" . $commentInfo['topicName'] . "</option>";
        }
        echo"</select>";

    }
}
?>