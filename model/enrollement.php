<?php
function connecteToDb()
{
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $db = "courses";
    $conn = new mysqli($serverName, $userName, $password, $db);
    return $conn;
}
function subscribe($userId, $courseId)
{
    $conn = connecteToDb();
    $check = $conn->prepare("SELECT * FROM `enrollments` WHERE courseId=? AND userId=?");
    $check->bind_param("ii", $courseId, $userId);
    $check->execute();
    $result = $check->get_result();
    if ($result->num_rows>0){
        $check->close();
        $conn->close();
        return false;
    }
     $stmt = $conn->prepare("INSERT INTO enrollments (courseId,userId)VALUES(?,?)");
        $stmt->bind_param("ii", $courseId, $userId);
        $stmt->execute();
        $stmt->close();
        $check->close();
        $conn->close();
        return true;
   /*  if ($result->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO enrollments (courseId,userId)VALUES(?,?)");
        $stmt->bind_param("ii", $courseId, $userId);
        $stmt->execute();
        $stmt->close();
        $check->close();
        return false;
    } */
   
}

//function pour voir tous les courses de l'utilisateur 
function showCourses($id){
    $conn=connecteToDb();
     $stmt=$conn->prepare(" SELECT 
            c.course_id,
            c.title,
            c.description,
            c.niveu
        FROM enrollments e
        INNER JOIN course c ON c.course_id = e.courseId
        WHERE e.userID = ?
    ") 
       ;
    $stmt->bind_param("i",$id);
    $stmt->execute();

    $result=$stmt->get_result();

    $stmt->close();
    $conn->close();
    return $result;

}

//for unsubscrib
function unsubscrib($courseId,$userId){
    $conn=connecteToDb();
    $stmt=$conn->prepare("DELETE FROM  `enrollments` WHERE courseId=? AND userId=? ");
    $stmt->bind_param("ii",$courseId,$userId);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>