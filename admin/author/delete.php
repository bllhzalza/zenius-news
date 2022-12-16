<?php 
include '../../connect.php';
$id_author = $_GET['id'];
    $sql = "DELETE FROM author WHERE id_author='$id_author'";
    $datas = $conn->query($sql);
    
    if (mysqli_affected_rows($conn) > 0) {
        header("location:index.php");
    } else{
        $_SESSION['error'] = "Menghapus data gagal!";
    }
    ?>