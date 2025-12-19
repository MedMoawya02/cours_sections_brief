<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body style="background:#f5f7fa">

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
                <thead class="table-primary">
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
