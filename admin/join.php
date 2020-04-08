<?php 

include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include 'includes/fetch_records.php';

include '../database/config.php';

$eid = $_GET['eid'];
$Id = $_GET['id'];


$sql = mysqli_query($conn, "update tbl_users set groups_id='$eid' where user_id='$Id'");


if($sql) {
  
    $URL = "./add_group_users.php?eid=$eid";
    echo "<script>location.href='$URL'</script>";
}

// $sql = "UPDATE tbl_users SET groups_id='$gp' WHERE id='$id'";
// $result = $conn->query($sql);

//     if($result){
//     header("location:add_group_users.php?id=DP-027366");
//     }

?>


