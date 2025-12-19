<?php
require_once "../cours_sections_brief/controller/controller.php";
require_once "../cours_sections_brief/controller/enrollementsController.php";
require_once "../cours_sections_brief/controller/statistiques.php";
$action = $_GET['action'] ?? 'list';
//
switch ($action) {

    //courses routage start
    case 'create':
        createAction();
        break;

    case 'store':
        storeAction();
        break;

    case 'edit':
        editAction();
        break;

    case 'update':
        updateAction();
        break;

    case 'destroy':
        destroy();
        break;
    //courses routage end


    //Authentification start
    case 'register':
        regitserAction();
        break;
    case 'registration':
        storeRegisterAction();
        break;

    case 'login':
        loginAction();
        break;
    case 'loginCheck':
        loginCheckAction();
        break;
    case 'logout':
        logout();
        break;
    //Authentification end

    //subscribe start
    case 'subscribe':
        subscribeAction();
        break;
    //subscribe end

    //mycourses start
    case 'myCourses':
        showCoursesAction();
        break;
    //mycourses end

    //subscribe start
    case 'subscribe':
        subscribeAction();
        break;
    //subscribe end
    case 'unsubscribe':
        unsubscribAction();
        break;

    //Statitsiques
    case 'statistiques':
        allCards();
        break;
     //
    case 'list':
    default:
        listCourses();
        break;
}
?>