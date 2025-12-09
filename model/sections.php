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

function listSectionByGroup($id){
    $conn=dbConect();
    $sql="SELECT * FROM sections INNER JOIN course on sections.course_id=course.course_id where course.course_id='$id'";
    $result=$conn->query($sql);
    return $result;
}

function destroySection(){
    $conn=dbConect();
    
    $id=$_GET['section_id'];
    $sql="DELETE FROM sections where id_section=$id";
    if($conn->query($sql)){
        header("location:sections.php?course_id=".$_GET['course_id']);

    }
}
?>