<?php include "core/auth.php"; ?>
<?php include "template/header.php"; ?>

        <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>/ads_lists.php">Ads</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Ads</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <?php

                if(isset($_POST['addAds'])) {

                    addAds();

                }

                ?>

            <form class="row" method="post" enctype="multipart/form-data">
                <div class="col-12 col-xl-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">
                                    <i class="feather-plus-circle text-primary"></i> Add New Ads
                                </h4>
                                <a href="<?php echo $url; ?>/ads_list.php" class="btn btn-outline-primary">
                                    <i class="feather-list"></i>
                                </a>
                            </div>
                            <hr>
                         
                               <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Ads Owner</label>
                                        <input type="text" name="owner" class="form-control" required>
                                    </div>   
                                    <div class="form-group col-md-6">
                                        <label for="">Website Link</label>
                                        <input type="text" name="link" class="form-control" required>
                                    </div>         
                               </div>                    
                               <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Start Date</label>
                                        <input class="form-control" type="date" name="start" id="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">End Date</label>
                                        <input class="form-control" type="date" name="end" id="" required>
                                    </div>
                               </div>
                                    <div class="form-group">
                                        <label for="">
                                            <p class="mb-0">Upload Photo</p>
                                        </label>
                                        <input type="file" name="image" accept="image/png, image/jpeg, image/gif" id="" class="custom-control pl-0" required>
                                    </div>
                                <hr>

                               <button class="btn btn-primary" name="addAds">Add Ads</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-4">

                </div>
            </form>


<?php include "template/footer.php"; ?>
