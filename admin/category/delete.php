<?php 
include '../../connect.php';
$id_category = $_GET['id'];
    $sql = "DELETE FROM category WHERE id_category='$id_category'";
    $datas = $conn->query($sql);
    
    if (mysqli_affected_rows($conn) > 0) {
        header("location:index.php");
    } else{
        $_SESSION['error'] = "Menghapus data gagal!";
    }
    ?>