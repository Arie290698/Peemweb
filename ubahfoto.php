<?php
include("database.php");
session_start();
?>
<!DOCTYPE html>
<html>
<title>Olimpiade Online Nasional</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php
extract($_POST);
extract($_FILES);
if(isset($update)){
	    $rs=mysql_query("UPDATE `pengguna` SET `username`='$nama',`address`='$alamat',`city`='$kota',`phone`='$hp',`email`='$email' where login='$username'");
}
$user   = $_SESSION[login];
$usrsql = mysql_query("select * from pengguna where login='$user'");
$usr    = mysql_fetch_row($usrsql);

include("header.php");
include("sidebar.php");

if (isset($_SESSION[login])) {
    echo '<section id="content-panel">
            <div>
            <aside class="panel panel-index">';

    if(isset($update)){
		$foto = $_FILES['foto']['tmp_name'];
        	
		move_uploaded_file($foto, 'gambar/'.$user);
		$query = mysql_query("UPDATE `pengguna` SET `foto`='./gambar/$user' where login='$user'");
		if($query){
	    	echo '<center><h2>Foto berhasil diubah</h2></center>';
		}else{
			echo '<center><h2>Foto gagal diubah</center></h2>';
	    }
    }

$usrsql = mysql_query("select * from pengguna where login='$user'");
$usr    = mysql_fetch_row($usrsql);

echo '<form name="form1" method="post" action="ubahfoto.php" enctype="multipart/form-data" style="border:1px solid #ccc">
  <div class="container">
    <h1>Ubah Foto Akun</h1>
    <hr>
	<br>
	<label for="username"><b>Username</b> : ' . $usr[1] . '</label>
    <br><br>

	<label for="foto"><b>Pilih foto</b> :</label><br>
    <input type="file" name="foto" required>

    <div class="clearfix">
      <button type="submit" name="update">Ubah Foto</button>
    </div>
  </div>
</form>
</aside>
            </div>
        </section>';
}else{
    header("Location: index.php");
}

include("footer.php");
?>
</body>
</html>
