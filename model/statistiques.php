<?php
function con()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "courses";
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}

//total du courses
function courseCounter()
{
    $conn = con();
    $sql = "SELECT COUNT(course_id)FROM course";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['COUNT(course_id)'];
}

//total d'utilisateurs
function usersCounter()
{
    $conn = con();
    $sql = "SELECT COUNT(id)FROM users";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['COUNT(id)'];
}

//inscriptions par cours
function inscriptionInCourse()
{
    $conn = con();
    $sql = "SELECT title,COUNT(enrollments.userId) FROM course
        INNER JOIN enrollments ON course.course_id=enrollments.courseId
        GROUP BY course.course_id
    ";
    return $conn->query($sql);

}

//courses le plus populaire 
function populaireCourse()
{
    $conn = con();
    $sql = "SELECT c.course_id , c.title,COUNT(e.userId) AS total_inscription FROM course c
        INNER JOIN enrollments e ON c.course_id=e.courseId GROUP BY c.course_id 
        ORDER BY total_inscription DESC LIMIT 1
    ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

//average sections per course
function avgSections()
{
    $conn = con();
    $sql = "SELECT AVG(nb_sections) AS avg_sections FROM
    (SELECT COUNT(*) AS nb_sections FROM sections
    GROUP BY course_id)AS total 
    ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

//courses ayant plus 5 sections
function fiveSections()
{
    $conn = con();
    $sql = "SELECT course.course_id,title,COUNT(sections.course_id) AS total_sections FROM course
INNER JOIN sections ON course.course_id=sections.course_id
GROUP BY course.course_id HAVING COUNT(sections.course_id) >5";
$result=$conn->query($sql);
return $result;
}

//utilisateurs inscrit cette année
function subscribeThisYear(){
    $conn=con();
    $sql="SELECT users.id,users.username,COUNT(enrollments.courseId) AS total_courses FROM users
    INNER JOIN enrollments ON users.id=enrollments.userId WHERE YEAR(enrollments.enrolled_at)=YEAR(CURRENT_DATE())
    GROUP BY users.id";
    $result=$conn->query($sql);
    return $result;
}
