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

function editSection($id,$title,$content,$position){
    $conn=dbConect();
    $sql=$conn->prepare("UPDATE sections set title_section=?,content_section=?,position=? where id_section=?");
    $sql->bind_param("ssii",$title,$content,$position,$id);
    $sql->execute();
    $sql->close();
    header("Location: sections.php?course_id=" . $_POST['course_id']);
exit;

}
function viewSection($id){
    $conn=dbConect();
    $sql="SELECT * FROM sections WHERE id_section='$id'";
    $result=$conn->query($sql);
    return $result->fetch_assoc();
}
?>