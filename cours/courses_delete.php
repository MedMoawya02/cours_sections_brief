<?php 
 include '../infrastructure/config.php' ;
 if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM course where course_id=$id";
    if($conn->query($sql)){
        header("location:courses_list.php");
        exit();
 }else{
    echo "course non supprimée";
 }
}
?>