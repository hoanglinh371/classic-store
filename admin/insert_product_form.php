<?php
    require_once '../configs/connect.php';
    $sql = "SELECT * FROM directories";
    $directories = mysqli_query($connect, $sql);
?>

<form method="post" action="./insert_product_process.php">
    <div>
        <label for="product_directory">Product Directory</label>
        <select id="product_directory" name="directory_id">
            <?php foreach ($directories as $directory) { ?>
                <option value="<?php echo $directory['id'] ?>"><?php echo $directory['title'] ?></option>
            <?php } ?>
        </select>
    </div>

    <div>
        <label for="product_name">Product Name</label>
        <input type="text" id="product_name" name="name">
    </div>
    
    <div>
        <label for="product_image_url">Product Image URL</label>
        <input type="text" id="product_image_url" name="image_url">
    </div>
    
    <div>
        <label for="product_price">Product Price</label>
        <input type="number" id="product_price" name="price">
    </div>

    <button type="submit">Add</button>
</form>

<?php mysqli_close($connect); ?>