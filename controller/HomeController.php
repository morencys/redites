<?php

use PDO;

class showFrontpage{
    public function showFrontPage(){
        $servername = "192.168.10.15";
        $username = "redites";
        $password = "Bingo123!";
        $bdName = "redites";

        echo "test";
        $conn = new mysqli($servername, $username, $password, $bdName);
        echo "test2";
        if (!$conn) {
            die('Could not connect: ' . mysql_error());
        }
        echo 'Connected successfully';
        
        $topic = $conn->query("SELECT * FROM tbltopic");
        echo "test3";
        
        while($topicInfo = $topic->fetch()){
            echo $topicInfo['topicName'];
        }
        echo "test4";
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