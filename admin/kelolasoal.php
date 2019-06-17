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

include("../header.php");
include("sidebar.php");

if (isset($_SESSION[alogin])) {
    echo '<section id="content-panel">
            <div>
            <aside class="panel panel-index">';

    if(isset($hapus)){
				$datasql = mysql_query("delete from soal where id='$idtest'");
        echo '<center><h2>Data telah diupdate</h2></center>';
    }
		echo '<table id="data">
						<tr>
							<th><b>Soal</b></th>
							<th><b>Aksi</b></th>
						</tr>';
		$datasql = mysql_query("select * from soal");
							while($data    = mysql_fetch_row($datasql)) {
								echo '<tr>
											<td>' . $data[2] . '</td>
											<td><form action="kelolasoal.php" method="post"><input type="hidden" name="idtest" value=' . $data[0] . '><button type="submit" name="hapus">Hapus</button></form></td>
											</tr>';
							}
		echo '</table></aside>
            </div>
        </section>';
}else{
    header("Location: index.php");
}

include("../footer.php");
?>
</body>
</html>
