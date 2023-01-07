<?php
require_once "conn.php";

if(isset($_POST["add"])){

    $project_name = $_POST['project_name'];
    $project_client = $_POST['project_client'];
    $project_leaders_id = $_POST['project_leaders_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $progress = $_POST['progress'];

    $sql = "INSERT INTO tb_project (project_id,project_name,project_client,project_leaders_id,start_date,end_date,progress) VALUES (NULL,'$project_name','$project_client',
    '$project_leaders_id','$start_date','$end_date','$progress')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Add Data success');</script>";
        header("location: ../../index.php");
    } else {
    echo "Error add record: " . mysqli_error($conn);
    }
}