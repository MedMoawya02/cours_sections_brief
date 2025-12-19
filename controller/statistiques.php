
<?php
require_once "../cours_sections_brief/model/statistiques.php";
function allCards(){
    //
    $nbrOfCourses=courseCounter();
    //
    $nbrOfUsers=usersCounter();
    //
    $nbrInscriByGrp=inscriptionInCourse();
    require_once "../cours_sections_brief/views/dashboard.php";
}