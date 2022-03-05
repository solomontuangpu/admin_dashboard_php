<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>

<div class="row">
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-eye h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up">
                                <?php echo countTotal('viewer_table'); ?>
                            </span>
                        </p>
                        <p class="mb-0 text-black-50">Today Visitors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/post_list.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-list h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up">
                                <?php echo countTotal('posts'); ?>
                            </span>
                        </p>
                        <p class="mb-0 text-black-50">Total Post</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/category_add.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-layers h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up">
                                <?php echo countTotal('categories'); ?>
                            </span>
                        </p>
                        <p class="mb-0 text-black-50">Total Categories</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/user_list.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-users h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up">
                                <?php echo countTotal('users') ?>
                            </span>
                        </p>
                        <p class="mb-0 text-black-50">Total Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row align-items-start">
        <div class="col-12 col-xl-7">
            <div class="card overflow-hidden shadow mb-4">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <h4 class="mb-0">Visitors</h4>

                        <div class="">
                            <img src="<?php echo $url; ?>/assets/img/user/avatar1.jpg" class="ov-img rounded-circle" alt="">
                            <img src="<?php echo $url; ?>/assets/img/user/avatar2.jpg" class="ov-img rounded-circle" alt="">
                            <img src="<?php echo $url; ?>/assets/img/user/avatar3.jpg" class="ov-img rounded-circle" alt="">
                            <img src="<?php echo $url; ?>/assets/img/user/avatar4.jpg" class="ov-img rounded-circle" alt="">
                            <img src="<?php echo $url; ?>/assets/img/user/avatar5.jpg" class="ov-img rounded-circle" alt="">
                        </div>
                    </div>
                    <canvas id="ov" height="140"></canvas>

                </div>
            </div>
        </div>

    <div class="col-12 col-md-6 col-xl-5">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="mb-0">Categories & Posts</h4>
                    <div class="">
                        <i class="feather-pie-chart h4 mb-0 text-primary"></i>
                    </div>
                </div>
                <canvas id="op" height="200"></canvas>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card overflow-hidden mb-4">

            <div class="">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="mb-0 font-weight-bolder">Recent Posts</h4>
                    <div class="">

                        <?php
                        
                            $current_userId = $_SESSION['user']['id'];
                            $post_total = countTotal("posts");
                            $current_user_post = countTotal("posts", "user_id = $current_userId");
                            $current_user_post_percantage = ($current_user_post/$post_total) * 100;
                            
                            $percantage =  floor($current_user_post_percantage);
                        ?>
                        <small><b>Your Posts : <?php echo $current_user_post; ?></b></small>
                        <div class="progress" style="width: 300px; height: 10px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $percantage; ?>%" aria-valuenow="<?php echo $percantage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <table class="table table-hover table-bordered table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <?php if($_SESSION['user']['role'] < 1  ) { ?>

                                <th>User_id</th>

                            <?php } ?>

                            <th>Viewer Counter</th>

                            <th>Control</th>
                            <th>Created_at</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 

                            foreach(dashboardPost(5) as $c) {
                            
                        ?>

                                <tr>
                                    <td><?php echo $c['id']; ?></td>
                                    <td><?php echo shortenString($c['title']); ?></td>
                                    <td><?php echo shortenString(strip_tags(html_entity_decode($c['description']))); ?></td>
                                    <td class="text-nowrap"><?php echo category($c['category_id'])['title']; ?></td>

                                    <?php if($_SESSION['user']['role'] < 1  ) { ?>

                                    <td class="text-nowrap"><?php echo user($c['user_id'])['name']; ?></td>

                                    <?php } ?>

                                    <td>
                                        
                                        <?php echo count(viewerCountByPost($c['id'])); ?>

                                    </td>

                                    <td class="text-nowrap">
                                        <a href="post_detail.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-info btn-sm">
                                            <i class="feather-info"></i>
                                        </a>

                                        <a href="post_delete.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete?')">
                                            <i class="feather-trash-2"></i>
                                        </a>

                                        <a href="post_update.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-primary btn-sm">
                                            <i class="feather-edit"></i>
                                        </a>
                                    </td>
                                    <td class="text-nowrap"><?php echo showTime($c['created_at'], 'M d,Y'); ?></td>
                                </tr>

                        <?php }; ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

   
</div>

<?php include "template/footer.php"; ?>


<script>
 $('.counter-up').counterUp({
    delay: 10,
    time: 1000
});

<?php 

$date_arr = [];                   
$daily_visitor = [];
$daily_transaction = [];

for($i = 0; $i<10; $i++) {

    $today_date = date("Y-m-d");
    $date = date_create($today_date);
   
    date_sub($date,date_interval_create_from_date_string("$i days"));
    $current = date_format($date, "Y-m-d");
    array_push($date_arr, $current);
    
    $viewer_result = countTotal("viewer_table", "CAST(created_at AS DATE) = '$current'");
    array_push($daily_visitor, $viewer_result);
    
    $transaction_result = countTotal("transaction", "CAST(created_at AS DATE) = '$current'");
    array_push($daily_transaction, $transaction_result);
}

?>

let dateArr = <?php echo json_encode($date_arr); ?>; //reverse date

let viewerCountArr = <?php echo json_encode($daily_visitor); ?>; //daily viewer coutner
let dailyTransaction = <?php echo json_encode($daily_transaction); ?>

let ov = document.getElementById('ov').getContext('2d');
let ovChart = new Chart(ov, {
    type: 'line',
    data: {
        labels: dateArr.reverse(),
        datasets: [
            {
                label: 'Daily Viewer',
                data: viewerCountArr.reverse(),
                backgroundColor: [
                    '#28a74530',
                ],
                borderColor: [
                    '#28a745',
                ],
                borderWidth: 1,
                tension:0
            },
            {
                label: 'Daily Transaction',
                data: dailyTransaction.reverse(),
                backgroundColor: [
                    '#17a2b850',
                ],
                borderColor: [
                    '#28a785',
                ],
                borderWidth: 1,
                tension:0
            }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                display:false,
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes:[
                {
                    display:false,
                    gridLines:[
                        {
                            display:false
                        }
                    ]
                }
            ]
        },
        legend:{
            display: true,
            shape:"circle",
            position: 'top',
            labels: {
                fontColor: '#333',
                usePointStyle:true
            }
        }
    }
});


// categories and posts start

<?php

    $totalCategory = [];
    $totalPostByCategory = [];

    foreach(categories() as $c) {

       array_push($totalCategory, $c['title']);
       array_push($totalPostByCategory, countTotal('posts', "category_id = {$c['id']}")); 
    }
    
?>

let postsPerCategories = <?php echo json_encode($totalPostByCategory); ?>;
let categories = <?php echo json_encode($totalCategory); ?>;

let op = document.getElementById('op').getContext('2d');
let opChart = new Chart(op, {
    type: 'doughnut',
    data: {
        labels:categories,
        datasets: [{
            label: '# of Votes',
            data:postsPerCategories,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                display:false,
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes: [
                {
                    display:false
                }
            ]
        },
        legend:{
            display: true,
            position: 'bottom',
            labels: {
                fontColor: '#333',
                usePointStyle:true
            }
        }
    }
});

// categories and posts start
</script>




