<?php
include("../database.php");
session_start();
?>
<!DOCTYPE html>
<html>
<title>Tambah Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../style.css">
<body>
<?php
extract($_POST);
$admin   = $_SESSION[alogin];
$admsql = mysql_query("select * from admin where username='$user'");
$adm    = mysql_fetch_row($admsql);

include("../header.php");
include("sidebar.php");

if (isset($_SESSION[alogin])) {
    echo '<section id="content-panel">
            <div>
            <aside class="panel panel-index">';

    if(isset($tambah)){
				$cekadm=mysql_query("select * from `admin` where username='$username'");
				if (mysql_num_rows($cekadm)>0){
					echo "<center><h2>Username " . $username . " sudah digunakan</h2></center>";
				}else{
					$insertadm=mysql_query("INSERT INTO `admin`(`username`, `pass`, `nama`, `email`) VALUES ('$username','$password','$nama','$email')");
							echo "<center><h2>Admin " . $username . " berhasil ditambahkan</h2></center>";
				}
    }

echo '<form name="form1" method="post" action="addadmin.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Ubah Data Akun</h1>
    <hr>
	
	<label for="username"><b>Username</b></label>
    <input type="text" placeholder="Masukkan Username" name="username" required>
	
	<label for="password"><b>Password</b></label>
    <input type="password" placeholder="Masukkan Password" name="password" required>
	
	<label for="name"><b>Nama Lengkap</b></label>
    <input type="text" placeholder="Masukkan Nama" name="nama" required>
	
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Masukkan Email" name="email" required>
    <div class="clearfix">
      <button type="submit" name="tambah">Tambah Admin</button>
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
