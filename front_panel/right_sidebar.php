<div class="col-12 col-md-4">
            
    <div class="front-panel-side-bar">

      <?php 

            if($_SESSION['user']) {
     ?>
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-content-center">
                        <p class="mb-0"> 
                        Hi <b><?php echo ucfirst($_SESSION['user']['name']); ?></b>
                        </p>
                        <a href="dashboard.php" class="btn btn-primary btn-sm">Go Admin Dashboard</a>
                    </div>
                </div>
        <?php 
            } else {

      ?>

                <div class="card">
                    <div class="card-body">
                        <p class=""> 
                        Hi, <b>You are in guest mode!</b>
                        </p>
                        <div class="">
                            <a href="register.php" class="btn btn-primary btn-sm">Register Here</a>
                            <a href="login.php" class="btn btn-primary btn-sm">Log In</a>
                        </div>
                    </div>
                </div>

     <?php } ?>

        <h4>Categories</h4>

        <div class="list-group">
            <a href="<?php echo $url; ?>/index.php" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id'])? '' : 'active'; ?>" aria-current="true">
                All Categories
            </a>
            
            <?php foreach(frontCategories() as $c) { ?>
                   
                <a href="category_base_post.php?category_id=<?php echo $c['id']; ?>" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id'])? $_GET['category_id'] == $c['id']? 'active' : '' : ''; ?>">

                    <?php if($c['ordering'] == 1) { ?>

                            <i class="feather-paperclip"></i>

                    <?php } ?>

                    <?php echo $c['title']; ?>
                </a>

            <?php } ?>

        </div>

        <div class="mb-3">
            <h4 class="mt-3">Advertisement</h4>
            <img src="<?php echo $url; ?>/assets/img/ads.png" class="w-100 border" alt="">
        </div>

        <div class="">
            <h4>Search By Date</h4>
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo $url; ?>/search_by_date.php" method="post">
                        <div class="form-group">
                            <label for="">Start</label>
                            <input type="date" name="start" id="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">End</label>
                            <input type="date" name="end" id="" class="form-control" required>
                        </div>
                        <button class="btn btn-primary">
                            <i class="feather-calendar"></i>    
                                Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>