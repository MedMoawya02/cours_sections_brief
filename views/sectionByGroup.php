
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
        table{
            text-align: center;
        }
        td a{
            text-decoration: none;
            color: #fff;
        }
        .btn{
            color: #fff;
            text-decoration: none;
        }
    </style>
<body>
    <div class="container my-5">
        <h1>All Sections:</h1>
        <table class="table table-hover mt-3">
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
            <?php 
                if($result->num_rows > 0) {
                    while($row=$result->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $row['id_section'] ?></td>
                                <td><?php echo $row['title_section']?></td>
                                <td><?php echo $row['content_section'] ?></td>
                                <td><?php echo $row['position']?></td>
                                <td>
                                    <a href="#" class="btn btn-success">Edit</a>
                                    <a href="deleteSection.php?section_id=<?= $row['id_section']?>&course_id=<?= $row['course_id']?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php
                    }
                }else{
                    ?>
                    <tr>
                         <td colspan="4" style="text-align: center;">No section for this course.</td>
                    </tr>
                    <?php
                }
            ?>

        </table>
    </div>
</body>

</html>