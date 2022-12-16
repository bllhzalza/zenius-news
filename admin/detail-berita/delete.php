<?php 
include '../../connect.php';
$id = $_GET['id'];
    $sql = "DELETE FROM detail_news WHERE id='$id'";
    $datas = $conn->query($sql);
    
    if (mysqli_affected_rows($conn) > 0) {
        header("location:index.php");
    } else{
        $_SESSION['error'] = "Menghapus data gagal!";
    }
    ?>