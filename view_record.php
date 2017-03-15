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
                      <a href="index.php">
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
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>View</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="view_record.php">Record</a></li>
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

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <h3><i class="fa fa-angle-right"></i> View All Records</h3>
              <br>
              <div class="row">
                <div class="col-md-16">
                  <div class="content-panel">
                    <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Roll No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>E-Mail</th>
                        <th>Gender</th>
                        <th>Branch</th>
                        <th>Semester</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                      $servername = "localhost";
                      $username = "root";
                      $password = "";
                      $dbname = "stud";

                      // Create connection
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      // Check connection
                      if ($conn->connect_error)
                        die("Connection failed: " . $conn->connect_error);
                      $sql = "SELECT roll,f_name,l_name,phone,email,gender,branch,sem FROM student";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["roll"]."</td>";
                        echo "<td>".$row["f_name"]."</td>";
                        echo "<td>".$row["l_name"]."</td>";
                        echo "<td>".$row["phone"]."</td>";
                        echo "<td>".$row["email"]."</td>";
                        echo "<td>".$row["gender"]."</td>";
                        echo "<td>".$row["branch"]."</td>";
                        echo "<td>".$row["sem"]."</td>";
                        echo "</tr>";
                        }
                      } 
                      else
                        echo "<td>0 results found</td>";
                      $conn->close();
                      ?>
                  

                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              <span style="color:black">Designed by <b>Parth Sharma</b></span>
              <a href="view_record.php#" class="go-top">
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

    <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
