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
<style>
    .btn-danger a{
        text-decoration: none;
        color: #ffff;
    }
</style>
<body>

    <div class="container my-5">
        <h1>Edit course :</h1>
        <form action="index.php?action=update" method="post">

            <div class="mb-3">

                <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="Title..." name="id" value="<?= $course['course_id']?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Title:</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Title..." name="title" value="<?= $course['title']?>">
            </div>

            <div class="input-group">
                <span class="input-group-text">Description</span>
                <textarea class="form-control" aria-label="With textarea" name="description"><?= $course['description']?></textarea>
            </div>

            <select class="form-select mt-3" aria-label="Default select example" name="level" >
                <option selected ><?=$course['niveu']?></option>
                <option value="Débutant">Débutant</option>
                <option value="Intermédiaire">Intermédiaire</option>
                <option value="Avancé">Avancé</option>
            </select>
            <button class="btn btn-secondary mt-3" id="btnSave" type="submit" name="edit"><i
                    class="fa-solid fa-plus"></i>Edit</button>
            <button class="btn btn-danger mt-3" id="btnSave" type="button" name="back"><a href="index.php?action=list"><i class="fa-solid fa-left-long"></i>Back</a></button>   
            
        </form>
    </div>

</body>

</html>