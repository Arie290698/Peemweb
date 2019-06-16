<?php
include("database.php");
session_start();
if (isset($_SESSION[login])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<title>Daftar Akun Baru</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php
include("database.php");
include("header.php");
include("sidebar.php");

extract($_POST);
if(isset($daftar)){
	$rs=mysql_query("select * from pengguna where login='$username'");
    if (mysql_num_rows($rs)>0){
        echo "<section id=content-panel>
            <div>
            <aside class='panel panel-index'>
            <center>";
        echo "<p>Username telah terpakai</p>";
        echo "<p><a href=daftar.php>Ulangi pendaftaran</a></p>";
        echo "</center></aside>
            </div>
        </section>";
        include("footer.php");
        exit;
    }else{
        $query="INSERT INTO `pengguna`(`login`, `pass`, `username`, `address`, `city`, `phone`, `email`) VALUES ('$username','$password','$nama','$alamat','$kota','$hp','$email')";

        $rs=mysql_query($query)or die("Could Not Perform the Query");
        echo "<section id=content-panel>
            <div>
            <aside class='panel panel-index'><center>";
        echo "<p>Akun berhasil dibuat</p>";
        echo "<p><a href=index.php>Masuk akun</a></p>";
        echo "</center></aside>
            </div>
        </section>";
        include("footer.php");
        exit;
    }
}

?>
<section id="content-panel">
            <div>
            <aside class="panel panel-index">
<form name="form1" method="post" action="daftar.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Daftar Akun Baru</h1>
    <hr>
	
	<label for="email"><b>Username</b></label>
    <input type="text" placeholder="Masukkan Username" name="username" required>
	
	<label for="name"><b>Nama Lengkap</b></label>
    <input type="text" placeholder="Masukkan Nama" name="nama" required>
	
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Masukkan Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Masukkan Password" name="password" required>

    <label for="psw-repeat"><b>Konfirmasi Password</b></label>
    <input type="password" placeholder="Ulangi Password" name="cpassword" required>
	
	<label for="name"><b>Alamat</b></label>
    <input type="text" placeholder="Masukkan Alamat" name="alamat" required>
	
	<label for="name"><b>Kota</b></label>
    <input type="text" placeholder="Masukkan Kota" name="kota" required>
	
	<label for="name"><b>No. HP</b></label>
    <input type="text" placeholder="Masukkan No HP" name="hp" required>

    <div class="clearfix">
      <button type="submit" name="daftar">Daftar</button>
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
