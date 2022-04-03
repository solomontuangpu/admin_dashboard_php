<?php
// common start

function alert($data, $color="danger") {
    return "<p class='alert alert-$color'>$data</p>";
}

function runQuery($sql) {
   
    if(mysqli_query(con(), $sql)) {
      return true;
    } else {
        die("Query Failed: " .mysqli_error());
    }

}

function fetchAll($sql) {

    $query = mysqli_query(con(), $sql);
    $rows = [];

    while($row = mysqli_fetch_assoc($query)) {
        array_push($rows, $row);
    }

    return $rows;
}

function fetch($sql) {

    $query = mysqli_query(con(), $sql);
    $row = mysqli_fetch_assoc($query);

    return $row;
}

function redirect($location) {

    header("location: $location");

}

function linkTo($location) {
    echo "<script> location.href = '$location'; </script>";
}

function showTime($timestamp, $format='d-m-Y') {

     return date($format, strtotime($timestamp));

}

function shortenString($str, $length = "50") {
    return substr($str, 0, $length). "...";
}

function textFilter($text) {

        $text = trim($text);
        $text = htmlentities($text, ENT_QUOTES);
        $text = stripslashes($text);

        return $text;

}

function countTotal($table, $condition=1) {
    $sql = "SELECT COUNT(id) FROM $table WHERE $condition";
    $total = fetch($sql);

    return $total['COUNT(id)'];
}

// common end

// auth start

function register() {
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

   

    if($password == $cpassword) {

       $secure_password = password_hash($password, PASSWORD_DEFAULT);
       $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$secure_password')";
       if(runQuery($sql)) {
           redirect("login.php");
       } 

    } else {

        return alert("Password do not match!!!");

    }

}

function login() {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $query = mysqli_query(con(), $sql);
    $row = mysqli_fetch_assoc($query);
    
    if(!$row) {

        return alert("Email or Password do not correct!!!");

    } else {

        if(!password_verify($password, $row['password'])) {

            return alert("Email or Password do not correct!!!");

        } else {

            session_start();

            $_SESSION['user'] = $row;
            
            redirect("dashboard.php");

        }

    }

}

// auth end

//user start

function user($id) {

    $sql = "SELECT * FROM users WHERE id='$id'";
    return fetch($sql);  

}

function users() {

    $sql = "SELECT * FROM users";
    return fetchAll($sql);  
    
}

//user end


// category start

function categoryAdd() {
    
    $title = textFilter(strip_tags($_POST['title']));
    $user_id = $_SESSION['user']['id'];

    $sql = "INSERT INTO categories (title, user_id) VALUES ('$title', '$user_id')";

    if(runQuery($sql)) {
        linkTo("category_add.php");
    }

}

function categories() {

    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
  
    return fetchAll($sql);  

}

function category($id) {

    $sql = "SELECT * FROM categories WHERE id='$id'";
    return fetch($sql);  

}

function categoryDelete($id) {

    $sql = "DELETE FROM categories WHERE id = $id";
    return runQuery($sql);
}

function categoryUpdate() {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $sql = "UPDATE categories SET title='$title' WHERE id='$id'";
    
    if(runQuery($sql)) {
        linkTo("category_add.php");
    }
}


function categoryPinToTop($id) {

    $sql = "UPDATE categories SET ordering=0";
    mysqli_query(con(), $sql);

    $sql = "UPDATE categories SET ordering='1' WHERE id='$id'";
    return runQuery($sql);
}

function categoryRemovePin() {

    $sql = "UPDATE categories SET ordering=0";
    return runQuery($sql);

}

function isCategory($id) {
    if(category($id)) {
        return $id;
    } else {
        die("Invalid Category");
    }
}

// category end

// post start

function postAdd() {
    
    $title = textFilter($_POST['title']);
    $description = textFilter($_POST['description']);
    $category_id = isCategory($_POST['category_id']);
    $user_id = $_SESSION['user']['id'];

    $sql = "INSERT INTO posts (title, description, user_id, category_id) VALUES ('$title', '$description', '$user_id', '$category_id')";

    if(runQuery($sql)) {

        linkTo("post_list.php");
    }

}

function posts() {

   if($_SESSION['user']['role'] == 2 ) {

            $current_user_id = $_SESSION['user']['id'];
            $sql = "SELECT * FROM posts WHERE user_id='$current_user_id'";

   } else {
    
        $sql = "SELECT * FROM posts"; 
        
    }
    return fetchAll($sql);  

}

function post($id) {

    $sql = "SELECT * FROM posts WHERE id='$id'";
    return fetch($sql);  

}

function postDelete($id) {

    $sql = "DELETE FROM posts WHERE id = $id";
    return runQuery($sql);
}

function postUpdate() {

    $id = $_POST['id'];
    $title = textFilter($_POST['title']);
    $description = textFilter($_POST['description']);
    $category_id = $_POST['category_id'];

    $sql = "UPDATE posts SET title='$title', description = '$description', category_id='$category_id' WHERE id='$id'";
    
    return runQuery($sql);

}
// post end

