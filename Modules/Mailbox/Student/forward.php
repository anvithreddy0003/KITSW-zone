<?php
include('../../config.php');
include('../../session.php');
$item = $_GET['id'];
echo $item;

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

?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UR M@IL | Forward Mail</title>
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
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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
           
            <!-- /.box-header -->
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">View Message</h3>
            </div>
            <!-- /.box-header -->
			
			
			<form method="post" action="">
            <div class="box-body">
				<div class="form-group">
					<input class="form-control" placeholder="To:" name="receiver" value="<?php echo $row['sender']; ?>">
				</div>
				<div class="form-group">
					<input class="form-control" placeholder="Subject:" name="subject">
				</div>
				<div class="form-group">
					<textarea id="compose-textarea" class="form-control" style="height: 300px" name="message">
					</textarea>
				</div>
				<div class="form-group">
					<div class="btn btn-default btn-file">
						<i class="fa fa-paperclip"></i> Attachment
						<input type="file" name="attachment">
					</div>
					<p class="help-block">Max. 32MB</p>
				</div>
            </div>
			
			
            <!-- /.box-body -->
            <div class="box-footer">
				<div class="pull-right">
					<button type="submit" name="draft" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
					<button type="submit" name="send" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
					
              </div>
              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
            </div>
			</form>
			
			<?php
			if(isset($_POST['send'])) 
									{
										$date = date('Y-m-d H:i:s');
	   $sender=$_SESSION['login_user'];
	   $receiver=$_POST['receiver'];
	   $subject=$_POST['subject'];
	   $message=$_POST['message'];
	   $attachment=$_POST['attachment'];
	   
	   $sql="INSERT INTO `mail`(`sender`, `receiver`, `date` , `subject`, `message`, `attachment`) 
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
									else if(isset($_POST['draft'])) 
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
									
									?>
									
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
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>
</body>
</html>
