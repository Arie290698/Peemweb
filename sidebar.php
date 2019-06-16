<?php
    $user   = $_SESSION[login];
    $usrsql = mysql_query("select * from pengguna where login='$user'");
    $usr    = mysql_fetch_row($usrsql);
    
    if(isset($_SESSION['login'])){
        echo '<section id="sidebar-panel">
                <div class="panel-bg"></div>
                <header>
                    <div class="header-profile">
                        <div class="header-profile-image">
                            <img src="' . $usr[8] . '" alt="' . $usr[3] . '">
                        </div>

                        <div class="header-profile-description">
                            <center><div class="header-profile-description-name">' . $usr[3] . '</div></center>
                        </div>
                    </div>
                </header>

                <div class="panel-menu">
                    <ul class="panel-menu-list">
                        <li class="panel-menu-list-heading">Pengaturan Akun</li>
                        <li class="panel-menu-list-item"><a href="ubahdata.php">Ubah Data</a></li>
                        <li class="panel-menu-list-item"><a href="ubahpassword.php">Ubah Password</a></li>
                        <li class="panel-menu-list-item"><a href="ubahfoto.php">Ubah Foto</a></li><br>
                        <li class="panel-menu-list-heading">Lainnya</li>
                        <li class="panel-menu-list-item"><a href="ngobrol.php">Chatting</a></li>
                        <li class="panel-menu-list-item"><a href="keluar.php">Keluar</a></li>
                    </ul>
                </div>
            </section>';
    }else{
        echo '<section id="sidebar-panel">
                <div class="panel-bg"></div>

                <div class="panel-menu">
                    <ul class="panel-menu-list">
                        <li class="panel-menu-list-heading">Navigasi</li>
                        <li class="panel-menu-list-item"><a href="index.php">Beranda</a></li>
                        <li class="panel-menu-list-item"><a href="tentang.php">Tentang Kami</a></li>
                        <li class="panel-menu-list-item"><a href="kebijakan.php">Kebijakan Privasi</a></li>
                        <br><li class="panel-menu-list-heading">Akun</li>
                        <li class="panel-menu-list-item"><a href="index.php">Masuk</a></li>
                        <li class="panel-menu-list-item"><a href="daftar.php">Daftar</a></li><br>

                    </ul>
                </div>
            </section>';
    }
?>