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

  $sql = "SELECT * FROM detail_news
  JOIN news ON detail_news.title_news = news.id_news
  JOIN author ON detail_news.author_news = author.id_author";
  
  $datas = $conn->query($sql);

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
          <form class="form" style="height: 35px" role="search">
            <input class="form-control" type="search" placeholder="Cari Berita" aria-label="Search">
            <button class="button1 bi-search"></button>
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
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="detail.php">Single Page</a>
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
  <?php foreach ($datas as $data): ?>
  <?php
        $date = date_create($data['date']);
        $time = date_create($data['time']);
        ?>
  <div class="container py-5">
    <div class="row">
      <div class="col-md-8 offset-lg-2">
        <h1>
          <?php echo $data['title']; ?>
        </h1>
        <p class="medium">
          <?php echo $data['name']; ?> - News.com
        </p>
        <p class="small text-muted">Selasa,
          <?php echo date_format($date, "d M Y"); ?>
          <?php echo date_format($time, "G:i"); ?> WIB
        </p>
      </div>
    </div>
    <div class="row py-4">
      <div class="col-md-8 offset-lg-2">
        <img src="./img/nct.jpg" class="img-fluid mx-auto d-block" alt="">
      </div>
    </div>
    <div class="row py-4">
      <div class="col-md-8 offset-lg-2">
        <p style="font-size: 24px;">
          <?php echo $data['article']; ?>
        </p>
      </div>
    </div>
  </div>
  <?php endforeach ?>

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