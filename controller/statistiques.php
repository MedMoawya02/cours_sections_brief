
<?php
require_once "../cours_sections_brief/model/statistiques.php";
function allCards(){
    //
    $nbrOfCourses=courseCounter();
    //
    $nbrOfUsers=usersCounter();
    //
    $nbrInscriByGrp=inscriptionInCourse();
    //
    $populaireCourse=populaireCourse();
    //
    $avgSections=avgSections();
    //
    $fiveSections=fiveSections();
    //
    $usersSubscribedThisYear=subscribeThisYear();
    require_once "../cours_sections_brief/views/dashboard.php";
}