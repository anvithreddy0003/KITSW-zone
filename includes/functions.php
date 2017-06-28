<?php
function login($myusername, $mypassword)
{
	include("includes/config.php");
if ($myusername=='' || $mypassword=='')
		{
			echo '<script language="javascript">';
			echo 'alert("Please enter valid username or password")';
			echo '</script>';
		}
		else
		{
      
			$sql = "SELECT password FROM login WHERE username = '$myusername'";
			$result = mysqli_query($db,$sql);
			$result = mysqli_fetch_array($result);
			$password = $result[0];
			$role = $result[1];
			// If result matched $myusername and $mypassword, table row must be 1 row		
			
			$sql = "SELECT role FROM users WHERE uid = '$myusername'";
			$role = mysqli_query($db,$sql);
			$role = mysqli_fetch_array($role);
			$role = $role[0];
			
			if($password == $mypassword)
			{ 	
				if ($role == '1')
				{
					$_SESSION['login_user'] = $myusername;
					header("location: Modules/Dashboard/Student/Student.php");
				}
				else if ($role == '2')
				{
					$_SESSION['login_user'] = $myusername;
					header("location: Modules/Dashboard/Faculty/Faculty.php");
				}
				else if ($role == '3')
				{
					$_SESSION['login_user'] = $myusername;
					header("location: Modules/Dashboard/Admin/Admin.php");
				}
				else if ($role == '')
				{
					echo '<script language="javascript">';
					echo 'alert("Error Code:(001) Please contact administrator")';
					echo '</script>';
				}
			}
			else 
				{
					echo '<script language="javascript">';
					echo 'alert("Username or password wrong")';
					echo '</script>';
				}
		}
	}
	function forum_categories()
	{	
	include("config.php");
		$sql = "select DISTINCT category from forum_q";
		$answer = mysqli_query($db,$sql);
		return $answer;
	}
	function forum_data()
	{
		include("config.php");
		$sql="select * from forum_q";
		$answer = mysqli_query($db,$sql);
		return $answer;
	}
	?>