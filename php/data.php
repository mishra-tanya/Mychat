<?php
    while($row=mysqli_fetch_assoc($sql)){

        $sql2="SELECT * FROM messages WHERE (in_msg_id = {$row['unique_id']} 
        OR out_msg_id = {$row['unique_id']}) AND (out_msg_id = {$outgoing_id} OR
        in_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

        $query2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2)>0){
            $res="Tap to See Messages";
        }
        else{
            $res="No Message Available";
        }
        $msg=$res;
        $output .= ' <a href="chat_area.php?user_id='.$row['unique_id'].'">
                    <div class="content">
                        <img src="php/images/' . $row["img"] .' " alt="">
                        <div class="detail">
                            <span> ' . $row['fname'] . " " . $row['lname'] . '</span>
                            <p class="active">'.$msg.'</p>
                        </div>
                    </div>
                </a>';

       }
?>