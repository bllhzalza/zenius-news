<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"
        integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
        integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
    <?php
session_start();

if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
    header("location:/project/admin/dashboard.php");
    die();
}

include '../connect.php';

if(isset($_POST['username']) && $_POST['password']){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username='$username' and password='$password'";
    $data = $conn->query($sql);

    $check = mysqli_num_rows($data);

    if(isset($_POST['submit'])){
        if($check !=0){
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";
            header("location:/project/admin/dashboard.php");
            die();
        }else{
            $_SESSION['error'] = "Gagal login, silahkan cek kembali username dan password Anda";
        }
    }
}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card my-5">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="card-body p-lg-5"
                        style="background-color: #AFEEEE">
                        <div class="row">
                            <div class="col text-center">
                                <i class="bi bi-globe" style="font-size: 60px; color: cornflowerblue;">HOT NEWS</i>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <p style="font-size: 30px" class="fw-bold">LOGIN</p>
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="username" id="username"
                                        aria-describedby="emailHelp" require placeholder="Username">
                                </div>
                                <div class="mb-2">
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password" require>
                                </div>
                                <p style="color: red; font-size: 12px;">
                                    <?php if(isset($_SESSION['error'])){ echo($_SESSION['error']);} ?>
                                </p>
                                <div class="text-center">
                                    <button type="submit" name="submit"
                                        class="btn btn-primary px-5 mb-5 w-100">Login</button>
                                </div>
                            </div>
                            <div id="emailHelp" class="form-text text-center mb-4 text-dark">
                                Not Registered?
                                <a href="#" class="text-dark fw-bold">Create an Account</a>
                                <br><br>
                                <a href="#" class="text-dark fw-bold">Back to Home</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    unset($_SESSION['error']);
    ?>

</body>

</html>