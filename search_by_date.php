<?php  require_once "front_panel/head.php"; ?>

    <title>My Blog | Home</title>

<?php    require_once "front_panel/site_head.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-4">
                    <li class="breadcrumb-item text-black-50">
                        <a href="<?php echo $url; ?>/index.php">Home</a>
                    </li>
                     <li class="breadcrumb-item text-black-50">
                        Search result of date between "<?php echo $_POST['start']; ?>"  and "<?php echo $_POST['end']; ?>"
                    </li>
                </ol>
            </nav>

            <?php 

                $result = searchPostByDate($_POST['start'], $_POST['end']);

                if(count($result) == 0) {
                    echo alert("No result found", "warning");
                }                

            ?>

            <?php foreach($result as $p) { ?>
            
                <div class="card mb-3 shadow-sm post">
                    <div class="card-body">

                        <a href="detail.php?id=<?php echo $p['id']; ?>" class="text-dark">
                            <h4 class="">
                                <?php echo $p['title']; ?>
                            </h4>
                        </a>

                        <div class="my-3">
                            <i class="feather-user text-primary"></i>
                            <span class="mr-3">
                                <?php echo user($p['user_id'])['name']; ?>
                            </span>

                            <i class="feather-layers text-warning"></i>
                            <span class="mr-3">
                                <?php echo category($p['category_id'])['title']; ?>
                            </span>

                            <i class="feather-calendar text-success"></i>
                            <span>
                                <?php echo showTime($p['created_at'], "M d, Y"); ?>
                            </span>

                        </div>

                        <p class="text-black-50">
                            <?php echo html_entity_decode(shortenString($p['description'], "1000")); ?>
                        </p>

                

                    </div>
                </div>

            <?php } ?>
        </div>

        <?php require_once "front_panel/right_sidebar.php"; ?>
      
            
            
    </div>
</div>


<?php require_once "front_panel/footer.php"; ?>
  

