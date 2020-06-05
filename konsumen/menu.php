<ul class="nav metismenu" id="side-menu">
    <li class="nav-header">
        <div class="dropdown profile-element">
            <span>
                <img alt="image" class="img-circle" src="../assets/konsumen.jpg" width="50%" />
            </span> <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="clear">
                    <span class="block m-t-xs">
                        <strong class="font-bold"><?php echo "$_SESSION[nama]"; ?></strong>
                    </span>
                    <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                </span>
            </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                <li><a href="../assets/login/logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="logo-element">
            IN+
        </div>
    </li>
    <li>
        <a href="index.php"><i class="fa fa-user-circle"></i> <span class="nav-label">Profile</span></a>
    </li>
    <li>
        <a href="katalog.php"><i class="fa fa-desktop"></i> <span class="nav-label">Katalog Produck</span></a>
    </li>
    <li>
        <a href="order-kastem.php"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Order Kastem</span></a>
    </li>
    <li>
        <a href="cart-view.php"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Keranjang</span></a>
    </li>
    <li>
        <a href="pesanan.php"><i class="fa fa-book"></i> <span class="nav-label">Pesanan</span></a>
    </li>
</ul>