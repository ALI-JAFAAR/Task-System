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
          <li class="nav-item ">
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
          <li class="nav-item active">
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
      <div class="content">
        <div class="container-fluid">
                    <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Add Department</h4>
                </div>
                <div class="card-body">
                  <form method="get" >
                      <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <div class="form-group">
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
                      <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">FROM</label>
                            <input name="from" style="background-color: #191e32;" type="date" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">TO</label>
                            <input name="to" style="background-color: #191e32;" type="date" class="form-control">
                          </div>
                        </div>
                      </div>
                      <br>
                      <br>
                      <br>
                      <center>  <button type="submit" class="btn btn-warning" name="search">Save</button></center>
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
                  <h4 class="card-title ">Departments Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          DEPARTMENT NAME
                        </th>
                        <th>
                          Tasks
                        </th>
                        <th>
                          Status
                        </th>
                      </thead>
                      <tbody>
                        <?php 
                            if(isset($_GET["search"])){
                              $res = $emp->report($_GET["dept_id"],$_GET["from"],$_GET["to"]);
                              if($res){

                                while ($row = $res->fetch_assoc()) {
                                  $id = $row["dept_id"];
                                  $re= $usr->get_dept_by_id($id)->fetch_assoc();
                        ?>
                              <tr>
                                <td><?php echo $row['task_id'];?></td>
                                <td><?php echo $re['name'];?></td>
                                <td><?php echo $row['title'];?></td>
                                <td><?php 
                                  if($row['status'] == 3){
                                    echo '<p class="btn btn-success"> Done</p>';
                                  }else{
                                    echo '<p class="btn"> not completed</p>';
                                  }
                                ?></td>
                              </tr>
                            <?php }}}
                          ?>
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