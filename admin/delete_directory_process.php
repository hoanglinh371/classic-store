<?php
    require_once '../configs/connect.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM directories WHERE id = '$id'";
    mysqli_query($connect, $sql);
    mysqli_close($connect);
