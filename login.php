<?php require_once "core/base.php" ?>
<?php require_once "core/functions.php" ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/style.css">
</head>
<body style="background-color: var(--primary-soft)">

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-5">
                <div class="card">
                    <div class="card-body rounded-lg">
                       <div class="text-center">
                           
                            <h4 class="text-primary">
                                <i class="feather-users"></i>
                                Admin Login
                            </h4>
                       </div>
                        <hr>

                        <?php

                            if(isset($_POST['login-btn'])) {

                                echo login();

                            }

                        ?>

                        <form method="post">
                            <div class="form-group font-weight-bold">
                                <label for="">
                                    <i class="text-primary feather-mail"></i>    
                                    Your Email
                                </label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group font-weight-bold">
                                <label for="">
                                    <i class="text-primary feather-lock"></i>    
                                    Password
                                </label>
                                <input type="password" min="8" name="password" class="form-control" required>
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary" name="login-btn">Log In</button>

                                <a href="register.php" class="btn btn-outline-primary">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="<?php echo $url; ?>/assets/vendor/jquery.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="<?php echo $url; ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
</html>
</html>