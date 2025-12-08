<?php
require_once "../cours_sections_brief/model/course.php";
function listCourses(){
   $courses= listeCourseAction();
   require_once "../cours_sections_brief/views/list_Course.php";
}