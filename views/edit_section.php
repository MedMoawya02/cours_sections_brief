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

    .form-control {
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
</style>

<body>

    <div class="container my-5">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>✏️ Edit Section</h1>
                    <a href="sections.php?course_id=<?= $section['course_id'] ?>" class="btn btn-secondary">
                        <i class="fa-solid fa-left-long"></i> Back to Sections
                    </a>
                </div>

                <form action="updateSection.php" method="post">

                    <input type="hidden" name="id" value="<?= $section['id_section'] ?>">
                    <input type="hidden" name="course_id" value="<?= $section['course_id'] ?>">

                    <div class="mb-3">
                        <label class="form-label">Section Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title..."
                            value="<?= $section['title_section'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea class="form-control" rows="4" name="content"
                            required><?= $section['content_section'] ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Position</label>
                        <input type="number" class="form-control" name="position" value="<?= $section['position'] ?>"
                            min="1" required>
                    </div>

                    <button class="btn btn-primary" type="submit" name="edit">
                        <i class="fa-solid fa-save"></i> Update Section
                    </button>

                </form>

            </div>
        </div>
    </div>

</body>


</html>