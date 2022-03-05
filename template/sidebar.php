
<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
        <div class="d-flex align-items-center">
            <span class="bg-primary p-2 rounded d-flex justify-content-center align-items-center mr-2">
                <i class="feather-shopping-bag text-white h4 mb-0"></i>
            </span>
            <span class="font-weight-bolder h4 mb-0 text-uppercase text-primary">My Shop</span>
        </div>
        <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
            <i class="feather-x text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>
            <li class="menu-spacer"></li>

            <li class="menu-item">
                <a href="<?php echo $url; ?>/dashboard.php" class="menu-item-link">
                    <span>
                        <i class="feather-home"></i>
                        Dashboard
                    </span>
                </a>
            </li>


            <li class="menu-item">
                <a href="<?php echo $url; ?>/index.php" class="menu-item-link">
                    <span>
                        <i class="feather-eye"></i>
                        View Posts
                    </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="<?php echo $url; ?>/wallet.php" class="menu-item-link">
                    <span>
                        <i class="feather-dollar-sign"></i>
                        Wallet
                    </span>
                </a>
            </li>

            <li class="menu-spacer"></li>




            <li class="menu-title">
                <span>Manage Post</span>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/post_add.php" class="menu-item-link">
                    <span>
                        <i class="feather-plus-circle"></i>
                        Add Post
                    </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/post_list.php" class="menu-item-link">
                    <span>
                        <i class="feather-list"></i>
                        Post Lists
                    </span>
                    <span class="badge badge-pill bg-white shadow-sm text-primary">
                        <?php echo countTotal("posts"); ?>
                    </span>
                </a>
            </li>

            <li class="menu-spacer"></li>

            <li class="menu-title">
                <span>Manage Ads</span>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/ads_add.php" class="menu-item-link">
                    <span>
                        <i class="feather-plus-circle"></i>
                        Add Ads
                    </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/ads_list.php" class="menu-item-link">
                    <span>
                        <i class="feather-list"></i>
                        Ads Lists
                    </span>
                    <span class="badge badge-pill bg-white shadow-sm text-primary">
                        <?php echo countTotal("ads"); ?>
                    </span>
                </a>
            </li>

            <li class="menu-spacer"></li>

            <?php if($_SESSION['user']['role'] < 2 ) { ?>

                <li class="menu-title">
                    <span>Setting</span>
                </li>

                <li class="menu-item">
                    <a href="<?php echo $url; ?>/category_add.php" class="menu-item-link">
                        <span>
                            <i class="feather-layers mr-2"></i>
                            Category Manager
                        </span>
                        <span class="badge badge-pill bg-white shadow-sm text-primary">
                            <?php echo countTotal("categories"); ?>
                        </span>
                    </a>
                </li>


             <?php if($_SESSION['user']['role'] < 1 ) { ?>
                
                <li class="menu-item">
                    <a href="<?php echo $url; ?>/user_list.php" class="menu-item-link">
                        <span>
                            <i class="feather-users mr-2"></i>
                            User Manager
                        </span>
                        <span class="badge badge-pill bg-white shadow-sm text-primary">
                            <?php echo countTotal("users"); ?>
                        </span>
                    </a>
                </li>
                <?php } ?> 

            <?php } ?>

            <li class="menu-spacer"></li>

            <li class="menu-item">
                <a href="<?php echo $url; ?>/logout.php" class="menu-item-link bg-danger text-white d-flex justify-content-center w-100">
                    <span>
                        <i class="feather-lock"></i>
                        Logout
                    </span>
                </a>
            </li>

        </ul>
    </div>
</div>