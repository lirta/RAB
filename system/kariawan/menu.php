<ul class="nav metismenu" id="side-menu">
    <li class="nav-header">
        <div class="dropdown profile-element"> <span>
                <img alt="image" class="img-circle" src="<?php echo "../assets/foto-kariawan/$_SESSION[foto]"; ?>" width="50%" />
            </span>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo "$_SESSION[username]"; ?></strong>
                    </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="../assets/login/logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="logo-element">
            IN+
        </div>
    </li>
    <li>
        <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Kariawan</span><span class="fa arrow"></span> </a>
        <ul class="nav nav-second-level collapse">
            <li><a href="kariawan_view.php">Kariawan</a></li>
            <li><a href="akses-view.php">Akses Sistem</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Bahan</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li><a href="bahan-kategori-view.php">Kategori Bahan</a></li>
            <li><a href="bahan-view.php">Bahan</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Produck</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li><a href="produck-kategori-view.php">Kategori Produck</a></li>
            <li><a href="produck-view.php">Produck</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Orderan</span> <span class="pull-right label label-primary">SPECIAL</span></a>
        <ul class="nav nav-second-level collapse">
            <li><a href="orderan-view.php">Orderan</a></li>
            <li><a href="penawaran-view.php">Penawaran</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Laporan</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li><a href="#">Search results</a></li>
            <li><a href="#">Lockscreen</a></li>
        </ul>
    </li>
</ul>