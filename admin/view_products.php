<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/index.css?v=5">
    <title>Classic Store</title>
</head>

<body>
    <?php
        require_once '../configs/connect.php';

        // Get all directories
        $sql = "SELECT * FROM directories";
        $directories = mysqli_query($connect, $sql);

        // Filter
        $search = $_GET['search'] ?? '';
        $category = $_GET['category'] ?? '';

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
        $sql = "SELECT products.*, directories.title
                FROM products
                INNER JOIN directories
                ON directories.id = products.directory_id
                WHERE name LIKE '%$search%'
                LIMIT $product_per_page
                OFFSET $skip";
        $products = mysqli_query($connect, $sql);
    ?>

    <div class="admin-layout">
        <div class="header">
            <?php require_once '../components/header.php'; ?>
        </div>
        <div class="sidebar">
            <?php require_once '../components/sidebar.php'; ?>
        </div>
        <div class="main">
            <div class="filters-container">
                <form method="get" style="display: flex; justify-content: space-between; gap: 30px">
                    <div class="input-group mb-3">
                        <label for="search" class="input-group-text">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </label>
                        <input type="text" id="search" class="form-control" name="search" placeholder="Search here...">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="category-filter">
                            <i class="fa-solid fa-filter"></i>
                        </label>
                        <select class="form-select" id="category-filter">
                            <option selected>All</option>
                            <?php foreach ($directories as $directory) { ?>
                                <option value="<?php echo $directory['id'] ?>">
                                    <?php echo ucfirst($directory['title']) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </form>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#add-product-modal">
                    <i class="fa-solid fa-plus"></i>
                    <span>Add New Product</span>
                </button>
            </div>
            <table class="table table-bordered table-striped align-middle text-center">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Directory</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th colspan="2">Actions</th>
                </tr>
                <?php foreach ($products as $index => $product) { ?>
                    <tr>
                        <td><?php echo $index + 1 ?></td>
                        <td><?php echo $product['name'] ?></td>
                        <td><?php echo ucfirst($product['title']) ?></td>
                        <td><?php echo '$' . $product['price'] ?></td>
                        <td>
                            <img src="<?php echo $product['image_url'] ?>" alt="<?php echo $product['name'] ?>"
                                 width="90"
                                 height="105">
                        </td>
                        <td>
                            <?php echo date("d/m/Y h:i A", strtotime($product['created_at'])) ?>
                        </td>
                        <td>
                            <?php echo date("d/m/Y h:i A", strtotime($product['updated_at'])) ?>
                        </td>
                        <td>
                            <span
                                title="Edit"
                                data-id="<?php echo $product['id'] ?>"
                                id="edit-product-button"
                                data-bs-toggle="modal"
                                data-bs-target="#editProduct"
                            >
                                <i class="fa-solid fa-pencil"></i>
                            </span>
                        </td>
                        <td>
                            <span
                                title="Delete"
                                data-id="<?php echo $product['id'] ?>"
                                id="delete-product-button"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteProduct"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </span>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link">
                            <i class="fa-solid fa-angles-left"></i>
                        </a>
                    </li>
                    <?php for ($i = 0; $i < $total_pages; $i++) { ?>
                        <li class="page-item">
                            <a
                                class="page-link"
                                href="?page=<?php echo $i + 1 ?>&search=<?php echo $search ?>">
                                <?php echo $i + 1 ?>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Add Modal -->
    <div
        class="modal fade"
        id="add-product-modal"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add-product-form" method="post">
                        <div class="input-group mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="name" name="product_name"
                                placeholder="Product Name"
                                aria-label="Product Name"
                            />
                        </div>
                        <div class="input-group mb-3">
                            <select class="form-select" name="product_category_id" aria-label="Category">
                                <?php foreach ($directories as $directory) { ?>
                                    <option value="<?php echo $directory['id'] ?>">
                                        <?php echo ucfirst($directory['title']) ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input
                                type="text"
                                class="form-control"
                                name="product_image_url"
                                placeholder="Image URL"
                                aria-label="Image URL"
                            />
                        </div>
                        <div class="input-group mb-3">
                            <input
                                type="text"
                                class="form-control"
                                name="product_price"
                                placeholder="Price"
                                aria-label="Price"
                            />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="add-product-form" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div
        class="modal fade"
        id="editProduct"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
    >
        <?php
            require_once '../configs/connect.php';
        ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-product-form" method="post">
                        <input type="hidden" name="product_id">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Product Name</span>
                            <input
                                type="text"
                                class="form-control"
                                name="product_name"
                                placeholder="Product Name"
                                aria-label="Product Name">
                        </div>
                        <div class="input-group mb-3">
                            <select class="form-select" name="product_category_id" aria-label="Category">
                                <?php foreach ($directories as $directory) { ?>
                                    <option value="<?php echo $directory['id'] ?>">
                                        <?php echo ucfirst($directory['title']) ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Image Url</span>
                            <input
                                type="text"
                                class="form-control"
                                name="product_image_url"
                                placeholder="Image URL"
                                aria-label="Image URL"
                            />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="product_price" placeholder="Price"
                                   aria-label="Price">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="edit-product-form" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div
        class="modal fade"
        id="deleteProduct"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="delete-product-form">
                        <input type="hidden" name="product_id">
                    </form>
                    <p>Are you want to delete it?</p>
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="delete-product-form" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <?php mysqli_close($connect) ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/js/script.js" type="text/javascript"></script>
</body>

</html>
