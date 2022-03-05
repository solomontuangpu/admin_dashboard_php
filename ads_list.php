<?php include "core/auth.php"; ?>
<?php include "template/header.php"; ?>

<link rel="stylesheet" href="<?php echo $url ?>/assets/vendor/data_table/dataTables.bootstrap4.min.css">   

        <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ads List</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">
                                    <i class="feather-list text-primary"></i> Ads List
                                </h4>
                                
                                <div class="">
                                    <a href="<?php echo $url; ?>/ads_add.php" class="btn btn-outline-primary">
                                        <i class="feather-plus"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-secondary full-screen-btn">
                                        <i class="feather-maximize-2"></i>
                                    </a>
                                </div>
                            </div>

                            <hr>
                            
                             <table id="table" class="table table-hover table-bordered table-striped mt-3 mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Owner</th>
                                        <th>Photo</th>
                                        <th>Link</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Control</th>
                                        <th>Created_at</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 

                                        foreach(showAdsList() as $ads) {
                                        
                                    ?>

                                            <tr>
                                                <td><?php echo $ads['id']; ?></td>
                                                <td><?php echo $ads['owner_name']; ?></td>
                                                <td><?php echo shortenString($ads['photo']); ?></td>
                                                <td><?php echo shortenString($ads['link']); ?></td>
                                                <td class="text-nowrap"><?php echo $ads['start']; ?></td>
                                                <td class="text-nowrap"><?php echo $ads['end']; ?></td>

                                                <td class="text-nowrap">
                                                    <a href="ads_detail.php?id=<?php echo $ads['id']; ?>" class="btn btn-outline-info btn-sm disabled">
                                                        <i class="feather-info"></i>
                                                    </a>

                                                    <a href="ads_delete.php?id=<?php echo $ads['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete?')">
                                                        <i class="feather-trash-2"></i>
                                                    </a>

                                                    <a href="ads_update.php?id=<?php echo $ads['id']; ?>" class="btn btn-outline-primary btn-sm disabled">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                </td>
                                                <td class="text-nowrap"><?php echo showTime($ads['created_at'], 'M d,Y'); ?></td>
                                            </tr>

                                    <?php }; ?>
                                </tbody>
                            </table>
                          
                        </div>
                    </div>
                </div>
            </div>


<?php include "template/footer.php"; ?>
