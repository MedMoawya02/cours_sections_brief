<!-- // post 
insert
lastid
//insere loop section -->
<?php
$errorMessage="";
 include '../infrastructure/config.php' ;
if(isset($_POST["save"])){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $level=$_POST['level'];
    if(empty($title)||empty($description)){
       $errorMessage= "<div class='alert alert-danger'>Please fill out all course details (Title, Description, and select a Level).</div>";
    }else{
        $sql="INSERT into course (title,description,niveu) VALUES('$title','$description','$level')";
        if($conn->query($sql)){
            header("Location: courses_list.php");
        }
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
        <h1>Add course :</h1>
        <form action="courses_create.php" method="post">

            <div class="mb-3">
                <label class="form-label">Title:</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Title..." name="title">
            </div>

            <div class="input-group">
                <span class="input-group-text">Description</span>
                <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
            </div>

            <select class="form-select mt-3" aria-label="Default select example" name="level">
                <option selected>Level</option>
                <option value="Débutant">Débutant</option>
                <option value="Intermédiaire">Intermédiaire</option>
                <option value="Avancé">Avancé</option>
            </select>
            <!-- div pour ajouter une section -->
            <div id="sections">
                
            </div>
            <?php echo $errorMessage; ?>
            <button class="btn btn-success mt-3" id="btnAddSection" type="button" ><i class="fa-solid fa-plus"></i>Add section</button><br>
            <button class="btn btn-secondary mt-3" id="btnSave" type="submit" name="save" ><i class="fa-solid fa-plus"></i>Save</button>
        </form>
    </div>
    
    <script src="main.js"></script>
</body>

</html>