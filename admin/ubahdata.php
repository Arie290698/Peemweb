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
if(isset($update)){
	    $rs=mysql_query("UPDATE `admin` SET `nama`='$nama',`email`='$email' where username='$username'");
}
$admin   = $_SESSION[alogin];
$admsql = mysql_query("select * from admin where username='$user'");
$adm    = mysql_fetch_row($admsql);

include("../header.php");
include("sidebar.php");

if (isset($_SESSION[alogin])) {
    echo '<section id="content-panel">
            <div>
            <aside class="panel panel-index">';

    if(isset($update)){
        echo '<center><h2>Data telah diupdate</h2></center>';
    }

echo '<form name="form1" method="post" action="ubahdata.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Ubah Data Akun</h1>
    <hr>
	
	<label for="email"><b>Username</b></label>
    <input type="text" value="' . $adm[1] . '" name="username" readonly>
	
	<label for="name"><b>Nama Lengkap</b></label>
    <input type="text" value="' . $adm[3] . '" name="nama" required>
	
    <label for="email"><b>Email</b></label>
    <input type="text" value="' . $usr[4] . '" name="email" required>
    <div class="clearfix">
      <button type="submit" name="update">Ubah Data</button>
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
