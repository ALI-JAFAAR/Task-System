<?php include "inc/head.php";?>
<link rel="stylesheet" type="text/css" href="css/custume.css">
<?php include "inc/nav.php";?>
<div id="particles-js" style="height: 300px !important;height: 100vh;" class="particles"></div>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid" style="margin-top:-110px;">
        
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Emplyees</p>
                  <h3 class="card-title"><?php  $res= $emp->Get_All_Users(); if($res)echo $res->num_rows;?>
                    <!-- <small>GB</small> -->
                  </h3>
                </div>
                <div class="card-footer">
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Task</p>
                  <h3 class="card-title"><?php $res = $emp->Get_All_Task(); if($res) echo $res->num_rows;?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title" style="text-align: center;font-size: 20pt;">Employees</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>Name</th>
                      <th>Email</th>
                    </thead>
                    <tbody>
                      <?php 
                        $res= $emp->Get_All_Users(); 
                        if($res){
                          while ($row = $res->fetch_assoc()) {
                      ?>
                      <tr>
                        <td><?php echo $row["username"];?></td>
                        <td><?php echo $row["email"];?></td>
                      </tr>
                      <?php }}?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-warning">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title" style="text-align: center;font-size: 20pt;">Tasks:</span>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table">
                          <thead>
                              <th>Title</th>
                              <th>Details</th>
                          </thead>
                        <tbody>
                            <tr>
                              <td></td>
                              <td></td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include "inc/footer.php";?>

<script type="text/javascript">
$(document).ready(function(){

    $("#editinfo").hide();
    $("#editcancel").click(function(){
        $("#editinfo").hide();
        $("#editbtn").show();
        $("#viewinfo").show();
    });

    $("#editbtn").click(function(){
        $("#editbtn").hide();
        $("#editinfo").show();
        $("#viewinfo").hide();
    
    });
});
</script>
<script src="js/practicle.js"></script>
<script type="text/javascript">
    particlesJS("particles-js", {
    "particles": {
      "number": {
        "value": 60,
        "density": {
          "enable": true,
          "value_area": 1200
        }
      },
      "color": {
        "value": "#ffffff"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#000000"
        },
        "polygon": {
          "nb_sides": 5
        },
        "image": {
          "src": "img/github.svg",
          "width": 200,
          "height": 200
        }
      },
      "opacity": {
        "value": 0.2,
        "random": true,
        "anim": {
          "enable": false,
          "speed": 1,
          "opacity_min": 0.1,
          "sync": false
        }
      },
      "size": {
        "value": 6,
        "random": true,
        "anim": {
          "enable": false,
          "speed": 40,
          "size_min": 0.1,
          "sync": false
        }
      },
      "line_linked": {
        "enable": true,
        "distance": 350,
        "color": "#ffffff",
        "opacity": 0.4,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 1.5,
        "direction": "none",
        "random": false,
        "straight": false,
        "out_mode": "out",
        "bounce": false,
        "attract": {
          "enable": false,
          "rotateX": 600,
          "rotateY": 1200
        }
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": {
          "enable": true,
          "mode": "grab"
        },
        "onclick": {
          "enable": true,
          "mode": "push"
        },
        "resize": true
      },
      "modes": {
        "grab": {
          "distance": 240,
          "line_linked": {
            "opacity": 1
          }
        },
        "bubble": {
          "distance": 800,
          "size": 80,
          "duration": 2,
          "opacity": 8,
          "speed": 3
        },
        "repulse": {
          "distance": 400,
          "duration": 0.4
        },
        "push": {
          "particles_nb": 4
        },
        "remove": {
          "particles_nb": 2
        }
      }
    },
    "retina_detect": true
  });
</script>