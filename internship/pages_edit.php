<?php
    require_once "assets/lib/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit Data Project</p>
                <?php
                    $project_id = $_GET['project_id'];
                    $sql = "SELECT * FROM tb_project WHERE project_id='$project_id'";
                    $result = $conn->query($sql);

                    while($row = $result->fetch_assoc()){
                ?>
                <form class="mx-1 mx-md-4" method="post" action="assets/lib/proses_update.php">
                  <input type="hidden" name="project_id" value="<?=$row['project_id']?>">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" name="project_name" class="form-control" value="<?=$row['project_name']?>"/>
                      <label class="form-label" for="form3Example1c">Project Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example3c" name="project_client" class="form-control" value="<?=$row['project_client']?>"/>
                      <label class="form-label" for="form3Example3c">Client</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <select name="project_leaders_id" class="form-control">
                            <?php 
                                $get_project_leader = "SELECT fullname FROM tb_project_leaders WHERE project_leaders_id=$row[project_leaders_id]";
                                $res_project_leader = $conn->query($get_project_leader);
                                while($dt_leader = $res_project_leader->fetch_assoc()){
                                    echo "<option value='$row[project_leaders_id]'>$dt_leader[fullname]</option>";
                                }
                                $sql = "SELECT * FROM tb_project_leaders";
                                $res = $conn->query($sql);
                                while($dt = $res->fetch_assoc()){
                                    echo "<option value='$dt[project_leaders_id]'>$dt[fullname]</option>";
                                } 
                            ?>
                        </select>
                      <label class="form-label" for="form3Example4c">Project Leader</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="date" name="start_date" class="form-control" value="<?=$row['start_date']?>">
                      <label class="form-label" for="form3Example4cd">Start Date</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="date" name="end_date" class="form-control" value="<?=$row['end_date']?>">
                      <label class="form-label" for="form3Example4cd">End Date</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <small><?=$row['progress']?>%</small>
                    <input type="range" class="form-control-range" id="formControlRange" name="progress" value="<?=$row['progress']?>">
                    <label for="formControlRange">Progress</label>
                </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="update" class="btn btn-primary btn-lg">Update</button>
                  </div>

                </form>
                <?php } ?>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<!-- Script -->    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>