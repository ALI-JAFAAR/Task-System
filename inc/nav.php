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
          <li class="nav-item active  ">
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
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigationexample">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigationexample">
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