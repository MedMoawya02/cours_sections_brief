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
    <title>Section</title>
</head>

<body>

    <div class="container my-5">
        <h1>Edit section :</h1>
        <form action="updateSection.php" method="post">

            <div class="mb-3">
                <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="Title..." name="id" value="<?= $section['id_section']?>">
                <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="Title..." name="course_id" value="<?= $section['course_id']?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Title:</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Title..." name="title" value="<?= $section['title_section']?>">
            </div>

            <div class="input-group">
                <span class="input-group-text">Content</span>
                <textarea class="form-control" aria-label="With textarea" name="content"><?= $section['content_section']?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Position:</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Position..." name="position" value="<?= $section['position']?>">
            </div>
            
            <button class="btn btn-secondary mt-3" id="btnSave" type="submit" name="edit"><i
                    class="fa-solid fa-plus"></i>Edit</button>
        </form>
    </div>

</body>

</html>