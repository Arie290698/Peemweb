<?php
include("../database.php");
session_start();
?>
<!DOCTYPE html>
<html>
<title>Tambah Soal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../style.css">
<body>
<?php
include("../header.php");
include("sidebar.php");
extract($_POST);

if (isset($_SESSION[alogin])){
	echo '<section id="content-panel">
            <div>
            <aside class="panel panel-index">';
	if(isset($tambah)){
	$rs=mysql_query("select * from `test` where nama='$nama'");
	if (mysql_num_rows($rs)>0){
        echo "<center><h2>Mata pelajaran sudah ada</h2></center>";
    }else{
				$rs=mysql_query("INSERT INTO `test`(`nama`) VALUES ('$nama')");
        echo "<center><h2>Mata pelajaran berhasil ditambahkan</h2></center>";
		}
}
						echo '<form name="form1" method="post" action="addtest.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Tambah Mata Pelajaran</h1>
    <hr>
    <label for="nama"><b>Mata Pelajaran</b></label>
    <input type="text" placeholder="Masukkan Nama Mata Pelajaran" name="nama" required>
		
    <div class="clearfix">
      <button type="submit" name="tambah">Tambah Mata Pelajaran</button>
    </div>
  </div>
</form>
		</aside>
            </div>
        </section>';

}else{
    header("location: index.php");
}
include("../footer.php");
?>
</body>
</html>