//front post start

function frontPosts($order_id='id', $order_type='DESC') {
  
    $sql = "SELECT * FROM posts ORDER BY $order_id $order_type"; 
         
    return fetchAll($sql);  
 
 }
 
 function frontCategories() {

    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    return fetchAll($sql);  

 }

 function frontPostsByCategory($category_id, $limit ="99999", $post_id = 0) {
     
    $sql = "SELECT * FROM posts WHERE category_id = $category_id AND id != $post_id ORDER BY id DESC LIMIT $limit"; 
         
    return fetchAll($sql);  
 
 }

 function searchPost($search_key) {

     $sql = "SELECT * FROM posts WHERE title LIKE '%$search_key%' OR description LIKE '%$search_key%' ORDER BY id DESC"; 
         
    return fetchAll($sql);  

 }

 function searchPostByDate($start, $end) {

    $sql = "SELECT * FROM posts WHERE created_at BETWEEN '$start' AND '$end' ORDER BY id DESC"; 
        
   return fetchAll($sql);  

}



 //front post end


 //viewer record start

 function viewerRecord($userId, $postId, $device) {

    $sql = "INSERT INTO viewer_table (user_id, post_id, device) VALUES ('$userId', '$postId', '$device')";

    return runQuery($sql);

 }

 function viewerCountByPost($postId) {

    $sql = "SELECT * FROM viewer_table WHERE post_id= '$postId'";

    return fetchAll($sql);

 }

 function viewerCountByUser($userId) {

    $sql = "SELECT * FROM viewer_table WHERE user_id= '$userId'";
    return fetchAll($sql);
    
 }

 //viewer record end

 // ads start

 function ads() {

    $today = date('Y-m-d');

    $sql = "SELECT * FROM ads WHERE start <= '$today' AND end > '$today'";
    return fetchAll($sql);

 }

 function addAds() {

    $upload_files = $_FILES['image'];
    $file_name = $upload_files['name'];
    $temp_file = $upload_files['tmp_name'];
    $save_folder = "store/";

    $photo_name = $save_folder.uniqid()."_".$file_name;

   
    move_uploaded_file($temp_file, $photo_name);

    $owner = $_POST['owner'];
    $link = $_POST['link'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    

    $sql = "INSERT INTO ads (`owner_name`, `photo`, `link`, `start`, `end`) VALUES ('$owner', '$photo_name', '$link', '$start', '$end')";

    return runQuery($sql);
 }

 function showAdsList() {

    $sql = "SELECT * FROM ads";
    return fetchAll($sql);

 }

 function adsDelete($id) {

    $sql = "SELECT * FROM ads WHERE id = $id";
    unlink(fetch($sql)['photo']);

    $sql = "DELETE FROM ads WHERE id = $id";
    return runQuery($sql);
    
 }

 //ads end

 // wallet start

 function transaction() {

    $fromId = $_SESSION['user']['id'];
    $to = $_POST['to_user'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    //   // update transfer balance from sender
    $fromUser = user($fromId)['balance'];
    $amountLeft = $fromUser - $amount;
    
    if($fromUser >= $amount) {

        $sql = "UPDATE users SET balance='$amountLeft' WHERE id= $fromId";
        mysqli_query(con(), $sql);
    
        // //  //update receive balancer for reciever
        $addRecieveAmount = user($to)['balance'] + $amount;
        $sql = "UPDATE users SET balance='$addRecieveAmount' WHERE id= $to";
        mysqli_query(con(), $sql);
    
        // add to transaction
        $sql = "INSERT INTO `transaction`(`from_user`, `to_user`, `amount`, `description`) VALUES ('$fromId','$to','$amount','$description');";
        runQuery($sql);

    } 

 }


 function showTransactions() {

    $userId = $_SESSION['user']['id'];

    if($_SESSION['user']['role'] == 0) {
        
        $sql = "SELECT * FROM transaction";
    
    } else {

        $sql = "SELECT * FROM transaction WHERE from_user = $userId OR to_user = $userId";

    }
    return fetchAll($sql);  

}

function showTransaction($id) {

        $sql = "SELECT * FROM transaction WHERE id='$id'";
        return fetch($sql);  

}
 // wallet end

 //dashboard start

function dashboardPost($limit = 9999999) {

        if($_SESSION['user']['role'] == 2 ) {
     
                 $current_user_id = $_SESSION['user']['id'];
                 $sql = "SELECT * FROM posts WHERE user_id='$current_user_id' ORDER BY id DESC LIMIT $limit";
     
        } else {
         
             $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $limit"; 
             
         }
         return fetchAll($sql);  
     
     

}

 //dashboard end

 //api start

 function apiOutput($arr) {
     return json_encode($arr);
 }

 //api end