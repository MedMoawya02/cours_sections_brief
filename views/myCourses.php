<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
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

    .nav-link {
        color: #374151;
    }

    .nav-link:hover {
        color: #0d6efd;
    }

    .nav-link.active {
        color: #0d6efd;
        font-weight: 600;
    }
</style>


<body style="background:#f5f7fa">
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand fw-bold" href="index.php?action=list">
                📚 CoursesApp
            </a>

            <!-- Navigation links -->
            <ul class="navbar-nav ms-4 d-flex flex-row gap-3">
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="index.php?action=statistiques">
                        Acceuill
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="index.php?action=list">
                        All Courses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="index.php?action=myCourses&user=<?php echo $userId ?>">
                        My Courses
                    </a>
                </li>
            </ul>

            <!-- Right side -->
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
<div class="container my-5">
    <div class="card shadow-sm rounded-3">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="mb-0">📚 My Courses</h1>
                <a href="index.php?action=list" class="btn btn-secondary btn-sm">
                    <i class="fa fa-arrow-left"></i> All Courses
                </a>
            </div>

            <?php if (!empty($_SESSION['messageInscription'])): ?>
                <div class="alert alert-primary text-center">
                    <?= htmlspecialchars($_SESSION['messageInscription']) ?>
                </div>
                <?php unset($_SESSION['messageInscription']); ?>
            <?php endif; ?>

            <table class="table table-hover text-center align-middle">
                <thead >
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($courses && $courses->num_rows > 0): ?>
                        <?php while ($row = $courses->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['course_id'] ?></td>
                                <td><?= htmlspecialchars($row['title']) ?></td>
                                <td><?= htmlspecialchars($row['description']) ?></td>
                                <td><?= htmlspecialchars($row['niveu']) ?></td>
                                <td>
                                    <a href="index.php?action=unsubscribe&course_id=<?= $row['course_id'] ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Unsubscribe from this course ?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No courses subscribed yet.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</body>
</html>
