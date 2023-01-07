<?php
require_once "conn.php";

$project_id = $_POST['project_id'];
$project_name = $_POST['project_name'];
$project_client = $_POST['project_client'];
$project_leaders_id = $_POST['project_leaders_id'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$progress = $_POST['progress'];

if(isset($_POST["update"])){
    $sql = "UPDATE tb_project SET project_id='$project_id',
    project_name='$project_name', project_client='$project_client',
    project_leaders_id='$project_leaders_id',start_date='$start_date',
    end_date='$end_date',progress='$progress' WHERE project_id='$project_id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('update success');</script>";
        header("location: ../../index.php");
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }
}