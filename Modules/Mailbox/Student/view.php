<?php
include('../../config.php');
include('../../session.php');
$item = $_GET['id'];

$user = $_SESSION['login_user'];
$sql = "SELECT * FROM mail where id='$item'";									
$result = $db->query($sql);
$row = $result->fetch_assoc();
								
if(isset($_POST['reply'])) 
{ 
	header("location: reply.php?id=$item");
}
else if(isset($_POST['forward'])) 
{
	header("location: forward.php?id=$item");
}
else if(isset($_POST['delete'])) 
{
	$date = date('Y-m-d H:i:s');
	$sender=$_SESSION['login_user'];
	$receiver=$_POST['receiver'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	$attachment=$_POST['attachment'];
	 
	$sql="INSERT INTO `received`(`sender`, `receiver`, `date` , `subject`, `message`, `attachment`) 
	VALUES ('$sender','$receiver','$date','$subject','$message','$attachment')";
	   
	if ($db->query($sql) === TRUE) 
	{
		echo '<script language="javascript">';
		echo "alert('Mail sent successfully')";
		echo "</script>";
	}
	else 
	{
		echo '<script language="javascript">';
		echo "alert('Mail not sent')";
		echo "</script>";
	}
}
else if(isset($_POST['print'])) 
{
	$date = date('Y-m-d H:i:s');
	$sender=$_SESSION['login_user'];
	$receiver=$_POST['receiver'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	$attachment=$_POST['attachment'];
	   
	$sql="INSERT INTO `draft`(`sender`, `receiver`, `subject`, `message`, `attachment`) 
	VALUES ('$sender','$receiver','$subject','$message','$attachment')";
	   
	if ($db->query($sql) === TRUE) 
	{
		echo '<script language="javascript">';
		echo "alert('Mail sent successfully')";
		echo "</script>";
	}
	else 
	{
		echo '<script language="javascript">';
		echo "alert('Mail not sent')";
		echo "</script>";
	}
}
else if(isset($_POST['reply'])) 
{
	echo "fuije";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UR M@IL | Read Mail</title>
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
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="user.php">
            <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
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
          <a href="profile.php">
            <i class="fa fa-pie-chart"></i>
            <span>MY PROFILE</span>
          </a>
        </li>
        <li class="treeview">
          <a href="change-pw.php">
            <i class="fa fa-laptop"></i>
            <span>CHANGE PASSWORD</span>
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
        Read Mail
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
          <a href="mailbox.php" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>

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
            
            <div class="box-body no-padding">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Read Mail</h3>

              <div class="box-tools pull-right">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?php echo '<i>';echo $row['subject']; echo '</i>';?></h3>
                <h5>From: <h5><?php echo '<i>'; echo $row['sender']; echo '</i>' ?>
                  <span class="mailbox-read-time pull-right"><?php  echo $row['date']; ?></span></h5>
              </div>
              <!-- /.mailbox-read-info -->
			  <form method="post" action="">
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="submit" name="delete" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body">
                    <i class="fa fa-trash-o"></i></button>
                  <button type="submit" name="reply" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body">
                    <i class="fa fa-reply"></i></button>
                  <button type="forward" name="forward" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body">
                    <i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="submit" name="print" class="btn btn-default btn-sm" data-toggle="tooltip">
                  <i class="fa fa-print"></i></button>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p><?php echo strip_tags($row['message']); ?></p>

                
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="submit" name="reply" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                <button type="submit" name="forward" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
              </div>
              <button type="submit" name="delete" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
              <button type="submit" name="print" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
			  </form>
            </div>
									
            <!-- /.box-footer -->
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
      <b>Version</b> 2.3.12
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
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
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
