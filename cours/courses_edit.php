<?php 
     include '../infrastructure/config.php' ;
     $id = $_GET['id'];
     if(isset($_POST['edit'])){
        $newTitle=$_POST['title'];
        $newDescription=$_POST['description'];
        $newLevel=$_POST['level'];
        $sql="UPDATE course set title='$newTitle',description='$newDescription',niveu='$newLevel' where course_id='$id'";
        if($conn->query($sql)){
            header("Location: courses_list.php");
        }else{
            echo "modification echoué";
        }
     }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootsrtap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- icons link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Courses</title>
</head>

<body>
    <?php include '../infrastructure/config.php' ?>
    <div class="container my-5">
        <h1>Edit course :</h1>
        <form action="courses_edit.php?id=<?php echo $id;?>" method="post">
            <?php
            $id=$_GET['id'];
            $sql = "SELECT * FROM course where course_id='$id'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="mb-3">
                    <label class="form-label">Title:</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $row['title'] ?>" name="title">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Description</span>
                    <textarea class="form-control" aria-label="With textarea" name="description"><?php echo $row['description']?></textarea>
                </div>

                <select class="form-select mt-3" aria-label="Default select example" name="level">
                    <option selected ><?php echo $row['niveu'] ?></option>
                    <option value="Débutant">Débutant</option>
                    <option value="Intermédiaire">Intermédiaire</option>
                    <option value="Avancé">Avancé</option>
                </select>
                <?php
            }
            ?>
            <!-- div pour ajouter une section -->
            <div id="sections">

            </div>
            <button class="btn btn-success mt-3" id="btnAddSection" type="button"><i class="fa-solid fa-plus"></i>Add
                section</button><br>
            <button class="btn btn-secondary mt-3" id="btnSave" type="submit" name="edit"><i
                    class="fa-solid fa-plus"></i>Edit</button>
        </form>
    </div>

    <script src="main.js"></script>
</body>

</html>