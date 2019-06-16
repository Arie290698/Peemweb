<?php
session_start();
error_reporting(1);
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
$user=$_SESSION[login];
if (isset($id)) {
    $_SESSION[tid] = $id;
    header("location:quiz.php");
}
if (!isset($_SESSION[tid])) {
    header("location: test.php");
}
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

$query = "select * from soal";

$rs = mysql_query("select * from soal where test_id=$tid") or die(mysql_error());
if (!isset($_SESSION[qn])) {
    $_SESSION[qn] = 0;
    mysql_query("delete from jawaban where user='" . $user . "' AND test_id=" . $tid . "") or die(mysql_error());
    $_SESSION[benar] = 0;
} else {
    if ($submit == 'Next' && isset($ans)) {
        mysql_data_seek($rs, $_SESSION[qn]);
        $row = mysql_fetch_row($rs);
        mysql_query("insert into jawaban(user, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('" . $user . "', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
        
        if ($ans == $row[7]) {
            $_SESSION[benar] = $_SESSION[benar] + 1;
        }
        $_SESSION[qn] = $_SESSION[qn] + 1;
        
    } else if ($submit == 'Finish' && isset($ans)) {
        mysql_data_seek($rs, $_SESSION[qn]);
        $row = mysql_fetch_row($rs);
        mysql_query("insert into jawaban(user, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('" . $user . "', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
        
        if ($ans == $row[7]) {
            $_SESSION[benar] = $_SESSION[benar] + 1;
        }
        
        echo "<section id='content-panel'>
            <div>
                <aside class='panel panel-index'><center><h1>Hasil</h1></center>";
        $_SESSION[qn] = $_SESSION[qn] + 1;
        echo "<table align=center><tr class=tot><td>Total Pertanyaan<td> $_SESSION[qn]";
        echo "<tr class=tans><td>Jawaban Benar<td>" . $_SESSION[benar];
        $s = $_SESSION[qn] - $_SESSION[benar];
        echo "<tr class=fans><td>Jawaban Salah<td> " . $s;
        echo "</table>";
        mysql_query("insert into nilai(user,test_id,score) values('$login',$tid,$_SESSION[benar])") or die(mysql_error());
        echo "<h1 align=center><a href=test.php><button>Ulangi</button></a> </h1></aside>
            </div>
        </section>";
        unset($_SESSION[qn]);
        unset($_SESSION[tid]);
        unset($_SESSION[benar]);
        include("footer.php");
        exit;
    }
}

$rs = mysql_query("select * from soal where test_id=$tid") or die(mysql_error());
if ($_SESSION[qn] > mysql_num_rows($rs) - 1) {
    unset($_SESSION[qn]);
    echo "<h1 class=head1>Some Error  Occured</h1>";
    session_destroy();
    echo "Please <a href=index.php> Start Again</a>";
    
    exit;
}
mysql_data_seek($rs, $_SESSION[qn]);
$row = mysql_fetch_row($rs);
echo "<section id='content-panel'>
            <div>
                <aside class='panel panel-index'><form method=post action=quiz.php>";
echo "<table id=quiz>";
$n = $_SESSION[qn] + 1;
echo "<tr><td><h4>Soal " . $n . "</h4>
$row[2]";
echo "<tr><td><input class='radio' type='radio' name='ans' value=1>$row[3]";
echo "<tr><td><input class='radio' type='radio' name='ans' value=2>$row[4]";
echo "<tr><td><input class='radio' type='radio' name='ans' value=3>$row[5]";
echo "<tr><td><input class='radio' type='radio' name='ans' value=4>$row[6]";

if ($_SESSION[qn] < mysql_num_rows($rs) - 1)
    echo "<tr><td><button type=submit name=submit value='Next'>Next</button></form>";
else
    echo "<tr><td><button type=submit name=submit value='Finish'>Finish</button></form>";
echo "</table></aside>
            </div>
        </section>";
include("footer.php");
?>
</body>
</html>