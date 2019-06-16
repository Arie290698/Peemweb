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
extract($_FILES);
if(isset($update)){
	    $rs=mysql_query("UPDATE `pengguna` SET `username`='$nama',`address`='$alamat',`city`='$kota',`phone`='$hp',`email`='$email' where login='$username'");
}
$user   = $_SESSION[login];
$usrsql = mysql_query("select * from pengguna where login='$user'");
$usr    = mysql_fetch_row($usrsql);

include("header.php");
include("sidebar.php");

if (isset($_SESSION[login])) {
    echo '<section id="content-panel">
            <div>
            <aside class="panel panel-index">';

    if(isset($kirim)){
        $query="INSERT INTO `chat`(`nama`, `chat`) VALUES ('$username','$pesan')";
        $rs=mysql_query($query)or die("Could Not Perform the Query");
    }

echo '<div class="feed">

    <div class="fl-lf w50">
        <div class="box member-posts">
            <h3>Kirim Chat</h3>
            <div class="box-item">
                <ul class="list-item item-post-user">
                    <li class="load-post-index">
                        <li class="list-item-post">
                            <div class="post-item">
                                <div class="post-article">
                                    <form action="ngobrol.php" method="post">
                                        <input type="hidden" name="username" value="' . $user .'">
                                        <textarea name="pesan" style="min-height: 300px;width: 100%;border: 1px solid #333;padding: 7px;color: #000;"></textarea>
                                        <button type="submit" name="kirim">Kirim Chat</button>
                                    </form>
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
        </div>
    </div>
    <div class="clear"></div>

</div>
</aside>
            </div>
        </section>';
}else{
    header("Location: index.php");
}

include("footer.php");
?>
</body>
</html>
