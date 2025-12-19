<?php
function con(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "courses";
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}

//total du courses
function courseCounter(){
    $conn=con();
    $sql="SELECT COUNT(course_id)FROM course";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    return $row['COUNT(course_id)']; 
}

//total d'utilisateurs
function usersCounter(){
    $conn=con();
    $sql="SELECT COUNT(id)FROM users";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    return $row['COUNT(id)']; 
}

//inscriptions par cours
function inscriptionInCourse(){
    $conn=con();
    $sql="SELECT title,COUNT(enrollments.userId) FROM course
        INNER JOIN enrollments ON course.course_id=enrollments.courseId
        GROUP BY course.course_id
    ";
    return $conn->query($sql);
    
}
