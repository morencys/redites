<?php

use PDO;

class showFrontpage{
    public function showFrontPage(){
        $servername = "192.168.10.15:3306";
        $username = "redites@localhost";
        $password = "Bingo123!";
        $bdName = "redites";

        echo "test";

        $connect = mysql_connect($servername, $username, $password) or die("Unable to connect to '$servername'");
        echo "test2";
        mysql_select_db($bdName) or die("Could not open the database '$bdName'");
        echo "test3";
        $result = mysql_query("SELECT * FROM tbltopic");
        echo "test4";

        while ($row = mysql_fetch_array($result, MYSQL_NUM)){
            printf("topic: %s", $row[0]);
        }
        echo "test5";
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