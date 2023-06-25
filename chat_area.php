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
    <title>Chat Area</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="chat_are.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
       .input_field{
        width:210px;
        
       }
    </style>
</head>
<body>
    <div class="container">
        <section class="users">
            <div class="imge">
              <header>
                <?php
                        include_once "php/config.php";
                        $user_id=mysqli_real_escape_string($conn,$_GET['user_id']);
                        $sql=mysqli_query($conn,"SELECT * FROM users WHERE unique_id={$user_id}");
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
            </div>
             </header>

             <div class="area">
                </div>

                <div class="typing  fixed">
                    <form action="#" class="typing-area" autocomplete="off">
                    <input type="text" name="incoming_id" value="<?php echo $user_id;?>" hidden >
                    <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id'];?>" hidden>
                    <input type="text" name="message" id="inputfield" class="input_field" placeholder="Type a message">
                    <button><i class="send material-icons">send</i></button>
                     </form>
                </div>

    </div>
              <script src="javascript/chats_area.js"></script>
    
</body>
</html>