<?php
class showFrontpage{
    public function showFrontPage(){
        $servername = "192.168.10.15";
        $username = "redites";
        $password = "Bingo123!";
        $bdName = "redites";
        echo "test3";
        $conn = mysqli_connect($servername, $username, $password, $bdName);
        echo "test4";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "test5";
        $topic = $conn->query("SELECT * FROM tbltopic");
        
        while($topicInfo = $topic->fetch()){
            echo $topicInfo['topicName'];
        }
        echo "test2";
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