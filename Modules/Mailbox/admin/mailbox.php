<?php
include('../../session.php');
include('../../config.php');

if(isset($_POST['delete'])) 
{ 
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$id=$_POST['delete'];
		$db=mysqli_connect("localhost","root","","urmail");
		$sql = "DELETE FROM `received` WHERE id = '$id'";
		if ($db->query($sql) === TRUE) 
		{
			echo "success";
		}
		else 
		{
			echo "Booking cannot be processed Now";
		}
	}
}									 
if(isset($_POST['reply'])) 
{ 
	$item=$_POST['reply'];
	header("location: reply.php?id=$item");
}									
if(isset($_POST['archive'])) 
{ 
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$id=$_POST['archive'];
		$db=mysqli_connect("localhost","root","","urmail");
		$sql = "INSERT INTO archive SELECT * FROM received WHERE id = '$id'";
		if ($db->query($sql) === TRUE) 
		{
			echo "success";
		}
		else 
		{
			echo "Booking cannot be processed Now";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UR M@IL | Mailbox</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="../../plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="../../plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>@</b>UR</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>UR</b>M@IL</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['login_user']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['login_user']; ?>
                  
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['login_user']; ?></p>
        </div>
      </div>
      
      <ul class="sidebar-menu">
        <br>
		<br>
		<br>
        <li class="treeview">
          <a href="admin.php">
            <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
          </a>
        </li>
		<li>
          <a href="profile.php">
            <i class="fa fa-th"></i> <span>MY PROFILE</span>
          </a>
        </li>
        <li class="treeview">
          <a href="compose.php">
            <i class="fa fa-files-o"></i>
            <span>COMPOSE</span>
          </a>
        </li>
        <li>
          <a href="mailbox.php">
            <i class="fa fa-th"></i> <span>MAILBOX</span>
          </a>
        </li>
        <li class="treeview">
          <a href="users.php">
            <i class="fa fa-pie-chart"></i>
            <span>USERS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
            <li><a href="view-user.php"><i class="fa fa-circle-o"></i> View User</a></li>
            <li><a href="edit-user.php"><i class="fa fa-circle-o"></i> Edit User</a></li>
            <li><a href="delete-user.php"><i class="fa fa-circle-o"></i> Delete User</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="change-pw.php">
            <i class="fa fa-edit"></i> <span>CHANGE PASSWORD</span>
          </a>
        </li>
        <li class="treeview">
          <a href="../logout.php">
            <i class="fa fa-edit"></i> <span>LOGOUT</span>
          </a>
        </li>
        
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mailbox
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mailbox</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="compose.php" class="btn btn-primary btn-block margin-bottom">Compose</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="mailbox.php"><i class="fa fa-inbox"></i> Inbox</a></li>
                <li><a href="sent.php"><i class="fa fa-envelope-o"></i> Sent</a></li>
				<li><a href="archive.php"><i class="fa fa-star-o text-yellow"></i> Archived</a></li>
                <li><a href="drafts.php"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                <li><a href="trash.php"><i class="fa fa-trash-o"></i> Trash </a>
                </li>
                <li><a href="outbox.php"><i class="fa fa-filter"></i>Outbox</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid">
            
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

           
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
						<div>
							<?php
								
								$user = $_SESSION['login_user'];
								$sql = "SELECT * FROM received where receiver='$user'";									
								$result = $db->query($sql);
								if ($result->num_rows > 0)
								{
									// output data of each row
									while($row = $result->fetch_assoc()) 
									{		
										echo '<table>';
										echo '<tr>';
										echo "<form action='' method='post'>";
										echo "<button type='submit' name='delete' value=".$row['id']."><i class='fa fa-trash'></i></button>";
										echo "<button type='submit' name='reply' value=".$row['id']."><i class='fa fa-reply'></i></button>";
										echo "<button type='submit' name='archive' value=".$row['id']."><i class='fa fa-star text-yellow'></i></button>";
										echo '<a href="view.php?id='.$row['id'].'"><b class="mailbox-name"> '. $row["sender"].  '</a></b>';
										echo '<i class="mailbox-subject"> ' . $row["subject"] . '</i>';
										echo '<i class="mailbox-date"> '. $row["date"]. '</form>';
										echo '</tr>';
										echo '</table>';
									}
									
								}
							?>
															
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2016 @ <b>ITTOP solutions</b>.</strong> All rights reserved.
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>