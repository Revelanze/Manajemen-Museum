<?php
session_start();

include "../config/koneksi.php";

require_once "../vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);

$mulai = $_GET['mulai'] ?? "";
$selesai = $_GET['selesai'] ?? "";

$sql = "
SELECT tiket.*, pengunjung.nama
FROM tiket
JOIN pengunjung
ON tiket.id_pengunjung=pengunjung.id_pengunjung
";

if($mulai!="" && $selesai!=""){
    $sql .= " WHERE tanggal BETWEEN '$mulai' AND '$selesai' ";
}

$sql .= " ORDER BY tanggal DESC";

$data=mysqli_query($conn,$sql);

$html='

<h2 align="center">

LAPORAN TIKET MUSEUM NUSANTARA

</h2>

<hr>

<table border="1" cellspacing="0" cellpadding="6" width="100%">

<tr>

<th>No</th>

<th>Nama</th>

<th>Tanggal</th>

<th>Jenis</th>

<th>Jumlah</th>

<th>Total</th>

</tr>

';

$no=1;

while($d=mysqli_fetch_assoc($data)){

$html.='

<tr>

<td>'.$no++.'</td>

<td>'.$d['nama'].'</td>

<td>'.$d['tanggal'].'</td>

<td>'.$d['jenis_tiket'].'</td>

<td>'.$d['jumlah'].'</td>

<td>Rp '.number_format($d['total']).'</td>

</tr>

';

}

$html.='

</table>

<br><br>

Dicetak :

'.date("d-m-Y H:i").'

';

$dompdf->loadHtml($html);

$dompdf->setPaper("A4","portrait");

$dompdf->render();

$dompdf->stream("laporan_museum.pdf",["Attachment"=>false]);