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
extract($_POST);
if(isset($submit)){
	$rs=mysql_query("select * from pengguna where login='$username' and pass='$password'");
	if(mysql_num_rows($rs)<1){
		$found="N";
	}else{
		$_SESSION[login]=$username;
		header("Location: index.php");
	}
}

include("header.php");
include("sidebar.php");


if (isset($_SESSION[login])) {
    $user   = $_SESSION[login];
    $usrsql = mysql_query("select * from pengguna where login='$user'");
    $usr    = mysql_fetch_row($usrsql);
    
    
    echo '<section id="content-panel">
            <div>
            <aside class="panel panel-index">
						<div class="feed">

    <div class="fl-lf w50">
        <div class="box member-posts">
            <h3>Action</h3>
            <div class="box-item">
                <ul class="list-item item-post-user">
                    <li class="load-post-index">
                        <li class="list-item-post">
                            <div class="post-item">
                                <div class="post-article">
                                    <a href="test.php"><button>Kerjakan Soal</button></a>
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
        <div class="box member-chatroom">
            <h3>Chat</h3>
            <div class="chatroom chatroom-index">
                <ul class="chat-list">
                    <li class="load-chat">';
                    $chatsql = mysql_query("select * from chat order by id desc limit 10");
                    while($chat    = mysql_fetch_row($chatsql)){
                        echo '<br><li class="chat-list-item">
                            <div class="chat-meta">
                                <div class="chat-user-info">
                                    <div class="chat-user-info-name">' . $chat[1] . ' [' . $chat[3] . ' ] :</div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="chat-content">' . $chat[2] . '</div>
                        </li>
                        <hr>';
                    }
                    echo '</li>
                </ul>
            </div>
            <a href="chat.php"><button>Chatting</button></a>
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


include("footer.php");
?>
</body>
</html>
