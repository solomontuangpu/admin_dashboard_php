<?php include "core/auth.php"; ?>
<?php include "template/header.php"; ?>


<?php

    if(isset($_POST['makeTransaction'])) {

       if( transaction()) {
           linkTo("wallet.php");
       }

    }
?>

        <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Walllet</li>
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
                                    <i class="feather-dollar-sign text-primary mr-2"></i> My Wallet
                                </h4>
                                   
                                <div class="">
                                    <span class="font-weight-bolder text-primary mr-2">
                                        <i class="feather-user"></i>
                                        Your Balance : $ <?php echo user($_SESSION['user']['id'])['balance']; ?>
                                    
                                    </span>

                                    <a href="#" class="btn btn-outline-secondary full-screen-btn">
                                            <i class="feather-maximize-2"></i>
                                    </a>
                                </div>
                            </div>
                            <hr>

                            <form method="post">
                                <div class="form-inline">
                                    <select name="to_user" id="" class="custom-select text-capitalize mr-2 w-25" required>
                                        <option value="0" class="" selected disabled>Select Users</option>
                                        <?php foreach(users() as $user) { ?>   
                                            <?php if($user['id'] != $_SESSION['user']['id']) { ?>
                                                <option value="<?php echo $user['id']; ?>" >
                                                    <?php echo $user['name']; ?>
                                                </option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <input type="number" name="amount" min="10" max="<?php echo user($_SESSION['user']['id'])['balance']; ?>" placeholder="$ Amount" class="form-control w-25 mr-2" required>
                                    <input type="text" name="description" placeholder="Description" class="form-control w-25 mr-2" required>
                                    <button class="btn btn-primary" name="makeTransaction">Send Now</button>
                                </div>
                            </form>
                                                
                            <hr>

                            <table id="table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Date/Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach(showTransactions() as $t) { ?>
                                        <tr>
                                            <td><?php echo $t['id']; ?></td>
                                            <td><?php echo user($t['from_user'])['name']; ?></td>
                                            <td><?php echo user($t['to_user'])['name']; ?></td>
                                            <td><?php echo $t['amount']; ?></td>
                                            <td><?php echo $t['description']; ?></td>
                                            <td><?php echo date("M d, Y / h:i",strtotime($t['created_at'])); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>


<?php include "template/footer.php"; ?>
