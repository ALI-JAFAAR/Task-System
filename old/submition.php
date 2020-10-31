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
          <li class="nav-item ">
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
          <li class="nav-item active">
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
        if(isset($_POST["add"])){
          $res = $emp->add_task($_POST);
        }
        if(isset($_GET["del"])){
          $res = $emp->delete_task($_GET["del"]);
        }
        if(isset($_POST["change"])){
          $res = $emp->change_task_dept($_POST["dept_id"],$_POST["pre_task"]);
        }
        if(isset($_GET["two"])){
          $res = $usr->task_two($_GET["two"]);
        }
        if(isset($_GET["back"])){
          $res = $usr->back_one($_GET["back"],$_GET["note"]);
        }
      ?>
      <div class="content">
        <div class="container-fluid">
          <?php if(isset($_GET["change"])){?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Change Task Department</h4>
                </div>
                <div class="card-body">
                  <form method="post" >
                      <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="hidden" name="pre_task" value="<?php echo $_GET['change'];?>">
                            <label class="bmd-label-floating">Department</label>
                            <select name="dept_id" style="background-color: #191e32;" type="text" class="form-control option_class">
                              <option></option>
                              <?php $res = $usr->Get_department();
                              if($res){
                                $i=0;
                                while ($row = $res->fetch_assoc()) {
                              ?>
                              <option value="<?php echo $row['dept_id']?>"><?php echo $row["name"]?></option>
                            <?php }}?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <br>
                      <center><button type="submit" class="btn btn-primary" name="change">Save</button></center>
                      <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php }?>
          <?php if(Session::get('User_id') !='' && Session::get('type') ==0){?>
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
                        <th>ID</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Department</th>
                        <th>Creation Date</th>
                        <th>Deadline</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php 
                          $res = $emp->Get_All_Task_1();
                          if($res){
                            while ($row = $res->fetch_assoc()) {
                              $id = $row["dept_id"];
                              $re= $usr->get_dept_by_id($id);
                              if($re)
                                $re = $re->fetch_assoc();
                        ?>
                        <tr>
                          <td><?php echo $row["task_id"]?></td>
                          <td><?php echo $row["title"]?></td>
                          <td><?php echo $row["details"]?></td>
                          <td><?php echo $re["name"]?></td>
                          <td><?php echo $row["date_created"]?></td>
                          <td><?php echo $row["deadline"];?></td>
                          <td>
                            <a class="btn btn-danger" href="?del=<?php echo $row['task_id'];?>">Delete</a>
                          </td>
                        </tr>
                        <?php }}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }else if(Session::get('User_id') !='' && Session::get('type') ==1){?>
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
                        <th>ID</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Department</th>
                        <th>Note</th>
                        <th>Creation Date</th>
                        <th>Deadline</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php 
                          $res = $emp->Get_All_Task_1();
                          if($res){
                            while ($row = $res->fetch_assoc()) {
                              $id = $row["dept_id"];
                              $re= $usr->get_dept_by_id($id);
                              if($re)
                                $re = $re->fetch_assoc();
                        ?>
                        <tr>
                          <td><?php echo $row["task_id"]?></td>
                          <td><?php echo $row["title"]?></td>
                          <td><?php echo $row["details"]?></td>
                          <td><?php echo $re["name"]?></td>
                          <td>
                            <form method="get">
                            <?php 
                              $n = $usr->get_task_notes($row['task_id']);
                              if($n){
                                $n = $n->fetch_assoc();
                              }
                            ?>
                            <input  type="hidden" name="back" value="<?php echo $row['task_id'];?>">
                            <input required type="text" name="note" value="<?php echo $n['notes'];?>">
                              <button class="btn btn-primary" name="pre">Previous</button>
                            </form>
                          </td>
                          <td><?php echo $row["date_created"];?></td>
                          <td><?php echo $row["deadline"];?></td>
                          <td>
                            <?php if(Session::get('dept_id') == $row["dept_id"]){ ?>
                              <a class="btn btn-primary" href="?two=<?php echo $row['task_id'];?>">Preparing for submition</a>
                             <?php } if(Session::get('dept_id') != $row["dept_id"]){ ?>
                                    <p class="btn btn-primary">Submition</p>
                              <?php }?>
                          </td>
                        </tr>
                        <?php }}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }else if(Session::get('User_id') !='' && Session::get('type') ==2){?>
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
                        <th>ID</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Department</th>
                        <th>Notes</th>>
                        <th>Creation Date</th>
                        <th>Deadline</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php 
                          $res = $emp->Get_All_Task_by_dept_1(Session::get('dept_id'));
                          if($res){
                            while ($row = $res->fetch_assoc()) {
                              $id = $row["dept_id"];
                              $re= $usr->get_dept_by_id($id);
                              if($re)
                                $re= $re->fetch_assoc();

                        ?>
                        <tr>
                          <td><?php echo $row["task_id"];?></td>
                          <td><?php echo $row["title"];?></td>
                          <td><?php echo $row["details"];?></td>
                          <td><?php echo $re["name"];?></td>
                          <td>
                            <form method="get">
                            <?php 
                              $n = $usr->get_task_notes($row['task_id']);
                              if($n){
                                $n = $n->fetch_assoc();
                              }
                            ?>
                            <input  type="hidden" name="back" value="<?php echo $row['task_id'];?>">
                            <input required type="text" name="note" value="<?php echo $n['notes'];?>">
                              <button class="btn btn-primary" name="pre">Previous</button>
                            </form>
                          </td>
                          <td><?php echo $row["date_created"];?></td>
                          <td><?php echo $row["deadline"];?></td>
                          <td>
                            <?php if($row["status"] ==0){?>
                              <a class="btn btn-info" href="?one=<?php echo $row['task_id'];?>">Waiting</a>
                              <?php }else if($row["status"] ==1){?>
                                <a class="btn btn-primary" href="?two=<?php echo $row['task_id'];?>">Preparing for submition</a>
                              <?php }else if($row["status"] ==2){?>
                                <a class="btn btn-warning" href="?three=<?php echo $row['task_id'];?>">In Review</a>
                              <?php }else if($row["status"] ==3){?>
                                <a class="btn btn-success" href="#">Done</a>
                            <?php }?>
                          </td>
                        </tr>
                        <?php }}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }?>
        
        </div>
      </div>
<?php include "inc/footer.php";?>
<script type="text/javascript">
$(document).ready(function(){
  $("#tickethide").hide();
  $("#hide_ticket").hide();
  $("#hide_ticket").click(function(){
    $("#hide_ticket").hide();
    $("#tickethide").hide();
    $("#show_ticket").show();
  });
  $("#show_ticket").click(function(){
      $("#tickethide").show();
      $("#hide_ticket").show();
      $("#show_ticket").hide();
  });
});
</script>