<?php
    require_once '../configs/connect.php';
    $sql = "SELECT * FROM directories";
    $directories = mysqli_query($connect, $sql);
?>

<form method="post" action="./insert_product_process.php">
    Directory
    <select name="directory">
        <?php foreach ($directories as $directory) { ?>
            <option value="<?php echo $directory['title'] ?>"><?php echo $directory['title'] ?></option>
        <?php } ?>
    </select>
    Name
    <input type="text" name="name">
    <br />
    Image_URL
    <input type="text" name="image_url">
    <br />
    Price
    <input type="number" name="price">
    <br />

    <button type="submit">Add</button>
</form>

<?php mysqli_close($connect); ?>