<?php
function dbConect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "courses";
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}

function listSectionByGroup(){
    $conn=dbConect();
    $id=$_GET['course_id'];
    $sql="SELECT * FROM sections INNER JOIN course on sections.course_id=course.course_id where course.course_id='$id'";
    $result=$conn->query($sql);
    return $result;
}
?>