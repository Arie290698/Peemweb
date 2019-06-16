<?php @$_SESSION['login'];
	error_reporting(1);
?>
        <nav id="new-navbar">
            <header>
                <center><a href="index.php"><h1>OON</h1></a></center>
            </header>

            <div class="navbar-menu">
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="kontak.php">Hubungi Kami</a></li>
                    <?php
                    if(isset($_SESSION['login'])){
                        echo '<li><a href="keluar.php">Keluar</a></li>';
                    }else if(isset($_SESSION['alogin'])){
                        echo '<li><a href="keluar.php">Keluar</a></li>';
                    }else{
                        echo '';
                    }
                    ?>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </nav>