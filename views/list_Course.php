<?php
session_start();
$message = $_SESSION['email'] ?? null;
$message = $_SESSION['username'] ?? null;
unset($_SESSION['message']);
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

    <style>
        table {
            text-align: center;
            margin-top: 2rem;
        }

        td a {
            text-decoration: none;
            color: #fff;
        }

        .btn {
            color: #fff;
            text-decoration: none;
        }

        h1 {
            margin-top: 1rem;
        }
    </style>
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
        vertical-align: middle;
        text-align: center;
    }

    .table tbody tr:hover {
        background-color: #f1f5ff;
    }

    .btn {
        border-radius: 8px;
        padding: 6px 12px;
        font-size: 14px;
    }

    .actions .btn {
        margin: 2px;
    }

    a.btn {
        color: #fff;
        text-decoration: none;
    }

    .navbar {
        border-bottom: 1px solid #e5e7eb;
    }

    .navbar-brand {
        font-size: 1.2rem;
    }

    .btn-logout {
        border: 1px solid #d1d5db;
        color: #374151;
        background-color: #374151;
    }

    .btn-logout:hover {
        background-color: #e5e7eb;
        color: #111827;
    }
</style>

<body>
    <!-- header start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php?action=list">
                📚 CoursesApp
            </a>

            <div class="ms-auto d-flex align-items-center gap-3">
                <?php if (!empty($_SESSION['username'])): ?>
                    <span class="text-muted small">
                        <?= htmlspecialchars($_SESSION['username']) ?>
                    </span>
                <?php endif; ?>

                <a href="index.php?action=logout" class="btn btn-sm btn-logout">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>

            </div>
        </div>
    </nav>

    <!-- header end -->

    <div class="container my-5">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="mb-0">📚 List of Courses</h1>
                    <a href="index.php?action=create" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i> New Course
                    </a>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Level</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($courses && $courses->num_rows > 0): ?>
                            <?php while ($row = $courses->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $row['course_id'] ?></td>
                                    <td><?= $row['title'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td><?= $row['niveu'] ?></td>
                                    <td class="actions">
                                        <a href="index.php?action=edit&id=<?= $row['course_id'] ?>"
                                            class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="index.php?action=destroy&id=<?= $row['course_id'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this course?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="sections.php?course_id=<?= $row['course_id'] ?>" class="btn btn-info btn-sm">
                                            <i class="fa fa-list"></i>
                                        </a>
                                        <a href="index.php?action=subscribe&course_id=<?= $row['course_id'] ?>"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No records found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>