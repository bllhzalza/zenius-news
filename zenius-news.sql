-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2022 pada 10.07
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zenius-news`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'bllhzalza', 'zalzahood');

-- --------------------------------------------------------

--
-- Struktur dari tabel `author`
--

CREATE TABLE `author` (
  `id_author` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `author`
--

INSERT INTO `author` (`id_author`, `name`) VALUES
(1, 'Erliandra O. E.'),
(2, 'Farista Sachika'),
(3, 'Budi Budiman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(1, 'Sports'),
(2, 'Geography'),
(3, 'Entertainment '),
(6, 'Technology'),
(7, 'Business');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_news`
--

CREATE TABLE `detail_news` (
  `id` int(11) NOT NULL,
  `title_news` int(11) NOT NULL,
  `author_news` int(11) NOT NULL,
  `article` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `img` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_news`
--

INSERT INTO `detail_news` (`id`, `title_news`, `author_news`, `article`, `date`, `time`, `img`) VALUES
(3, 3, 1, 'NCT 127 akan kembali melanjutkan rangkain konser tur dunia kedua mereka bertajuk \"Neo City: The Link.\" Kali ini, boy group di bawah naungan SM Entertainment itu akan mengunjungi Bangkok dan mengadakan konser selama tiga hari berturut-turut. Mengutip dari akun Twitter resmi NCT 127 @NCTsmtown_127 pada Jum\'at (14/10/2022), konser dengan judul \"Neo City: Bangkok -The Link\" itu akan diadakan pada tanggal 3 Desember 2022, pukul 18.00 ICT; tanggal 4 Desember 2022, pukul 18.00 ICT; dan terakhir tanggal 5 Desember 2022, pukul 16.00 ICT. Konser akan dilaksanakan di Impact Arena. Para penggemar dapat melakukan pembelian tiket melalui counter service di seluruh cabang nasional dan melalui website www.allticket.com. Dengan diumumkannya jadwal konser \"Neo City: Bangkok - The Link\" Bangkok menjadi kota selanjutnya setelah Jakarta pada 4-5 November 2022, yang akan dikunjungi oleh NCT 127 dalam rangkaian konser tur dunia kedua mereka. Sementara itu, NCT 127 baru saja menyelesaikan konser tur dunia kedua mereka di Amerika Serikat dengan mengadakan konser di dua tempat, yakni Los Angeles pada tanggal 6 Oktober 2022, dan Newark pada tanggal 13 Oktober 2022.\r\nNCT 127 akan melanjutkan konser mereka di Seoul, bertajuk \"Neo City: Seoul - The Link+\" pada tanggal 22-23 Oktober 2022 mendatang, bertempat di Jamsil Olympic Stadium, venue konser paling besar di Korea Selatan.', '2022-12-15', '18:25:00', 'konser.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `conclusion` text NOT NULL,
  `category_news` int(11) NOT NULL,
  `image` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id_news`, `title`, `conclusion`, `category_news`, `image`) VALUES
(1, 'Hasil Piala Dunia 2022: Jepang dan Korea Angkat Koper!', 'Piala Dunia 2022 menampilkan laga antara Jepang vs Kroasia dan Brasil vs Korea Selatan di babak 16 besar. Hasilnya, dua raksasa Asia harus angkat koper dari Qatar. Dilansir dari NEWS, Jepang menghadapi Kroasia yang digelar lebih dulu di Stadion Al Janoub, ...', 1, 'bola.jpeg'),
(2, 'Update Gempa Cianjur: Korban Meninggal Bertambah Jadi 344 Orang', 'Pemerintah Kabupaten Cianjur, Jawa Barat menyatakan jumlah korban meninggal dunia akibat gempa bertambah menjadi 331 orang. Hal itu disampaikan Bupati Cianjur Herman Suherman...', 2, 'gempa.jpg'),
(3, 'NCT 127 Gelar Konser “Neo City: The Link” di Bangkok Selama 3 Hari Berturut-Turut', 'NCT 127 akan kembali melanjutkan rangkain konser tur dunia kedua mereka bertajuk “Neo City: The Link.” Kali ini, boy group di bawah naungan SM Entertainment..', 3, 'nct.jpg'),
(4, 'ONEUS Rilis Jadwal Tur Konser “REACH FOR US” di Amerika', 'Pada Sabtu (22/10/2022), ONEUS merilis jadwal tur konser mendatang mereka yang bertajuk “REACH FOR US” di Amerika Serikat.  Rencananya memulai tur konser “REACH FOR US” di Amerika Serikat pada awal tahun 2023 mendatang di New York...', 3, 'konser.jpg'),
(5, 'Faktanya, Messi Nggak Pernah Kalahin Mbappe', 'Argentina vs Prancis akan tersaji di final Piala Dunia 2022. Sudah tiga kali duel Messi vs Mbappe tercipta sebelumnya, La Pulga susah menang! Final Piala Dunia 2022 mempertemukan Argentina vs Prancis...', 1, 'fifa_worldcup.jpg'),
(8, 'Banjir di Natuna Meluas 4 Kecamatan, 1200 Orang Mengungsi', 'Banjir yang merendam Kabupaten Natuna, Kepulauan Riau meluas menjadi empat kecamatan. 1.200 orang dilaporkan mengungsi dan satu rumah milik warga rusak akibat terendam banjir. Kepala BPBD Kabupaten Natuna, Raja Darmika mengatakan awalnya...', 2, 'banjir.jpg'),
(9, 'Pakar Bongkar Identitas Penipu Modus Kurir Kirim Foto: Orang IT', 'Identitas penipu dengan modus kurir mengirim foto paket via WhatsApp terbongkar lewat penelusuran jejak digital. Tekniknya tak jauh dari aplikasi ilegal yang bisa mengakses SMS untuk mendapatkan one time password (OTP) korban...', 6, 'teknologi.jpg'),
(10, 'Catat! Ini 21 Penyakit yang Tak Ditanggung BPJS Kesehatan', 'BPJS Kesehatan merupakan layanan asuransi yang disiapkan pemerintah untuk masyarakat Indonesia. Pemerintah berharap masyarakat dapat mengakses dan mendapatkan fasilitas kesehatan dengan mudah dan murah...', 7, 'bpjs.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Zalza', 'zalzabillah2000@gmail.com', '088975738358'),
(5, 'Salsa', 'bilahzalza@gmail.com', '08159084321');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `detail_news`
--
ALTER TABLE `detail_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title_news` (`title_news`),
  ADD KEY `author_news` (`author_news`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `category_news` (`category_news`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `detail_news`
--
ALTER TABLE `detail_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_news`
--
ALTER TABLE `detail_news`
  ADD CONSTRAINT `detail_news_ibfk_1` FOREIGN KEY (`title_news`) REFERENCES `news` (`id_news`),
  ADD CONSTRAINT `detail_news_ibfk_2` FOREIGN KEY (`author_news`) REFERENCES `author` (`id_author`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_news`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
