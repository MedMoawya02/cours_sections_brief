<?php
    include '../infrastructure/config.php';
if(isset($_GET['section_id'])){
    $id=$_GET['section_id'];
    $sql="DELETE FROM sections where id_section=$id";
    if($conn->query($sql)){
        header("location:section_by_group.php");
/*         exit(); */
    }
}
?>