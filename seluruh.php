<?php
$servername = "localhost";
$username = "root";
$password = "teknik09";
$dbname = "pemantauan_bensin";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Pengukuran Bensin berbasis IoT</title>
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
	font-family: Geneva, Arial, Helvetica, sans-serif;
}
.tank1 {
	position: relative;
	text-align: center;
}
.centered {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 234px;
	height: 152px;
}
.centered1 {	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 234px;
	height: 152px;
}
.style2 {color: #FFFFFF}
-->
</style>
</head>

<body bgcolor="#666666">
<center>
<p class="style1">Perancangan Pengukur Volume Underground Tank SPBU Menggunakan Raspberry Pi 3 Model B</p>
<p><strong><a href="index.php" class="style2">LIHAT DATA SATUAN</a> | <a href="seluruh.php" class="style2">LIHAT DATA KESELURUHAN</a> </strong></p>
<p>
    <table width="70%" border="1">
    <tr>
      <td width="40%" bgcolor="#FFFFFF">Waktu</td>
      <td width="15%" bgcolor="#FFFFFF">Tabung I (cm)</td>
      <td width="15%" bgcolor="#FFFFFF">Tabung I (ml)</td>
      <td width="15%" bgcolor="#FFFFFF">Tabung II (cm)</td>
      <td width="15%" bgcolor="#FFFFFF">Tabung II (ml)</td>
    </tr>
    <?php
    $sql = "SELECT * FROM data";
    $query = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_assoc($query))  {
    ?>
    <tr>
      <td width="40%" bgcolor="#FFFFAA"><?php echo $data['waktu']; ?></td>
      <td width="15%" bgcolor="#FFFFAA"><?php echo 20-$data['h_1']; ?></td>
      <td width="15%" bgcolor="#FFFFAA"><?php echo 1452-$data['v_1']; ?></td>
      <td width="15%" bgcolor="#FFFFAA"><?php echo 20-$data['h_2']; ?></td>
      <td width="15%" bgcolor="#FFFFAA"><?php echo 1452-$data['v_2']; ?></td>
    </tr>
    <?php
    }
    ?>
  </table>
</p>

<p><em><strong>Penelitian oleh : Siswono | D41114021 |</strong></em></p>
</center>
</body>
</html>
