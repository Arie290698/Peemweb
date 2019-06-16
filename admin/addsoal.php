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
	$rs=mysql_query("INSERT INTO `soal`(`test_id`, `soal`, `ans1`, `ans2`, `ans3`, `ans4`, `benar`) VALUES ($mapel,'$soal','$a','$b','$c','$d',$benar)");
    if (mysql_num_rows($rs)>0){
        echo 'Soal berhasil ditambahkan';
    }
}
						echo '<form name="form1" method="post" action="addsoal.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Tambah Soal</h1>
    <hr>
	
	<label for="mapel"><b>Pilih Mata Pelajaran</b></label>
	
	<select name="mapel" required>';
			$mapelsql = mysql_query("select * from test");
			while($mapel = mysql_fetch_array($mapelsql)){
				echo "<option value=" . $mapel['id'] . ">" . $mapel['nama'] . "</option>";
			}
		echo '</select>
		
	<label for="soal"><b>Soal</b></label>
    <textarea name="soal" style="min-height: 100px;width: 100%;border: 1px solid #333;padding: 7px;color: #000;" required></textarea>
	
    <label for="a"><b>A</b></label>
    <input type="text" placeholder="Masukkan Jawaban A" name="a" required>
		<label for="b"><b>B</b></label>
    <input type="text" placeholder="Masukkan Jawaban B" name="b" required>
		<label for="c"><b>C</b></label>
    <input type="text" placeholder="Masukkan Jawaban C" name="c" required>
		<label for="d"><b>D</b></label>
    <input type="text" placeholder="Masukkan Jawaban D" name="d" required>
		
		<label for="benar"><b>Pilih Jawaban Benar</b></label>
    <select type="number" name="benar" required>
			<option value="1">A</option>
			<option value="2">B</option>
			<option value="3">C</option>
			<option value="4">D</option>
		</select>
		
    <div class="clearfix">
      <button type="submit" name="tambah">Tambah Soal</button>
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
