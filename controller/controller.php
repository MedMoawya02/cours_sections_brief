<?php
require_once "../cours_sections_brief/model/course.php";
require_once "../cours_sections_brief/model/sections.php";
require_once "../cours_sections_brief/model/register.php";
function listCourses()
{
   $courses = listeCourseAction();
   require_once "../cours_sections_brief/views/list_Course.php";
}

function createAction()
{
   require_once "../cours_sections_brief/views/create_course.php";
}

function storeAction()
{
   create();
}

function deleteAction()
{
   destroy();
}

function editAction()
{
   $id = $_GET['id'];
   $course = view($id);
   require_once "../cours_sections_brief/views/edit_course.php";
}
function updateAction()
{
   extract($_POST);
   edit($id, $title, $description, $level);
   header("location:index.php");
}

//sections
function listeSectionByGroup()
{
   if (isset($_GET['course_id'])) {
      $id = $_GET['course_id'];
      $result = listSectionByGroup($id);
   } else {
      return null;
   }

   require_once "../cours_sections_brief/views/sectionByGroup.php";
}

function editSectionAction()
{
   $id = $_GET['section_id'];
   $section = viewSection($id);
   require_once "../cours_sections_brief/views/edit_section.php";
}
function updateSectionAction()
{
   if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      header("Location: index.php");
      exit;
   }
   $id = $_POST['id'];
   $title = $_POST['title'];
   $content = $_POST['content'];
   $position = $_POST['position'];
   editSection($id, $title, $content, $position);

}

//partie users
function regitserAction()
{
   require_once "../cours_sections_brief/views/registrationPage.php";

}
function storeRegisterAction()
{
   register();
}


//login page

function loginAction()
{
   require_once "../cours_sections_brief/views/loginPage.php";
}
//login logic
function loginCheckAction()
{
   session_start();
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $result = loginCheck($email, $password);
      if ($result['success']) {
         $_SESSION['userId'] = $result['userId'];
         $_SESSION['username'] = $result['username'];
         $_SESSION['email'] = $result['email'];
         header("location:index.php");
         exit;
      }
      $_SESSION['message'] = $result['message'];
      header("Location: /cours_sections_brief/index.php?action=login");
      exit;
   }

}
function logout(){
   session_destroy();
   header("Location: /cours_sections_brief/index.php?action=login");
}

