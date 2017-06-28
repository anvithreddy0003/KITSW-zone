<?php
include("../../../includes/session.php");
include("../../../includes/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <script>
function showUser(str) {
    if (str == "") {
        document.getElementById("forum_data").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("forum_data").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getdata.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {
		$('#keyword').on('input', function() {
			var searchKeyword = $(this).val();
			if (searchKeyword.length >= 3) {
				$.post('livesearch.php', { keywords: searchKeyword }, function(data) {
					$('tr#content').empty()
					$.each(data, function() {
						$('tr#content').append('<tr><td><a href="example.php?id=' + this.id + '">' + this.id + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td><td><a href="example.php?id=' + this.id + '">'+ this.question + '</a></td></tr>');
					});
				}, "json");
			}
		});
	});
	</script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<!-- header file start -->
	<?php include("../../../includes/header.php"); ?>
	<!-- header file end -->
	
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['login_user']; ?></p>
        </div>
      </div>
      
      <!-- sidebar menu start -->
      <?php include("../../../includes/smenu.html"); ?>
	  <!-- sidebar menu end -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        FORUM
        <small>HOME</small>
      </h1>
    </section>

    <!-- Main content -->
	#####YOUR CONTENT GOES HERE ##########
	<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Post a Question.
                <small>Get an Answer.</small>
              </h3>
              
            <!-- /.box-header -->
			<form method="post">
				<div class="box-body pad">
					<textarea class="form-control" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
				</div>
				<table>
					<tr>
						
						<td>
							<select class="form-control">
								<option value="0">Category</option>
									<?php 
										$result = forum_categories();
										if ($result->num_rows > 0) 
										{
											while($row = $result->fetch_assoc()) 
											{	
												echo '<option value="'. $row["category"].'">'. $row["category"].'</option>';
											}						
										}
									?>
							
							</select>
						</td>
						<td>
							<div class="form-group">
								<div class="checkbox">
									<label>
									&nbsp;
									<input type="checkbox">
									Stay Anonymous.&nbsp;
									</label>
								</div>
							</div>
						</td>
						
						
						<td> <?php for($i=0;$i<99;$i++) { ?>&nbsp; <?php } ?> </td>
						<td>
							<button type="submit" name="post_question" class="btn btn-block btn-info">Submit</button>
						</td>
					</tr>
				</table>
			</form>
			</div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    
	
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Questions</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
					<form>
					<input type="text" onkeyup="showResult(this.value)" id="keyword" class="form-control pull-right" placeholder="Search for a question">
					
					</form>
					
                </div>
				
				
              </div>
            </div>
			
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" id="forum_data">
              <table class="table table-hover">
                <tr>
					<th>ID</th>
					<th>User</th>
					<th>Date</th>
					<th>
						<form>
						<select name="users" onchange="showUser(this.value)">
							<option value="">Status</option>
							<option value="open">open</option>
							<option value="closed">closed </option>
						</select>
					</th>
					<th>
						
						<select name="users" onchange="showUser(this.value)">
							<option value="">Category</option>
							<?php 
								$result = forum_categories();
								if ($result->num_rows > 0) 
								{
									while($row = $result->fetch_assoc()) 
									{	
										echo '<option value="'. $row["category"].'">'. $row["category"].'</option>';
									}						
								}
							?>
						</select>
						</form>
					</th>
					<th>Question</th>
				</tr>
				<tr id="content"></tr>
				<?php 
					$result = forum_data();
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
							{	
				?>
							<tr>
							<td> <?php echo $row["ID"]; ?> </td>
							<td> <?php echo $row["display_name"]; ?> </td>
							<td> <?php echo $row["qdate"]; ?> </td>
							<td> <label class="label label-warning"><?php echo $row["status"]; ?> </label></td>
							<td> <?php echo $row["category"]; ?> </td>
							<td> <?php echo $row["question"]; ?> </td>
							</tr>
				<?php
						}						
					}
				?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("../../../includes/footer.html"); ?>
  
  
<!-- jQuery 2.2.3 -->
<script src="../../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../../../bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../../../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
</body>
</html>
