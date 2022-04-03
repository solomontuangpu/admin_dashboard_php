<?php session_start(); ?>
<?php  require_once "front_panel/head.php"; ?>

    <title>My Blog | Post Detail </title>

<?php    require_once "front_panel/site_head.php"; ?>

<?php

    if(isset($_GET['id'])) {

        $id = $_GET['id'];
        $current = post($id);

    } else {

        linkTo("index.php");

    }

    
    if(!$current) {
        linkTo("index.php");
    } 

    $currentCategory = $current['category_id'];

    if($_SESSION['user']) {

        $userId = $_SESSION['user']['id'];

    } else {

        $userId = 0;

    }

    viewerRecord($userId, $id, $_SERVER['HTTP_USER_AGENT']);
    
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-4">
                    <li class="breadcrumb-item text-black-50"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                    <li class="breadcrumb-item text-black-50">
                       Post Detail
                   </li>
                </ol>
            </nav>
            
            <div class="card mb-3">
                <div class="card-body">
                    <h4><?php echo $current['title']; ?></h4>

                        <div class="my-3">
                            <i class="feather-user text-primary"></i>
                            <span class="mr-3">
                                <?php echo user($current['user_id'])['name']; ?>
                            </span>

                            <i class="feather-layers text-warning"></i>
                            <span class="mr-3">
                                <?php echo category($current['category_id'])['title']; ?>
                            </span>

                            <i class="feather-calendar text-success"></i>
                            <span>
                                <?php echo showTime($current['created_at'], "M d, Y"); ?>
                            </span>

                        </div>


                        <div class="">
                                <?php echo html_entity_decode($current['description'], ENT_QUOTES); ?>
                        </div>
                </div>
            </div>

            <div class="row">
                
              <div class="col-12">
                  <h4> Related Post</h4>

                 <div class="row">

                 <?php foreach(frontPostsByCategory($currentCategory, 2, $id) as $p) { ?>
                    
                    <div class="col-12 col-md-6">

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

                                    <br>

                                    <i class="feather-calendar text-success"></i>
                                    <span>
                                        <?php echo showTime($p['created_at'], "M d, Y"); ?>
                                    </span>

                                </div>

                                <p class="text-black-50">
                                    <?php echo html_entity_decode(shortenString($p['description'], "700")); ?>
                                </p>

                        

                            </div>
                        </div>

                    </div>

                <?php } ?>

                 </div>

              </div>

            </div>

        </div>

        <?php require_once "front_panel/right_sidebar.php"; ?>
                         
    </div>
</div>


<?php require_once "front_panel/footer.php"; ?>
  

