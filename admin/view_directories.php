<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/index.css?v=3">
    <title>Document</title>
</head>
<body>
    <?php
        require_once '../configs/connect.php';
        
        // Get all directories
        $sql = "SELECT * FROM directories";
        $directories = mysqli_query($connect, $sql);
    ?>
    
    <div class="admin-layout">
        <div class="header">
            <?php require_once '../components/header.php'; ?>
        </div>
        <div class="sidebar">
            <?php require_once '../components/sidebar.php'; ?>
        </div>
        <div class="main">
            <table class="table table-bordered table-striped align-middle text-center">
                <tr class="">
                    <th class="">#</th>
                    <th class="">Title</th>
                    <th class="">Created At</th>
                    <th class="">Updated At</th>
                    <th colspan="2">Actions</th>
                </tr>
                <?php foreach ($directories as $index => $directory) { ?>
                    <tr>
                        <td><?php echo $index ?></td>
                        <td><?php echo ucfirst($directory['title']) ?></td>

                        <td><?php echo $directory['created_at'] ?></td>
                        <td><?php echo $directory['updated_at'] ?></td>
                        <td>
                            <a title="Edit" href="./edit_directory.php?id=<?php echo $directory['id'] ?>">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <a title="Delete" href="./delete_directory_process.php?id=<?php echo $directory['id'] ?>">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    
    <?php mysqli_close($connect) ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>