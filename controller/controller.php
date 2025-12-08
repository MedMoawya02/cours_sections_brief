<?php
require_once "../cours_sections_brief/model/course.php";
require_once "../cours_sections_brief/model/sections.php";
function listCourses(){
   $courses= listeCourseAction();
   require_once "../cours_sections_brief/views/list_Course.php";
}

function createAction(){
   require_once "../cours_sections_brief/views/create_course.php";
}

function storeAction(){
   create();
}

function deleteAction(){
   destroy();
}

function editAction(){
   $id=$_GET['id'];
   $course=view($id);
    require_once "../cours_sections_brief/views/edit_course.php";
}
function updateAction(){
   extract($_POST);
   edit($id,$title,$description,$level);
   header("location:index.php");
}

//sections
function listeSectionByGroup(){
   $result=listSectionByGroup();
   require_once "../cours_sections_brief/views/sectionByGroup.php";
}