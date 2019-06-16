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
$admin   = $_SESSION[alogin];

include("../header.php");
include("sidebar.php");

if (isset($_SESSION[alogin])) {
    echo '<section id="content-panel">
            <div>
            <aside class="panel panel-index">';

    if(isset($update)){
        $admsql = mysql_query("select * from admin where username='$username' AND pass='$password'");
        if($adm = mysql_fetch_row($admsql)>0){
            $rs=mysql_query("UPDATE `admin` SET `pass`='$npassword' where username='$username'");
            echo '<center><h2>Password berhasil diubah</center></h2>';
        }else{
            echo '<center><h2>Password lama salah</center></h2>';
        }
    }
echo '<form name="form1" method="post" action="ubahpassword.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Ubah Password Akun</h1>
    <hr>
	
	<label for="email"><b>Username</b></label>
    <input type="text" value="' . $admin . '" name="username" readonly>
	
	<label for="name"><b>Password Lama</b></label>
    <input type="password" placeholder="Masukkan Password Lama" name="password" required>

    <label for="name"><b>Password Baru</b></label>
    <input type="password" placeholder="Masukkan Password Baru" name="npassword" required>

    <div class="clearfix">
      <button type="submit" name="update">Ubah Password</button>
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
