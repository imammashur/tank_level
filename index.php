<<?php 
// WRITE : https://api.thingspeak.com/update?api_key=RO05WH3IE95SXZ6Z&field1=0
// READ : https://api.thingspeak.com/channels/901123/fields/1.json
// WRITE API KEY : RO05WH3IE95SXZ6Z
// READ API KEY : QPN9SE5H57DORPSS
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
<div class="tank1">
<img src="gambar tanki.png"	 alt="tank1" />
<div class="centered">
  <?php
  $url_h_1 = file_get_contents("https://api.thingspeak.com/channels/901123/fields/1/last.json");
  $json_h_1 = json_decode($url_h_1, true);
  $h_1 = $json_h_1["field1"];

  $url_v_1 = file_get_contents("https://api.thingspeak.com/channels/901123/fields/2/last.json");
  $json_v_1 = json_decode($url_v_1, true);
  $v_1 = $json_v_1["field2"];
  ?>
  <table width="100%" border="0">
    <tr>
      <?php
      if ($h_1 > 18 ) {$gbr = "isi/10.png";}
      if ($h_1 > 16 && $h_1 < 18 ) {$gbr = "isi/9.png";}
      if ($h_1 > 14 && $h_1 < 16 ) {$gbr = "isi/8.png";}
      if ($h_1 > 12 && $h_1 < 14 ) {$gbr = "isi/7.png";}
      if ($h_1 > 10 && $h_1 < 12 ) {$gbr = "isi/6.png";}
      if ($h_1 > 8 && $h_1 < 10 ) {$gbr = "isi/5.png";}
      if ($h_1 > 6 && $h_1 < 8 ) {$gbr = "isi/4.png";}
      if ($h_1 > 5 && $h_1 < 6 ) {$gbr = "isi/3.png";}
      if ($h_1 > 4 && $h_1 < 5 ) {$gbr = "isi/2.png";}      
      if ($h_1 < 4 ) {$gbr = "isi/1.png";}
      ?>
      <td width="19%"><img src="<?php echo $gbr; ?>" width="33" height="163" /></td>
      <td width="81%"><table width="100%" border="1">
        <tr>
          <td width="48%"><div align="center"><strong>Tanki 1 </strong></div></td>
          <td width="52%"><div align="center"><strong>Premium</strong></div></td>
        </tr>
        <tr>
          <td><strong>Ullage (ml) </strong></td>
          <td><div align="center"><?php echo "1452"; ?></div></td>
        </tr>
        <tr>
          <td><strong>Gross (cm) </strong></td>
          <td><div align="center"><?php echo $h_1; ?> </div></td>
        </tr>
        <tr>
          <td><strong>Gross (ml) </strong></td>
          <td><div align="center"><?php echo $v_1; ?></div></td>
        </tr>
      </table></td>
    </tr>
  </table>
</div>
</div></p>
<div class="tank1"> <img src="gambar tanki.png"	 alt="tank2" />
  <div class="centered1">
      <?php
      $url_h_2 = file_get_contents("https://api.thingspeak.com/channels/901123/fields/3/last.json");
      $json_h_2 = json_decode($url_h_2, true);
      $h_2 = $json_h_2["field3"];

      $url_v_2 = file_get_contents("https://api.thingspeak.com/channels/901123/fields/4/last.json");
      $json_v_2 = json_decode($url_v_2, true);
      $v_2 = $json_v_2["field4"];
      ?>
      <table width="100%" border="0">
        <tr>
        <?php
        if ($h_2 > 18 ) {$gbr = "isi/10.png";}
        if ($h_2 > 16 && $h_2 < 18 ) {$gbr = "isi/9.png";}
        if ($h_2 > 14 && $h_2 < 16 ) {$gbr = "isi/8.png";}
        if ($h_2 > 12 && $h_2 < 14 ) {$gbr = "isi/7.png";}
        if ($h_2 > 10 && $h_2 < 12 ) {$gbr = "isi/6.png";}
        if ($h_2 > 8 && $h_2 < 10 ) {$gbr = "isi/5.png";}
        if ($h_2 > 6 && $h_2 < 8 ) {$gbr = "isi/4.png";}
        if ($h_2 > 5 && $h_2 < 6 ) {$gbr = "isi/3.png";}
        if ($h_2 > 4 && $h_2 < 5 ) {$gbr = "isi/2.png";}      
        if ($h_2 < 4 ) {$gbr = "isi/1.png";}
        ?>
        <td width="19%"><img src="<?php echo $gbr; ?>" width="33" height="163" /></td>
          <td width="81%"><table width="100%" border="1">
              <tr>
                <td width="48%"><div align="center"><strong>Tanki 2</strong></div></td>
                <td width="52%"><div align="center"><strong>Pertalite</strong></div></td>
              </tr>
              <tr>
                <td><strong>Ullage (ml) </strong></td>
                <td><div align="center"><?php echo "1452"; ?></div></td>
              </tr>
              <tr>
                <td><strong>Gross (cm) </strong></td>
                <td><div align="center"><?php echo $h_2; ?> </div></td>
              </tr>
              <tr>
                <td><strong>Gross (ml) </strong></td>
                <td><div align="center"><?php echo $v_2; ?></div></td>
              </tr>
          </table></td>
        </tr>
      </table>
    </div>
</div>
<p><em><strong>Penelitian oleh : Siswono | D41114021 |</strong></em></p>
</center>
</body>
</html>
