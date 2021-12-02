<?php
class showFrontpage{
    public function showFrontpage(){
        $servername = "192.168.10.15";
        $username = "redites";
        $password = "Bingo123!";
        $bdName = "redites";
        $conn = new PDO("mysql:host=$servername;dbname=$bdName;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $topic = $conn->query("SELECT * FROM tbltopic");
        
        while($topicInfo = $topic->fetch()){
            echo $topicInfo['topicName'];
        }
    
    }

    public function addPost(){
        $servername = "192.168.10.15";
        $username = "redites";
        $password = "Bingo123!";
        $bdName = "redites";
        $conn = new PDO("mysql:host=$servername;dbname=$bdName;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    public function addComment(){
        $servername = "192.168.10.15";
        $username = "redites";
        $password = "Bingo123!";
        $bdName = "redites";
        $conn = new PDO("mysql:host=$servername;dbname=$bdName;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
}
?>