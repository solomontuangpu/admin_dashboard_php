<?php include "core/auth.php"; ?>
<?php include "template/header.php"; ?>

<?php

    $id = $_GET['id'];
    $current = post($id);

?>

        <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>/post_list.php">Posts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php echo $current['title']; ?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">
                                    <i class="feather-info text-primary"></i> Post Detail
                                </h4>
                                
                                <div class="">
                                    <a href="<?php echo $url; ?>/post_list.php" class="btn btn-outline-primary">
                                        <i class="feather-list"></i>
                                    </a>
                                </div>
                            

                            </div>

                            <hr>

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
                </div>

                <div class="col-12 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">
                                    <i class="feather-info text-primary"></i>Post Viewers
                                </h4>
                                
                                <div class="">
                                    <a href="#" class="btn btn-outline-secondary full-screen-btn">
                                        <i class="feather-maximize-2"></i>
                                    </a>
                                </div>
                            </div>

                            <hr>

                            <table id="table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Who</th>
                                        <th>Device</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        
                                        <?php foreach(viewerCountByPost($id) as $v) { ?>
                                            <tr>
                                                <td class="text-nowrap text-capitalize">
                                                
                                                <?php 
                                                
                                                if($v['user_id'] == 0 ) {
                                                    echo "guest";
                                                } else {
                                                    echo user($v['user_id'])['name'];
                                                }

                                                ?>
                                                
                                                </td>
                                                <td><?php echo $v['device']; ?></td>
                                                <td class="text-nowrap"><?php echo showTime($v['created_at']); ?></td>
                                             </tr>
                                        <?php } ?>
                                        
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


<?php include "template/footer.php"; ?>
