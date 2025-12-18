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
    <style>
    body {
        background-color: #f5f7fa;
        font-family: 'Segoe UI', sans-serif;
    }

    h1 {
        font-weight: 600;
        margin-bottom: 1.5rem;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    label {
        font-weight: 500;
    }

    .form-control,
    .form-select {
        border-radius: 8px;
    }

    .input-group-text {
        background-color: #0d6efd;
        color: #fff;
        border-radius: 8px 0 0 8px;
    }

    textarea.form-control {
        border-radius: 0 8px 8px 0;
    }

    .btn {
        border-radius: 8px;
        padding: 8px 16px;
        font-size: 14px;
    }

    .btn i {
        margin-right: 6px;
    }

    a.btn {
        color: #fff;
        text-decoration: none;
    }

    .btn-danger a {
        color: #fff;
        text-decoration: none;
    }
</style>

</style>
<body>

    <div class="container my-5">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="mb-0">✏️ Edit Course</h1>
                    <a href="index.php?action=list" class="btn btn-danger">
                        <i class="fa-solid fa-left-long"></i> Back
                    </a>
                </div>

                <form action="index.php?action=update" method="post">

                    <input type="hidden" name="id" value="<?= $course['course_id'] ?>">

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" placeholder="Course title"
                               name="title" value="<?= $course['title'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="4"
                                  name="description" required><?= $course['description'] ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Level</label>
                        <select class="form-select" name="level" required>
                            <option selected><?= $course['niveu'] ?></option>
                            <option value="Débutant">Débutant</option>
                            <option value="Intermédiaire">Intermédiaire</option>
                            <option value="Avancé">Avancé</option>
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn btn-primary" type="submit" name="edit">
                            <i class="fa-solid fa-save"></i> Update Course


</html>