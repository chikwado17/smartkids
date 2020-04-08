<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';
$department_id = 'DP-'.get_rand_numbers(6).'';
$department_name = ucwords(mysqli_real_escape_string($conn, $_POST['group']));


$sql = "SELECT * FROM tbl_group WHERE group_name = '$department_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    header("location:../departments.php?rp=1185");
    }
} else {

$sql = "INSERT INTO tbl_group (group_name,exam_id)
VALUES ('$department_name','$department_id')";

if ($conn->query($sql) === TRUE) {
    header("location:../group.php?rp=9275");
} else {
    header("location:../group.php?rp=5426");
}


}
$conn->close();
?>


