<?php
    session_start();
    include_once "php/config.php";
    if(!isset($_SESSION['unique_id'])){
        header("location: login_page.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Interface</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>
<body>
    <div class="container">
        <section class="users">
            <section class="form_signup">MyChat</section>
            <div class="imge">
              <header>

              <?php
                    include_once "php/config.php";
                    $sql=mysqli_query($conn,"SELECT * FROM users WHERE unique_id={$_SESSION['unique_id']}");
                    if(mysqli_num_rows($sql)>0){
                        $row=mysqli_fetch_assoc($sql);
                    }
              ?>


                <div class="content">
                    <img src="php/images/<?php echo $row['img'] ;?>" alt="">
                    <div class="detail">
                        <span><?php echo $row['fname']." ".$row['lname']; ?></span>
                        <p class="active"><?php  echo $row['status']; ?></p>
                    </div>
                </div>
                    <a href="php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
             </header>

            <div class="search_user input">
                <input type="text" placeholder="Enter user name">
                <a href="#"><i class="fa fa-search user_search"></i></a>
            </div>

        <div class="users_list">
           
            
        </div>
        
        </section>
    </div>
    <script src="javascript/users.js"></script>
</body>
</html>