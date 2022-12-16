<?php 
include '../../connect.php';
$id_news = $_GET['id'];
    $sql = "DELETE FROM news WHERE id_news='$id_news'";
    $datas = $conn->query($sql);
    
    if (mysqli_affected_rows($conn) > 0) {
        header("location:index.php");
    } else{
        $_SESSION['error'] = "Menghapus data gagal!";
    }
    ?>