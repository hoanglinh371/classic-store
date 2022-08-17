<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/index.css?v=3">
    <title>Document</title>
</head>

<body>
    <?php
        require_once '../configs/connect.php';
        
        // Get all users
        $sql = "SELECT users.*, roles.name as role_name
                FROM users
                INNER JOIN roles
                ON users.role_id = roles.id";
        $users = mysqli_query($connect, $sql);
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
                    <th class="">Display Name</th>
                    <th class="">Email</th>
                    <th class="">Role</th>
                    <th class="">Created At</th>
                    <th class="">Updated At</th>
                    <th colspan="2">Actions</th>
                </tr>
                <?php foreach ($users as $index => $user) { ?>
                    <tr>
                        <td><?php echo $index ?></td>
                        <td><?php echo $user['display_name'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['role_name'] ?></td>
                        <td>
                            <?php echo date("d/m/Y", strtotime($user['created_at'])) ?>
                            <?php echo date("h:i A", strtotime($user['created_at'])) ?>
                        </td>
                        <td>
                            <?php echo date("d/m/Y", strtotime($user['updated_at'])) ?>
                            <?php echo date("h:i A", strtotime($user['updated_at'])) ?>
                        </td>
                        <td>
                            <a title="Edit" href="./edit_product.php?id=<?php echo $user['id'] ?>">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <a title="Delete" href="./delete_product_process.php?id=<?php echo $user['id'] ?>">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajax({
                url: 'insert_product_process.php',
                type: 'POST',
                dataType: '',
                data: ''
            }).done(function () {
                console.log('Success');
            })
        })
    </script>
</body>

</html>
