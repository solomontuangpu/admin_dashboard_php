<?php include "core/auth.php"; ?>
<?php include "core/is_editor&admin.php"; ?>
<?php include "template/header.php"; ?>

        <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">
                                    <i class="feather-layers text-primary mr-2"></i> Category Manager
                                </h4>
                                <a href="#" class="btn btn-outline-secondary full-screen-btn">
                                        <i class="feather-maximize-2"></i>
                                </a>
                            </div>
                            <hr>

                            <?php

                                if(isset($_POST['add_category'])) {

                                     categoryAdd();

                                }

                            ?>

                            <form method="post">
                                <div class="form-inline">
                                    <input type="text" name="title" class="form-control mr-2">
                                    <button class="btn btn-primary" name="add_category">Add Category</button>
                                </div>
                            </form>

                            <br>

                            <?php include "category_list.php"; ?>
                           
                        </div>
                    </div>
                </div>
            </div>


<?php include "template/footer.php"; ?>
