<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .dashboard-card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
            transition: transform .2s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: #fff;
        }

        h2 {
            font-weight: 600;
        }
    </style>
</head>

<body>
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
        <h2 class="mb-4">📊 Dashboard</h2>

        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-md-3">
                <div class="card dashboard-card p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Total Courses</p>
                            <h4><?php echo $nbrOfCourses?></h4>
                        </div>
                        <div class="icon-box bg-primary">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-3">
                <div class="card dashboard-card p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Total users</p>
                            <h4><?php echo $nbrOfUsers ?></h4>
                        </div>
                        <div class="icon-box bg-danger">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
    <div class="col-md-6">
    <div class="card dashboard-card p-3">
        <div class="card-body">
            <h6 class="mb-3 text-muted">
                📊 Inscriptions par cours
            </h6>

            <table class="table table-sm table-hover mb-0">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th class="text-end">Inscriptions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $nbrInscriByGrp->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['title']) ?></td>
                            <td class="text-end">
                                <span class="badge bg-warning text-dark">
                                    <?= $row['COUNT(enrollments.userId)']; ?>
                                </span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>


            <!-- Card 4 -->
            <div class="col-md-3">
                <div class="card dashboard-card p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Users</p>
                            <h4>20</h4>
                        </div>
                        <div class="icon-box bg-danger">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-3">
                <div class="card dashboard-card p-3">
                    <p class="text-muted mb-1">Enrollments</p>
                    <h4>45</h4>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-md-3">
                <div class="card dashboard-card p-3">
                    <p class="text-muted mb-1">Completed Courses</p>
                    <h4>8</h4>
                </div>
            </div>

            <!-- Card 7 -->
            <div class="col-md-3">
                <div class="card dashboard-card p-3">
                    <p class="text-muted mb-1">Pending Courses</p>
                    <h4>3</h4>
                </div>
            </div>

            <!-- Card 8 -->
            <div class="col-md-3">
                <div class="card dashboard-card p-3">
                    <p class="text-muted mb-1">Admins</p>
                    <h4>2</h4>
                </div>
            </div>

            <!-- Card 9 -->
            <div class="col-md-6">
                <div class="card dashboard-card p-3">
                    <p class="text-muted mb-1">Last Login</p>
                    <h5><?= date("d M Y - H:i") ?></h5>
                </div>
            </div>

            <!-- Card 10 -->
            <div class="col-md-6">
                <div class="card dashboard-card p-3">
                    <p class="text-muted mb-1">System Status</p>
                    <h5 class="text-success">Online</h5>
                </div>
            </div>

        </div>
    </div>

</body>

</html>