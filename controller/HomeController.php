<?php
class showFrontpage{
    public function showFrontPage(){
        $servername = "192.168.10.15";
        $username = "redites";
        $password = "Bingo123!";
        $bdName = "redites";

        $connect = mysql_connect($servername, $username, $password) or die("Unable to connect to '$servername'");
        mysql_select_db($bdName) or die("Could not open the database '$bdName'");
        $result = mysql_query("SELECT * FROM tbltopic");

        while ($row = mysql_fetch_array($result, MYSQL_NUM)){
            printf("topic: %s", $row[0]);
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