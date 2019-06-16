<?php
include("../database.php");
session_start();
?>
<!DOCTYPE html>
<html>
<title>Olimpiade Online Nasional</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../style.css">
<body>
<?php
extract($_POST);
extract($_FILES);

$admin   = $_SESSION[alogin];
$admsql = mysql_query("select * from admin where username='$admin'");
$adm    = mysql_fetch_row($admsql);

include("../header.php");
include("sidebar.php");

if (isset($_SESSION[alogin])) {
    echo '<section id="content-panel">
            <div>
            <aside class="panel panel-index">';

    if(isset($update)){
		$foto = $_FILES['foto']['tmp_name'];
        	
		move_uploaded_file($foto, 'gambar/'.$admin);
		$query = mysql_query("UPDATE `admin` SET `foto`='./gambar/$admin' where username='$admin'");
		if($query){
	    	echo '<center><h2>Foto berhasil diubah</h2></center>';
		}else{
			echo '<center><h2>Foto gagal diubah</center></h2>';
	    }
    }


echo '<form name="form1" method="post" action="ubahfoto.php" enctype="multipart/form-data" style="border:1px solid #ccc">
  <div class="container">
    <h1>Ubah Foto Akun</h1>
    <hr>
	<br>
	<label for="username"><b>Username</b> : ' . $adm[1] . '</label>
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

include("../footer.php");
?>
</body>
</html>
