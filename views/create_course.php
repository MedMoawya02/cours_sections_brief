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

    .section-card {
        background-color: #fff;
        border: 1px solid #e0e6ed;
        border-radius: 10px;
        padding: 15px;
        margin-top: 15px;
    }

    .section-title {
        font-weight: 600;
        margin-bottom: 10px;
        color: #0d6efd;
    }
</style>

<body>

    <div class="container my-5">
        <div class="card">
            <div class="card-body">

                <h1>➕ Add New Course</h1>

                <form action="index.php?action=store" method="post">

                    <div class="mb-3">
                        <label class="form-label">Course Title</label>
                        <input type="text" class="form-control" placeholder="Course title..." name="title" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="4" name="description" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Level</label>
                        <select class="form-select" name="level" required>
                            <option disabled selected>Select level</option>
                            <option value="Débutant">Débutant</option>
                            <option value="Intermédiaire">Intermédiaire</option>
                            <option value="Avancé">Avancé</option>
                        </select>
                    </div>

                    <!-- Sections -->
                    <div class="mt-4">
                        <h5 class="mb-3">📑 Course Sections</h5>
                        <div id="sections"></div>

                        <button class="btn btn-success mt-3" id="btnAddSection" type="button">
                            <i class="fa-solid fa-plus"></i> Add Section
                        </button>
                    </div>

                    <hr class="my-4">

                    <button class="btn btn-primary" type="submit" name="save">
                        <i class="fa-solid fa-save"></i> Save Course
                    </button>

                </form>

            </div>
        </div>
    </div>

    <script>
        let btnAddSection = document.getElementById('btnAddSection');
        let sectionsDiv = document.getElementById('sections');

        btnAddSection.addEventListener('click', () => {
            let div = document.createElement('div');
            div.classList.add('section-card');

            div.innerHTML = `
                <div class="section-title">Section</div>

                <div class="mb-3">
                    <label class="form-label">Section Title</label>
                    <input type="text" class="form-control" placeholder="Section title..." name="SectionTitle[]" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea class="form-control" rows="3" name="content[]" required></textarea>
                </div>

                <div class="mb-2">
                    <label class="form-label">Position</label>
                    <input type="number" class="form-control" name="position[]" min="1" required>
                </div>
            `;

            sectionsDiv.appendChild(div);
        });
    </script>

</body>


</html>