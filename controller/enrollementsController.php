<?php
require_once "../cours_sections_brief/model/enrollement.php";
function subscribeAction()
{
    session_start();
    $userId = $_SESSION['userId'];
    $courseId = $_GET['course_id'];
    if (!isset($_SESSION['userId']) || !isset($_GET['course_id'])) {
        header("Location: index.php");
        exit;
    }
    $subscribed=subscribe($userId, $courseId);
    if ($subscribed) {
        $_SESSION['messageInscription'] = "Vous êtes inscrit avec succès.";
    } else {
        $_SESSION['messageInscription'] = "Vous êtes déjà inscrit à ce cours.";
    }
    header("Location: index.php?action=list");
    exit;
}

//ALL users courses subscribed
function showCoursesAction(){
    session_start();
    $userId = $_SESSION['userId'];
    $courses=showCourses($userId);
    require_once "../cours_sections_brief/views/myCourses.php";
    
}

//usubscrib
function unsubscribAction(){
    session_start();
    $courseId=$_GET['course_id'];
    $userId=$_SESSION['userId'];
    unsubscrib($courseId,$userId);
    header("Location: index.php?action=myCourses");
}
?>