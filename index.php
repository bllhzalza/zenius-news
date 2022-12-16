<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEBSITE BERITA</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"
    integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
    integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php 

  
include 'connect.php';

$sql = "SELECT * FROM news
JOIN category ON news.category_news = category.id_category";

if (isset($_POST['filter_submit'])) {
  if ($_POST['category'] !== "") {
    $sql = "SELECT * FROM news 
    JOIN category ON news.category_news = category.id_category WHERE news.category_news = " . $_POST['category'];
  }
}

$articles = $conn->query($sql);
$category_sql = "SELECT * FROM category";
$categorys = $conn->query($category_sql);
  ?>


  <!-- topbar -->
  <div class="top-bar">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <div class="col-md-2">
          <a class="navbar-brand" href="#">
            <i class="bi bi-globe" style="font-size: 45px; color: cornflowerblue;"> NEWS</i>
          </a>
        </div>
        <div class="col-md-6">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form" role="search" method="post">
            <select class="form-select" aria-label="Default select example" name="category">
              <option value="">Category</option>
              <?php foreach ($categorys as $category): ?>
              <option value="<?php echo ($category['id_category']) ?>">
                <?php echo ($category['category']) ?>
              </option>
              <?php endforeach; ?>
            </select>
            <button class="button1 bi-search" name="filter_submit"></button>
          </form>
        </div>
        <div class="col-md-3">
          <button type="button" class="button2">Sign Up</button>
          <a href="/project/admin/index.php"><button type="button" class="button2">Log In</button></a>
        </div>
      </div>
    </nav>
  </div>

  <!-- navbar -->
  <div class="nav-bar">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <div class="col-md-10">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="detail.php">Single Page</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="#">Bookmarks</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="#">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2">
          <div class="tb-social">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-youtube"></i></a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <!-- kartu berita -->
  <div class="card-top">
    <div class="container">
      <div class="row">
        <div class="col-3">
          <div class="card">
            <img class="card-img-top" src="./img/gempa.jpg" alt="Card image">
            <div class="card-body">
              <p class="card-title">
                Gempa Magnitudo 6,2 Guncang Jember Jatim, Tak Berpotensi Tsunami</p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card">
            <img class="card-img-top" src="./img/fifa_worldcup.jpg" alt="Card image">
            <div class="card-body">
              <p class="card-title">
                Prediksi 8 Besar Piala Dunia 2022 : Yang ke Semi Final Adalah...</p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card">
            <img class="card-img-top" src="./img/teknologi.jpg" alt="Card image">
            <div class="card-body">
              <p class="card-title">
                Pakar Bongkar Identitas Penipu Modus Kurir Kirim Foto: Orang IT</p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card">
            <img class="card-img-top" src="./img/kpop.jpg" alt="Card image">
            <div class="card-body">
              <p class="card-title">
                ONEUS Rilis Jadwal Tur Konser “REACH FOR US” di Amerika</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- carousel berita -->
  <div class="carousel-top">
    <div id="carouselExampleIndicators" class="carousel slide py-4" data-bs-ride="true">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./img/fifa_worldcup.jpg" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
          <img src="./img/gempa.jpg" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
          <img src="./img/konser.jpg" class="d-block w-100" alt="">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <!-- isi berita -->
  <div class="container py-3">
    <div class="row">
      <h1 class="title">HOT NEWS !</h1>
    </div>
  </div>

  <!-- isi berita -->
  <div class="container px-0">
    <div class="row">
      <div class="col-8 col-md-8">
        <?php
foreach 
($articles as $article): ?>
        <div class="berita1">
          <div class="container border-bottom mb-5">
            <div class="col mb-2">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="./img/<?php echo $article['image'] ?>" class="img-fluid rounded-start" alt="">
                </div>
                <div class="col-md-8">
                  <div class="card-body ms-2">
                    <h2 class="card-title">
                      <a href="#">
                        <?php echo $article['title']; ?>
                      </a>
                    </h2>
                    <p class="card-text">
                      <?php echo $article['conclusion']; ?>
                    </p>
                    <a class="card-footer" href="#">
                      <?php echo $article['category']; ?>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="col-4 col-md-4">
        <table class="table table-bordered">
          <thead class="table-dark">
            <tr>
              <th scope="col">
                <h4>#</h4>
              </th>
              <th scope="col">
                <h4>Berita Terpopuler</h4>
              </th>
            </tr>
          </thead>
          <tbody class="table-light">
            <tr>
              <th scope="row">1</th>
              <td>NCT 127 Gelar Konser “Neo City: The Link” di Bangkok Selama 3
                Hari Berturut-Turut</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>ONEUS Rilis Jadwal Tur Konser “REACH FOR US” di Amerika</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Pakar Bongkar Identitas Penipu Modus Kurir Kirim Foto: Orang IT</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td colspan="2">
                Kemendikbud Luncurkan KIP Kuliah Digital 2022, Ini Cara Download</td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td colspan="2">
                Cek Harga Komponen Fast Moving Daihatsu Sigra</td>
            </tr>
            <th scope="row">6</th>
            <td colspan="2">
              Daftar Top Skor dan Top Assist Piala Dunia 2022: Dominasi Lionel Messi</td>
            </tr>
          </tbody>
        </table>
        <table class="table table-bordered mt-5">
          <thead class="table-dark">
            <tr>
              <th scope="col">
                <h4>#</h4>
              </th>
              <th scope="col">
                <h4>Berita Terkini</h4>
              </th>
            </tr>
          </thead>
          <tbody class="table-light">
            <tr>
              <th scope="row">1</th>
              <td>Banjir di Natuna Meluas 4 Kecamatan, 1200 Orang Mengungsi</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Perjalanan Karier Jinni eks NMIXX Sejak Debut hingga Kini</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Catat! Ini 21 Penyakit yang Tak Ditanggung BPJS Kesehatan</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td colspan="2">
                Meghan Markle Pernah Keguguran hingga Terpikir Mengakhiri Hidup</td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td colspan="2">Nggak Sangka! Koin Rupiah Ini Jadi Saksi Bisu Final Piala Dunia Lho</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- footer -->
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-6">
          <i class="bi bi-globe" style="font-size: 80px; color: cornflowerblue;"> NEWS</i>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="contact-info">
            <p style="color: #ffffff; font-size: 24px;"><i class="bi bi-geo-alt-fill"></i>Jalan Sudirman Kav. 43B, SCBD,
              Jakarta Selatan</p>
            <p style="color: #ffffff; font-size: 24px;"><i class="bi bi-envelope-fill"></i>info@example.com</p>
            <p style="color: #ffffff; font-size: 24px;"><i class="bi bi-telephone-fill"></i>021-456-7890</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-md-6">
          <ul class="nav" style="font-size: 24px;">
            <li class="nav-item">
              <a class="nav-link active" href="#" style="color: #ffffff; border: 0;">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color: #ffffff; border: 0;">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color: #ffffff; border: 0;">Personal Policy</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6">
          <p class="text-muted" style="font-size: larger;">News.com ©2022 All Right Reserved</p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>