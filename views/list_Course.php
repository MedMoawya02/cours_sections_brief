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
        }

        td a {
            text-decoration: none;
            color: #fff;
        }

        .btn {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <a href="create.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i>New course</a>
        <table class="table table-hover mt-3">
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Level</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($courses && $courses->num_rows > 0) {
                while ($row = $courses->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['course_id'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['niveu'] ?></td>
                        <td><a href="courses_edit.php?id=<?php echo $row["course_id"] ?>" class="btn btn-success">Edit</a>
                            <button class="btn btn-danger"><a
                                    href="destroy.php?id=<?php echo $row['course_id'] ?>">Delete</a></button>
                            <a href="section_by_group.php?course_id=<?php echo $row['course_id'] ?>"
                                class="btn btn-primary">Sections</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4" style="text-align: center;">No records found.</td>
                </tr>
                <?php
            }
            ?>

        </table>
    </div>
</body>

</html>