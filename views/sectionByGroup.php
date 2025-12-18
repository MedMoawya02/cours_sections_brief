
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
        margin: 1.5rem 0;
        font-weight: 600;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .table {
        margin-bottom: 0;
    }

    .table thead {
        background-color: #0d6efd;
        color: #fff;
    }

    .table th,
    .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table tbody tr:hover {
        background-color: #f1f5ff;
    }

    .btn {
        border-radius: 8px;
        padding: 6px 12px;
        font-size: 14px;
    }

    a.btn {
        color: #fff;
        text-decoration: none;
    }

    .actions .btn {
        margin: 2px;
    }
</style>

<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="mb-0">📑 All Sections</h1>
                    <a href="index.php?action=list" class="btn btn-secondary">
                        <i class="fa-solid fa-left-long"></i> Back to Courses
                    </a>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Position</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $row['id_section'] ?></td>
                                    <td><?= $row['title_section'] ?></td>
                                    <td><?= $row['content_section'] ?></td>
                                    <td><?= $row['position'] ?></td>
                                    <td class="actions">
                                        <a href="editSection.php?section_id=<?= $row['id_section'] ?>" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="deleteSection.php?section_id=<?= $row['id_section'] ?>&course_id=<?= $row['course_id'] ?>"
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Delete this section?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No section for this course.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>


</html>