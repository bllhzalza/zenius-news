<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"
        integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
        integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.css"
        integrity="sha512-V0+DPzYyLzIiMiWCg3nNdY+NyIiK9bED/T1xNBj08CaIUyK3sXRpB26OUCIzujMevxY9TRJFHQIxTwgzb0jVLg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.js"
        integrity="sha512-9rxMbTkN9JcgG5euudGbdIbhFZ7KGyAuVomdQDI9qXfPply9BJh0iqA7E/moLCatH2JD4xBGHwV6ezBkCpnjRQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION['status']) != "login") {
        header("location:/project/admin");
    }
    if (isset($_POST['submit'])) {
        session_destroy();
        header("location:/project/admin/index.php");
    }
    include '../../connect.php';

    $sql = "SELECT * FROM users";
    $datas = $conn->query($sql);

    ?>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg p-3 border-bottom" style="background-color: #AFEEEE">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="#">
                ADMIN PANEL
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse"
                data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-12 col-md-4 col-lg-2">
            <input class="form-control form-control-dark" type="text" placeholder="Search" aria-labels="Search">
        </div>
        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Selamat Datang,
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <form id="logout_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <button class="dropdown-item" type="submit" name="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- navbar 2-->
    <div class="container-fluid">
        <div class="row">

            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse border-end"
                style="background-color: #AFEEEE;">
                <div class="position-sticky">
                    <ul class="nav flex-coloumn pt-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/project/admin"
                                style="color: #000000;">
                                <i class="bi bi-house-door-fill px-2"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/project/admin/users"
                                style="color: #000000;">
                                <i class="bi bi-person-circle px-2"></i>
                                <span>User</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/project/admin/author"
                                style="color: #000000;">
                                <i class="bi bi-pencil-square px-2"></i>
                                <span>Author</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/project/admin/category"
                                style="color: #000000;">
                                <i class="bi bi-tags-fill px-2"></i>
                                <span>Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/project/admin/news"
                                style="color: #000000;">
                                <i class="bi bi-newspaper px-2"></i>
                                <span>News</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/project/admin/detail-berita"
                                style="color: #000000;">
                                <i class="bi bi-newspaper px-2"></i>
                                <span>Detail News</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>


            <!-- isi board -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/project/admin/users">Pengguna</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Overview</li>
                    </ol>
                </nav>
                <h1 class="h2">Daftar Pengguna</h2>
                    <p>Ini adalah halaman beranda User. Anda bisa melihat dan menghapus data
                        user.</p>
                    <div class="card">
                        <div class="card-body">
                            <a href="create.php" class="btn btn-sm btn-primary mb-4" style="color:white;">Tambah
                                User</a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    foreach ($datas as $key => $data) {
                                        echo '
                                        <tr>
                                            <td>'.($key + 1).'</td>
                                            <td>'.$data['name'].'</td>
                                            <td>'.$data['email'].'</td>
                                            <td>'.$data['phone'].'</td>
                                            <td>
                                                <a href="show.php?id='.$data['id'].'" class="btn btn-sm btn-primary button-blue" style="color: white;">Lihat</a>
                                                <a href="delete.php?id='.$data['id'].'" class="btn btn-sm btn-primary" style="color: white;">Hapus</a>
                                            </td>
                                        </tr>   
                                         ';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <footer class="pt-5 d-flex justify-content-between">
                        <span>Copyright @ 2022 <a href="#">News.com</a></span>
                        <ul class="nav m-0">
                            <li class="nav-link text-secondary" href="#">Hubungi Kami</li>
                        </ul>
                    </footer>
            </main>
        </div>
    </div>
    <?php
    unset($_SESSION['error']);
    ?>
</body>

</html>