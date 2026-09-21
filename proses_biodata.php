<?php
$nama = htmlspecialchars($_POST['nama']);
$jk = htmlspecialchars($_POST['jk']);
$hobi = isset($_POST['hobi']) ? $_POST['hobi'] : [];
$agama = htmlspecialchars($_POST['agama']);
$alamat = htmlspecialchars($_POST['alamat']);
$uraian = htmlspecialchars($_POST['uraian']);
echo "<h2>Data Biodata</h2>";
echo "Nama: $nama <br>";
echo "Jenis Kelamin: $jk <br>";
echo "Hobi:<br>";
if (!empty($hobi)) {
foreach ($hobi as $h) {
echo "- " . htmlspecialchars($h) . "<br>";
}
}
else {
echo "Tidak ada hobi yang dipilih<br>";
}
echo "Agama: $agama <br>";
echo "Alamat: $alamat <br>";
echo "Uraian: $uraian <br>";
?>