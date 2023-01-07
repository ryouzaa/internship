<?php
    require_once "assets/lib/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intership Test</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body style="background:#A0C3D2;">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center title">Project Monitoring</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="add_project.php" class="btn btn-md btn-info" style="margin-bottom:25px;">ADD DATA</a>
            <table class="table align-middle mb-0 bg-white" id="myTable">
                <thead class="bg-light">
                    <tr>
                        <th>PROJECT NAME</th>
                        <th>CLIENT</th>
                        <th>PROJECT LEADER</th>
                        <th>START DATE</th>
                        <th>END DATE</th>
                        <th>PROGRESS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM tb_project a, tb_project_leaders b where a.project_leaders_id=b.project_leaders_id";
                        $result = $conn->query($sql);
                        
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                    ?>
                        <tr>
                            <td><?=$row['project_name']?></td>
                            <td><?=$row['project_client']?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/avatar/<?=$row['avatar']?>" alt="" style="width: 40px; height: 40px; margin:5px;" class="rounded-circle"/>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-0"><?=$row['fullname']?></p>
                                        <p class="text-muted mb-0"><?=$row['email']?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p>
                                    <?php
                                        $start_date_created = date_create($row['start_date']);
                                        $start_date = date_format($start_date_created, 'd M Y');
                                        echo $start_date;
                                    ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php
                                        $end_date_created = date_create($row['end_date']);
                                        $end_date = date_format($end_date_created, 'd M Y');
                                        echo $end_date;
                                    ?>
                                </p>
                            </td>
                            <td>
                                <?php 
                                    $percentage = $row['progress'];
                                    if($percentage < 100){
                                ?>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?=$percentage?>%" aria-valuenow="<?=$percentage?>" aria-valuemin="0" aria-valuemax="100"><?=$percentage?>%</div>
                                    </div>
                                <?php }else{ ?>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?=$percentage?>%" aria-valuenow="<?=$percentage?>" aria-valuemin="0" aria-valuemax="100"><?=$percentage?>%</div>
                                    </div>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="assets/lib/delete_project.php?project_id=<?=$row['project_id']?>" class="btn btn-sm btn-danger"><ion-icon name="trash"></ion-icon></a>
                                <a href="pages_edit.php?project_id=<?=$row['project_id']?>" class="btn btn-sm btn-success"><ion-icon name="pencil"></ion-icon></a>
                            </td>
                        </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
  </div>
  <div class="row">
      <div class="col-md-12">
          <h6 class="text-right credit">Created By</h6>
          <h5 class="text-right">Yanuario Bagas Prayoga</h5>
      </div>
  </div>
</div>
<!-- Script -->    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Icons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- Data tables-->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
</body>
</html>