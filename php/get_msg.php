<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $output = "";
    $query = "SELECT * FROM messages WHERE (out_msg_id = {$outgoing_id} AND in_msg_id = {$incoming_id}) OR (out_msg_id = {$incoming_id} AND in_msg_id = {$outgoing_id}) ORDER BY msg_id";

    $sql = mysqli_query($conn, $query);
    if ($sql) {
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                if ($row['out_msg_id'] == $outgoing_id) {
                    $output .= '<div class="incoming message">
                                    <p>' . $row['msg'] . '</p>
                                </div>';
                } else {
                    $output .= '<div class="outgoing message">
                                    <p>' . $row['msg'] . '</p>
                                </div>';
                }
            }
            echo $output;
        } 
    } 
} else {
    header("location: login_page.php");
}
?>
