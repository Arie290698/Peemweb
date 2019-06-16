<?php
include("database.php");
session_start();
?>
<!DOCTYPE html>
<html>
<title>Hubungi Kami</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php
include("database.php");
include("header.php");
include("sidebar.php");

extract($_POST);


?>
<section id="content-panel">
            <div>
            <aside class="panel panel-index">
<?php
if(isset($kirim)){
	$query="INSERT INTO `kontak`(`nama`, `email`, `pesan`) VALUES ('$nama','$email','$pesan')";
	$rs=mysql_query($query)or die("Could Not Perform the Query");
    echo '<center><h2>Pesan terkirim</h2></center>';    
}
?>
<form name="form1" method="post" action="kontak.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Hubungi Kami</h1>
    <hr>
	
	<label for="nama"><b>Nama</b></label>
    <input type="text" placeholder="Masukkan Nama" name="nama" required>
	
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Masukkan Email" name="email" required>

	<label for="pesan"><b>Pesan</b></label>
    <textarea name="pesan" style="min-height: 300px;width: 100%;border: 1px solid #333;padding: 7px;color: #000;"></textarea>

    <div class="clearfix">
      <button type="submit" name="kirim">Kirim</button>
    </div>
  </div>
</form>
</aside>
            </div>
        </section>
<?php
include("footer.php");
?>
</body>


</html>
