<?php include "inc/head.php";?>
<link rel="stylesheet" type="text/css" href="css/custume.css">

<?php include "inc/nav.php";?>
<?php 
    $employee = $emp->Get_Employee();
    if($employee)
        $userdata = $employee->fetch_assoc();

    if(isset($_POST["admin"])){

        $res = $usr->update_profile($_POST);
    }
    if(isset($_POST["emplo"])){
        $res = $emp->update_profile($_POST);
    }
?>
<div class="container">
<div class="row">
    <div class="col-sm-12">
        <div>
            <div class="content social-timeline">
                <div class="">

                    <div class="row">
                        <div class="col-md-12" >
                            <div id="particles-js" style="height: 300px !important;height: 100vh;" class="particles"></div>
                            <!-- <div class="social-wallpaper">
                                <div class="profile-hvr">
                                    <i class="icofont icofont-ui-edit p-r-10"></i>
                                    <i class="icofont icofont-ui-delete"></i>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-4 col-xs-12">
                            <div class="social-timeline-left">
                                <div class="card">
                                    <div class="social-profile">
                                        <img class="img-fluid width-100" style="width: 100%;height: unset; border-radius: 15%;" src="img/<?php if(Session::get('User_id') != "" && Session::get('type') ==0){ echo '5.png'; 
                                                  }else if($userdata["avatar"] !=''){ 
                                                    echo $userdata["avatar"];
                                                  }else if(Session::get('gender') == 'male'){
                                                    echo 'logo/male.png';
                                                  }else
                                                    echo 'logo/female.png';
                                                  ?>"  alt="">
                                    </div>
                                    <div class="card-block social-follower">
                                        <h4 style="color: white;"><?php echo $userdata["username"]; ?></h4>
                                        <h5 style="color: white;"><?php 
                                            if(Session::get('emp_id') != ""){
                                                if(Session::get('type') ==1){
                                                    echo "Managment";
                                                }else
                                                    echo "Employee";
                                                }else if(Session::get('User_id') != "") 
                                                        echo "Company Manager"; ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8 col-md-8 col-xs-12 ">
                            <div class="card social-tabs">
                                <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist">

                                    <li class="nav-item" style="width: 50%; ">
                                        <a class="nav-link active" style="margin-top: -3.3px;" data-toggle="tab" href="#about" role="tab">User Information</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item" style="width: 50%;">
                                        <a class="nav-link" style="margin-top: -3.3px;" data-toggle="tab" href="#photos" role="tab">Company Employee</a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane active" id="about">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-header-text" style="font-size: 14pt;font-weight: bold;margin-left: -0.2%;">Basic Information</h5>
                                                    <hr style="background-color: white;">
                                                    <button id="editbtn" type="button" class="btn btn-primary waves-effect waves-light f-right">
                                                        <i class="icofont icofont-edit"></i>Edit Info
                                                    </button>
                                                </div>
                                                <?php if(Session::get('User_id') != "" && Session::get('type') ==0){?>
                                                <div class="card-block">
                                                    <div id="viewinfo" class="row">
                                                        <hr>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;">
                                                            Full Name
                                                        </div>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;text-align: center;">
                                                            <?php echo $userdata["username"]; ?>
                                                        </div>
                                                        <hr>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;">
                                                            Company Name
                                                        </div>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;text-align: center;">
                                                            Creative Projects 
                                                        </div>
                                                        <hr>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;">
                                                            Work Type
                                                        </div>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;text-align: center;">
                                                            Software Solution Company
                                                        </div>
                                                        <hr>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;">
                                                            Company Number
                                                        </div>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;text-align: center;">
                                                            0790 000 0000
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    <div id="editinfo" class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <form  enctype="multipart/form-data" method="post">
                                                                <div class="input-group">
                                                                    <div class="col-4" >
                                                                        <label style="color: white !important;font-size: 16pt !important; ">Full name</label>
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <input type="text" name="name" class="form-control"  value="<?php echo $userdata['username'];?>">
                                                                    </div>
                                                                </div>

                                                                <div class="input-group">
                                                                    <div class="col-4" >
                                                                        <label style="color: white !important;font-size: 16pt !important; ">Password</label>
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <input type="text" name="pass" class="form-control" placeholder="Password">
                                                                    </div>
                                                                </div>
                                                                <div class="text-center m-t-20">
                                                                    <button name="admin" class="btn btn-primary waves-effect waves-light m-r-20">Save</button>
                                                                    <button id="editcancel" type="button" class="btn btn-default waves-effect waves-light f-right">
                                                                        <i class="icofont icofont-edit"></i>Cancel
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }else{?>
                                                <div class="card-block">
                                                    <div id="viewinfo" class="row">
                                                        <hr>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;">
                                                            Full Name
                                                        </div>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;text-align: center;">
                                                            <?php echo $userdata["username"]; ?>
                                                        </div>
                                                        <?php
                                                        $dept = $usr->get_dept_by_id($userdata["dept_id"]);
                                                        if($dept)
                                                            $dept = $dept->fetch_assoc();
                                                        ?>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;">
                                                            Department
                                                        </div>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;text-align: center;">
                                                            <?php  echo $dept["name"]; ?>
                                                        </div>
                                                        <hr>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;">
                                                            Email
                                                        </div>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;text-align: center;">
                                                            <?php  echo $userdata["email"]; ?>
                                                        </div>
                                                        <hr>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;">
                                                            Birthday
                                                        </div>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;text-align: center;">
                                                            <?php echo $userdata["birth"] ?>
                                                        </div>
                                                        <hr>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;">
                                                            Position
                                                        </div>
                                                        <div class="col-6" style="color:white !important; font-weight: bold;font-size: 16pt;text-align: center;">
                                                            <?php if(Session::get('type') ==1) echo 'Management'; else echo 'Employee';?>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    <div id="editinfo" class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <form method="post" enctype="multipart/form-data">

                                                                <div class="input-group">
                                                                    <div class="col-4" >
                                                                        <label style="color: white !important;font-size: 16pt !important; ">Full name</label>
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <input type="text" name="name" class="form-control" value="<?php echo $userdata['username']; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="input-group">
                                                                    <div class="col-4" >
                                                                        <label style="color: white !important;font-size: 16pt !important; ">Email</label>
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <input type="text" name="email" class="form-control" value="<?php echo $userdata['email']; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="input-group">
                                                                    <div class="col-4" >
                                                                        <label style="color: white !important;font-size: 16pt !important; ">Password</label>
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <input  type="text" name="pass"  class="form-control" placeholder="Password">
                                                                    </div>
                                                                </div>
                                                                <div class="input-group">
                                                                    <div class="col-4" >
                                                                        <label style="color: white !important;font-size: 16pt !important; ">Date of Birth</label>
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <input type="text" name="birth" class="form-control" value="<?php echo $userdata['birth']; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="input-group">
                                                                    <div class="col-4" >
                                                                        <label style="color: white !important;font-size: 16pt !important; ">Photo</label>
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <input type="file" required name="avatar" class="form-control" >
                                                                    </div>
                                                                </div>

                                                                <div class="text-center m-t-20">
                                                                    <button name="emplo" id="edit-save" class="btn btn-primary waves-effect waves-light m-r-20">Save</button>
                                                                    <button id="editcancel" type="button" class="btn btn-default waves-effect waves-light f-right">
                                                                        <i class="icofont icofont-edit"></i>Cancel
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="photos">
                                    <div class="card">

                                        <div class="card-block">
                                            <div class="demo-gallery">
                                                <ul id="profile-lightgallery" class="row">
                                                    <?php
                                                        $users = $emp->Get_company_employees();
                                                        if($users){
                                                            while ($employee = $users->fetch_assoc()) {
                                                    ?>
                                                    <li class="col-md-4 col-lg-2 col-sm-6 col-xs-12">
                                                        <a href="#" >
                                                            <img  src="img/<?php if($employee['avatar'] ==''){if($employee['gender'] =='male'){echo'logo/male.png';}else{ echo 'logo/female.png';}}else{echo $employee['avatar'];}?>" class="img-fluid" alt="">
                                                        </a>
                                                        <p style="color: white !important;text-align: center !important;"><?php echo $employee["username"]; ?></p><br>
                                                        <p  style="color: white !important;text-align: center !important;"><?php
                                                            if(Session::get('emp_id') != ""){
                                                                if(Session::get('type') ==1){
                                                                    echo "Managment";
                                                                }else
                                                                    echo "Employee";
                                                                }else if(Session::get('emp_id') != "") 
                                                                        echo "Company Manager"; ?></p>
                                                                    </li>
                                                                <?php }}?>
                                                </ul>
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