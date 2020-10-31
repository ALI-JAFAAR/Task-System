<?php include "inc/head.php";?>






<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange" data-background-color="black" data-image="assets/img/sidebar-2.jpg">
      <div class="logo" style="padding: 0px 0px !important;"><a href="profile.php" class="social-profile simple-text logo-normal">
          <img  src="img/5.png" width="80" height="80" style="background-color: white;border-radius: 25%">
          <div class="profile-hvr m-t-15">
              <i class="material-icons">edit</i>
          </div>
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav" style="margin:auto;">
          <li class="nav-item   ">
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php if (Session::get('User_id') !='' && Session::get('type') ==0){?>
          <li class="nav-item ">
            <a class="nav-link" href="dept.php">
              <i class="material-icons">home</i>
              <p>Department</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">people</i>
              <p>Employees</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="search.php">
              <i class="material-icons">find_in_page</i>
              <p>Search</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="report.php">
              <i class="material-icons">wysiwyg</i>
              <p>Report</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="task.php">
              <i class="material-icons">book</i>
              <p>Task</p>
            </a>
          </li>
          <?php }?>
          <li class="nav-item ">
            <a class="nav-link" href="waiting_task.php">
              <i class="material-icons">assignment_late</i>
              <p>Waiting Task</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="submition.php">
              <i class="material-icons">assessment</i>
              <p>Submition Task</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="review.php">
              <i class="material-icons">assignment</i>
              <p>In Review Task</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="ready.php">
              <i class="material-icons">fact_check</i>
              <p>Done Task</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="chat.php">
              <i class="material-icons">dashboard</i>
              <p>Public Chat</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="profile.php">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li>
              <li class="nav-item ">
            <a class="nav-link" href="?logout">
              <i class="material-icons">cancel</i>
              <p style="margin: auto;text-align: center;display: inline-block;">Sign Out</p>
            </a>
          </li>
            </ul>
          </div>
        </div>
      </nav>
















      <!-- End Navbar -->
      <?php

        if(isset($_GET["del"])){
          $res = $emp->delete_task($_GET["del"]);
        }
        if(isset($_GET["open"])){
          $res = $usr->task_zero($_GET["open"]);
        }
      ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12"  id="tickethide">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Search Task</h4>
                </div>
                <div class="card-body">
                  <form method="get" >
                      <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Task ID</label>
                            <input name="q" style="background-color: #191e32;" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <br>
                      <br>
                      <center><button type="submit" class="btn btn-warning">Search</button></center>
                      <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title ">Tasks</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>Title</th>
                        <th>Details</th>
                        <th>Department</th>
                        <th>Creation Date</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php 
                        if(isset($_GET["q"])){
                          $res = $emp->Get_All_Task_by_title($_GET["q"]);
                          if($res){
                            while ($row = $res->fetch_assoc()) {
                              $id = $row["dept_id"];
                              $re= $usr->get_dept_by_id($id)->fetch_assoc();
                              $date = $usr->get_task_dates($row["task_id"]);

                        ?>
                        <tr>
                          <td><?php echo $row["title"]?></td>
                          <td><?php echo $row["details"]?></td>
                          <td><?php echo $re["name"]?></td>
                          <td>
                            <?php 
                            
                            $new_time = date('Y-m-d H:i',strtotime('+8 hour +7 minutes',strtotime($row["date_created"])));
                            
                            echo $new_time;//$row["date_created"];
                            ?>
                            <?php
                                if($date){ ?>
                                  <br><br><p>UPDATE DATES </p>
                                <?php  
                                  while ($d = $date->fetch_assoc()){
                                      //$new_time = date('Y-m-d H:i',strtotime('+8 hour -4 minutes',strtotime($d["date_created"])));
                                     $new_time = $d["date_created"];
                                     // $new_time = date("Y-m-d H:i:s", strtotime('-3 hours', $d["date_created"]));
                                    echo '
                                      <li style="font-weight:bold;color:#fff">'.$new_time.'</li><br>
                                      <p style="color:#ff9800;">'.$d["notes"].'  <br>   '  .$d["status"]. '</p>
                                    ';
                                  }
                                }
                            ?>
                          </td>
                          <td>
                            <a class="btn btn-danger" href="?open=<?php echo $row['task_id'];?>">Re open Task</a>
                            <a class="btn btn-danger" href="?del=<?php echo $row['task_id'];?>">Delete</a>
                          </td>
                        </tr>
                        <?php }} }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
<?php include "inc/footer.php";?>