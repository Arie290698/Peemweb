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
include("header.php");
include("sidebar.php");
extract($_POST);
if (isset($_SESSION[login])){
    $user = $_SESSION[login];
	
    echo'<section id="content-panel">
            <div>
                <aside class="panel panel-index">
                    <h2>Pilih Soal</h2>';
	$testsql=mysql_query("select * from test");
	while($test=mysql_fetch_row($testsql)){
        echo'<a href="quiz.php?id='.$test[0].'"><button>'.$test[1].'</button></a>';
    }
    echo '</aside>
            </div>
        </section>';
}else{
		header("Location: index.php");
}
include("footer.php");
?>
</body>
</html>
