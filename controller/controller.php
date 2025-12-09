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
   if(isset($_GET['course_id'])){
      $id=$_GET['course_id'];
      $result=listSectionByGroup($id);
   }else{
      return null;
   }
   
   require_once "../cours_sections_brief/views/sectionByGroup.php";
}

function editSectionAction(){
   $id=$_GET['section_id'];
   $section=viewSection($id);
   require_once "../cours_sections_brief/views/edit_section.php";
}
function updateSectionAction(){
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: index.php");
        exit;
    }
/*     var_dump($_POST); */
    $id=$_POST['id'];
    $title=$_POST['title'];
    $content=$_POST['content'];
    $position=$_POST['position'];
   /* extract($_POST); */
   editSection($id,$title,$content,$position);

}