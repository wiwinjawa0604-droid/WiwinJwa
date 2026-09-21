<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css">
<head><title>Silahkan Isi Biodata Anda</title></head>
<body>
<form method="POST" action="proses_biodata.php">
<p>Nama: <input type="text" name="nama" required></p>
<p>Jenis Kelamin:</p>
<input type="radio" name="jk" value="Laki-laki" required> Laki-laki
<input type="radio" name="jk" value="Perempuan" required> Perempuan
<p>Hobi (pilih lebih dari satu jika ada):</p>
<input type="checkbox" name="hobi[]" value="Membaca"> Membaca<br>
<input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga<br>
<input type="checkbox" name="hobi[]" value="Traveling"> Traveling<br>
<p>Agama:</p>
<select name="agama" required>
<option value="">--Pilih--</option>
<option value="Islam">Islam</option>
<option value="Kristen">Kristen</option>
<option value="Hindu">Hindu</option>
<option value="Budha">Budha</option>
</select>
<p>Alamat:</p>
<textarea name="alamat" rows="4" cols="30" required></textarea>
<p>Uraian:</p>
<textarea name="uraian" rows="4" cols="30" required></textarea>
<p><input type="submit" value="Submit"></p>
</form>
</body>
</html>
