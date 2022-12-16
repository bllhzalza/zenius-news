<?php
ob_start();
include "../../connect.php";

$sql = "SELECT * FROM detail_news
JOIN news ON detail_news.title_news = news.id_news
JOIN author ON detail_news.author_news = author.id_author";

  $datas = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
    <style>
        td {
            text-align: center;
        }

        table,
        tr,
        th,
        td {
            padding: 8px 20px;
            border: 1px solid #999;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h2 style="text-align:center">TABEL DETAIL BERITA</h2>
    <table>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Article</th>
            <th scope="col">date</th>
            <th scope="col">time</th>
            <th scope="col">image</th>
        </tr>
        <?php foreach ($datas as $data): ?>
        <?php
        $date = date_create($data['date']);
        $time = date_create($data['time']);
        ?>
        <?php foreach ($datas as $data): ?>
        <tr>
            <td><?php echo $data['title']; ?></td>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['article']; ?></td>
            <td>
                <?php echo date_format($date, "d M Y"); ?>
            </td>
            <td>
                <?php echo date_format($time, "G:i"); ?>
            </td>
            <td><img src="image/<?php echo $data['img']; ?>" width="100"></td>
        </tr>
        <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>

<?php 
require '../../mpdf/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4',
    'orientation' => 'landscape',
    'margin-top' => '25',
    'margin-bottom' => '25',
    'margin-left' => '25',
    'margin-right' => '25'
]);

$html = ob_get_contents();

ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));

$content = $mpdf->Output("tugas1.pdf", "");

?>