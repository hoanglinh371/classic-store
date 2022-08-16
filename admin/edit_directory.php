<?php
    require_once '../configs/connect.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM directories WHERE id = '$id'";
    $res = mysqli_query($connect, $sql);
    $directory = mysqli_fetch_array($res);
?>

<form method="post" action="./edit_directory_process.php">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <br>
    Title
    <input type="text" name="title" value="<?php echo $directory['title'] ?>">
    <br>
    Image url
    <input type="text" name="image_url" value="<?php echo $directory['image_url'] ?>">
    
    <button>Edit</button>
</form>