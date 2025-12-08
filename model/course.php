<?php
function dbConnect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "courses";
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}

function listeCourseAction()
{
    $conn = dbConnect();
    $sql = "SELECT * FROM course";
    return $conn->query($sql);
}

function create()
{
    $conn = dbConnect();

    //
    $errorMessage = "";
    if (isset($_POST["save"])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $level = $_POST['level'];
        if (empty($title) || empty($description)) {
            $errorMessage = "<div class='alert alert-danger'>Please fill out all course details (Title, Description, and select a Level).</div>";
            return $errorMessage;
        } else {
            $sql = "INSERT into course (title,description,niveu) VALUES('$title','$description','$level')";
            if ($conn->query($sql)) {
                $last_Id = $conn->insert_id;
                if (isset($_POST["SectionTitle"], $_POST["content"], $_POST["position"])) {
                    $sections_titles = $_POST["SectionTitle"];
                    $sections_content = $_POST["content"];
                    $sections_position = $_POST["position"];
                    $count = count($sections_titles);
                    $stmt = $conn->prepare("INSERT INTO sections (course_id,title_section,content_section,position) VALUES(?,?,?,?)");
                    $stmt->bind_param("issi", $last_Id, $title, $content, $position);
                    for ($i = 0; $i < $count; $i++) {
                        $title = $sections_titles[$i];
                        $content = $sections_content[$i];
                        $position = $sections_position[$i];
                        if (!empty($title)) {
                            $stmt->execute();
                        }
                    }
                    $stmt->close();
                }
                header("Location: index.php");
            }
        }
    }
    //
}

function destroy()
{
    $conn = dbConnect();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM course where course_id='$id'";
        if ($conn->query($sql)) {
            header("location:index.php");
        }
    }
}

function edit($id,$title,$description,$level)
{
    $conn=dbConnect();
    $sql=$conn->prepare("UPDATE course set
    title=?,
    description=?,
    niveu=?
    where course_id=?
    ");
   $sql->bind_param("sssi", $title, $description, $level, $id);
    $sql->execute();
    $sql->close();
}
function view($id)
{
    $conn = dbConnect();
    $sql = "SELECT * FROM course WHERE course_id='$id'";
    $result=$conn->query($sql);
    return $result->fetch_assoc();
}
?>