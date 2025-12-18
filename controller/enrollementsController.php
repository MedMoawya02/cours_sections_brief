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
?>