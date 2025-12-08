<?php
function dbConnect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "courses";
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}

function listeCourseAction(){
    $conn=dbConnect();
    $sql= "SELECT * FROM course";
    return $conn->query($sql);
}
?>