<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Student Record DBMS</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script src="assets/js/chart-master/Chart.js"></script>
    <style>
      .error{
        color : red;
      }
    </style>
  </head>

  <body>

  <section id="container" >

      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo" style="color:"><b><span style="color:#736F6E;">STUDENT RECORD </span><span style="color:black;">DBMS</span></b></a>
            <!--logo end-->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html"><span style="color:black;">LOG OUT</span></a></li>
            	</ul>
            </div>
      </header>
      

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="http://www.dtu.ac.in"><img src="assets/img/dtu_logo.png" class="img-circle" width="120"></a></p>
              	  <h5 class="centered">Del Tech</h5>
              	  	
                  <li class="mt">
                      <a class="active" href="index.php">
                          <i class="fa fa-tasks"></i>
                          <span>New Registrations</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Update</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="update_marks.php">Marks</a></li>
                          <li><a  href="update_personal.php">Personal Details</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>View</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="view_record.php">Record</a></li>
                          <li><a  href="view_marksheet.php">Marksheet</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Delete</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="delete.php">Record</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- validation & sanitizing input -->
      <?php
      $fnameErr = $lnameErr = $phoneErr = $emailErr = $addErr = $genderErr = $branchErr = $semErr = $cErr = "";
      $err = "Not Valid";
      $fname = $lname = $phone = $email = $add = $gender = $branch = $sem = $c1 = $c2 = $c3 = "";
      $check = true;
      $result = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fname"])){
          $fnameErr = $err;
          $check = false;
        }
        else {
          $fname = test_input($_POST["fname"]);
          if (!preg_match("/^[a-zA-Z ]*$/",$fname)){
            $fnameErr = $err;
            $check = false;
          }
        }

        if (empty($_POST["lname"])){
          $lnameErr = $err;
          $check = false;
        }
        else {
          $lname = test_input($_POST["lname"]);
          if (!preg_match("/^[a-zA-Z ]*$/",$lname)){
            $lnameErr = $err;
            $check = false;
          }
        }

        if (empty($_POST["phone"])){
          $phoneErr = $err;
          $check = false;
        }
        else {
          $phone = test_input($_POST["phone"]);
          if (!preg_match("/^[0-9]*$/",$phone)){
            $phoneErr = $err;
            $check = false;
          }
        }
   
        $email = test_input($_POST["email"]);
        if ($email!=""&&!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = $err;
          $check = false;
        }

        $add = test_input($_POST["add"]);
   
        if (empty($_POST["gender"])) {
          $genderErr = $err;
          $check = false;
        }
        else $gender = test_input($_POST["gender"]);

        if (empty($_POST["branch"])) {
          $branchErr = $err;
          $check = false;
        }
        else $branch = test_input($_POST["branch"]);

        if (empty($_POST["sem"])) {
          $semErr = $err;
          $check = false;
        }
        else $sem = test_input($_POST["sem"]);

        if (empty($_POST["c1"])) {
          $cErr = $err;
          $check = false;
        }
        else $c1 = test_input($_POST["c1"]);

        if (empty($_POST["c2"])) {
          $cErr = $err;
          $check = false;
        }
        else $c2 = test_input($_POST["c2"]);

        if (empty($_POST["c3"])) {
          $cErr = $err;
          $check = false;
        }
        else $c3 = test_input($_POST["c3"]);

        if($check){
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "stud";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error)
            die("<br>Connection failed: " . $conn->connect_error ."br>");
          $sql = "INSERT INTO student (f_name,l_name,phone,email,addr,gender,branch,sem,course1,course2,course3) VALUES ('".$fname."','".$lname."','".$phone."','".$email."','".$add."','".$gender."','".$branch."','".$sem."','".$c1."','".$c2."','".$c3."')";
          if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            $result =  "<br>New record created successfully. Roll No. assigned is " . $last_id ."<br>";
            $fname = $lname = $phone = $email = $add = $gender = $branch = $sem = $c1 = $c2 = $c3 = "";
          } 
          else $result = "<br>Error: " . $sql . "<br>" . $conn->error ."<br>";
          $conn->close();
        }
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      ?>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <h3><i class="fa fa-angle-right"></i> Student Registration Form</h3>
              <br>
              <span style="color:blue;"><?php echo $result; ?></span><br>
              <span class="error">* required fields</span>
              <form class="form-horizontal style-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Personal Details</h4>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">First Name</label>
                    <div class="col-sm-2">
                    <input type="text" name="fname" class="form-control" id="FNAME" value="<?php echo $fname?>">
                    <span class="error">* <?php echo $fnameErr;?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-2">
                    <input type="text" name="lname" class="form-control" id="LNAME" value="<?php echo $lname?>">
                    <span class="error">* <?php echo $lnameErr;?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Phone No.</label>
                    <div class="col-sm-2">
                    <input type="text" name="phone" class="form-control" id="PHONE" value="<?php echo $phone?>">
                    <span class="error">* <?php echo $phoneErr;?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">E-Mail</label>
                    <div class="col-sm-2">
                    <input type="text" name="email" class="form-control" id="EMAIL" value="<?php echo $email?>">
                    <span class="error"><?php echo $emailErr;?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Address</label>
                    <div class="col-sm-4">
                    <input type="text" name="add" class="form-control" id="ADD" value="<?php echo $add?>">
                    <span class="error">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Gender</label>
                    <div class="col-sm-4">
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female" id="GENDER1"> 
                    Female &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male" id="GENDER2"> Male
                    <span class="error">* <?php echo $genderErr;?></span>
                    </div>
                </div>
              </div>
              <br>
              <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Academic Details</h4>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Branch</label>
                    <div class="col-sm-2">
                    <select class="form-control" id="BRANCH" name="branch">
                      <option value=""></option>
                      <option <?php if (isset($branch) && $branch=="COE") echo "selected";?> value="COE" >COE</option>
                      <option <?php if (isset($branch) && $branch=="IT") echo "selected";?> value="IT" >IT</option>
                      <option <?php if (isset($branch) && $branch=="SE") echo "selected";?> value="SE" >SE</option>
                      <option <?php if (isset($branch) && $branch=="MCE") echo "selected";?> value="MCE" >MCE</option>
                  </select>
                  <span class="error">* <?php echo $branchErr;?></span>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Semester</label>
                    <div class="col-sm-2">
                    <select class="form-control" id="SEM" name="sem">
                      <option value=""></option>
                      <option <?php if (isset($sem) && $sem=="1") echo "selected";?> value="1" >1</option>
                      <option <?php if (isset($sem) && $sem=="2") echo "selected";?> value="2" >2</option>
                      <option <?php if (isset($sem) && $sem=="3") echo "selected";?> value="3" >3</option>
                      <option <?php if (isset($sem) && $sem=="4") echo "selected";?> value="4" >4</option>
                      <option <?php if (isset($sem) && $sem=="5") echo "selected";?> value="5" >5</option>
                      <option <?php if (isset($sem) && $sem=="6") echo "selected";?> value="6" >6</option>
                      <option <?php if (isset($sem) && $sem=="7") echo "selected";?> value="7" >7</option>
                      <option <?php if (isset($sem) && $sem=="8") echo "selected";?> value="8" >8</option>
                  </select>
                  <span class="error">* <?php echo $semErr;?></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Courses Name</label>
                    <div class="col-sm-8">
                    C1 : <input type="text" name="c1" id="C1" value="<?php echo $c1?>"> 
                     C2 : <input type="text" name="c2" id="C2" value="<?php echo $c2?>">
                     C3 : <input type="text" name="c3" id="C3" value="<?php echo $c3?>">
                     <span class="error">* <?php echo $cErr;?></span>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-theme">Submit</button>
              </div>
              </form>  


          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              <span style="color:black">Designed by <b>Parth Sharma</b></span>
              <a href="index.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->	
	     <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

  

  </body>
</html>
