<ul class="nav metismenu" id="side-menu">
    <li class="nav-header">
        <div class="dropdown profile-element"> <span>
                <img alt="image" class="img-circle" src="<?php echo "../assets/foto-kariawan/$_SESSION[foto]"; ?>" width="50%" />
            </span>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo "$_SESSION[nama]"; ?></strong>
                    </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                <li><a href="profile.html">Profile</a></li>
                <li><a href="../assets/login/logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="logo-element">
            IN+
        </div>
    </li>
    <li>
        <a href="order-view.php"><i class="fa fa-desktop"></i> <span class="nav-label">Orderan</span></a>
    </li>
</ul>