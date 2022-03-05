
</head>
<body class="bg-light">

<div class="container">
    <div class="row">
        <div class="col-12">

            <nav class="navbar navbar-expand-lg navbar-dark bg-primary my-3 rounded">
                <a class="navbar-brand" href="<?php echo $url; ?>/index.php">My Blog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo $url; ?>/index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" method="post" action="<?php echo $url; ?>/search_post.php">
                        <input class="form-control mr-sm-2" type="search" name="search-key" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>

        </div>

        <div class="col-12">
            <div class="">
                <?php 
                    foreach(ads() as $ads) {
                ?>

                <a href="<?php echo $ads['link']; ?>" target="_blank" class="">
                    <img src="<?php echo $ads['photo']; ?>" class="w-100 mb-3 rounded shadow-sm" alt="">
                </a>

                <?php
                    }
                ?>
            </div>
        </div>


    </div>
</div>