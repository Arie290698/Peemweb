<?php
include("../database.php");
session_start();
?>
<!DOCTYPE html>
<html>
<title>Admin Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../style.css">
<body>
<?php
extract($_POST);
if(isset($submit)){
	$rs=mysql_query("select * from admin where username='$username' and pass='$password'");
	if(mysql_num_rows($rs)<1){
		$found="N";
	}else{
		$_SESSION[alogin]=$username;
		header("Location: index.php");
	}
}
$page == 'admin';
include("../header.php");
include("./sidebar.php");


if (isset($_SESSION[alogin])) {
    $user   = $_SESSION[alogin];
    $usrsql = mysql_query("select * from admin where username='$user'");
    $usr    = mysql_fetch_row($usrsql);
    
    
    echo '<section id="content-panel">
            <div>
            <aside class="panel panel-index">
            <div class="feed">

    <div class="fl-lf w50">
        <div class="box member-posts">
            <h3>Penambahan</h3>
            <div class="box-item">
                <ul class="list-item item-post-user">
                    <li class="load-post-index">
                        <li class="list-item-post">
                            <div class="post-item">
                                <div class="post-article">
                                    <a href="addtest.php"><button>Tambah Mata Pelajaran</button></a>
									<hr>
									<a href="addsoal.php"><button>Tambah Soal</button></a>
									<hr>
									<a href="addadmin.php"><button>Tambah Admin</button></a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </li>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="fl-lf w50">
        <div class="box member-posts">
            <h3>Pengelolaan</h3>
            <div class="box-item">
                <ul class="list-item item-post-user">
                    <li class="load-post-index">
                        <li class="list-item-post">
                            <div class="post-item">
                                <div class="post-article">
                                    <a href="kelolatest.php"><button>Kelola Mata Pelajaran</button></a>
									<hr>
									<a href="kelolasoal.php"><button>Kelola Soal</button></a>
									<hr>
									<a href="kelolaadmin.php"><button>Kelola User</button></a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </li>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clear"></div>

</div>
</aside>
            </div>
        </section>';
    
} else {
    echo '<section id="content-panel">
            <div>
            <aside class="panel panel-index">';
						if(isset($found)){
							echo '<center><h2>Username atau Password salah</h2></center>';
						}
            echo '<form action="index.php" method="post">

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Masukkan Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Masukkan Password" name="password" required>

    <button type="submit" name="submit">Login</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <span class="psw">Belum punya akun? <a href="daftar.php">Daftar disini!</a></span>
  </div>
</form>
</aside>
</div>
        </section>';
}


include("../footer.php");
?>
</body>
</html>
