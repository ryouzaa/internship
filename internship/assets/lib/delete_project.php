<?php
require_once "conn.php";

    $project_id = $_GET['project_id'];

    $sql = "DELETE FROM tb_project WHERE project_id='$project_id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Delete success');</script>";
        header("location: ../../index.php");
    } else {
    echo "Error Delete record: " . mysqli_error($conn);
    }
