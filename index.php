<?php 
require_once"../cours_sections_brief/controller/controller.php";
/* listCourses(); */
$action = $_GET['action'] ?? 'list';
//
switch($action){
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

    case 'list':
        default:
        listCourses();
        break;
}
?>