<?php session_start(); ?>

<?php  require_once "front_panel/head.php"; ?>

    <title>My Blog | Home</title>

<?php    require_once "front_panel/site_head.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-4">
                    <li class="breadcrumb-item text-black-50">
                        Home
                    </li>
                </ol>
            </nav>

            <div class="dropdown mb-3 text-right">
                  <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                     <i class="feather-minimize-2"></i>
                      Sort Posts
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="?order_id=created_at&order_type=asc">
                          <i class="feather-chevrons-down"></i>
                          By Oldest Post
                      </a>
                      <a class="dropdown-item" href="?order_id=created_at&order_type=desc">
                        <i class="feather-chevrons-up"></i>
                          By Newest Post
                      </a>
                      <a class="dropdown-item" href="/">
                        <i class="feather-rotate-cw"></i>
                            Default
                      </a>
                  </div>
              </div>

            <?php   
               
                if(isset($_GET['order_id']) && isset($_GET['order_type'])) {

                    $order_id = $_GET['order_id'];
                    $order_type = strtoupper($_GET['order_type']);
                    $posts = frontPosts($order_id, $order_type);

                } else {

                    $posts = frontPosts();

                }

            ?>

            <?php foreach($posts as $p) { ?>
            
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
  

