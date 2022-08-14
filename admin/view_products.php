<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <title>Document</title>
</head>

<body>
    <?php
        require_once '../configs/connect.php';
        require_once '../components/header.php';
        
        // Get all directories
        $sql = "SELECT * FROM directories";
        $directories = mysqli_query($connect, $sql);
        
        // Filter
        $search = $_GET['search'] ?? '';
        
        // Paginate
        $page = $_GET['page'] ?? 1;
        $sql = "SELECT * FROM products
                WHERE name LIKE '%$search%'"; // get total products;
        $res = mysqli_query($connect, $sql);
        $total_products = mysqli_num_rows($res);
        $product_per_page = 6;
        $total_pages = ceil($total_products / $product_per_page);
        $skip = $product_per_page * ($page - 1);
        
        // Show products
        $sql = "SELECT products.id, products.name, products.image_url, products.price, directories.title
                FROM products
                INNER JOIN directories
                ON directories.id = products.directory_id
                WHERE name LIKE '%$search%'
                LIMIT $product_per_page
                OFFSET $skip";
        $products = mysqli_query($connect, $sql);
    ?>
    <div class="filters">
        <form method="get">
            <div class="input-group mb-3">
                <label for="search" class="input-group-text">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </label>
                <input type="text" id="search" class="form-control" name="search" placeholder="Search here..."">
            </div>
        </form>
    </div>
    <table class="table table-bordered table-striped align-middle text-center">
        <tr class="">
            <th class="">#</th>
            <th class="">Name</th>
            <th class="">Directory</th>
            <th class="">Price</th>
            <th class="">Image</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php foreach ($products as $index => $product) { ?>
            <tr>
                <td><?php echo $index ?></td>
                <td><?php echo $product['name'] ?></td>
                <td><?php echo ucfirst($product['title']) ?></td>
                <td><?php echo '$' . $product['price'] ?></td>
                <td>
                    <img src="<?php echo $product['image_url'] ?>" alt="<?php echo $product['name'] ?>" width="96"
                         height="112">
                </td>
                <td>
                    <a title="Edit" href="./edit_product.php?id=<?php echo $product['id'] ?>">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                </td>
                <td>
                    <a title="Delete" href="./delete_product_process.php?id=<?php echo $product['id'] ?>">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>
            <?php for ($i = 0; $i < $total_pages; $i++) { ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $i + 1 ?>&search=<?php echo $search ?>">
                        <?php echo $i + 1 ?>
                    </a>
                </li>
            <?php } ?>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
    <?php mysqli_close($connect) ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
