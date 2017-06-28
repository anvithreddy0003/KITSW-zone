<?php
include('../../session.php');
include('../../config.php');


	
	if(isset($_POST['ids']))
	{
		$all = implode(",",$_POST["ids"]);
		echo $all;
		$sql = "DELETE FROM mail WHERE receiver='$user' AND id='$all[0]'";
		if (mysqli_query($db,$sql)) 
		{
			echo "del success";
		} else 
		{
			echo "error";
		}
	} else 
	{
$all = implode(",",$_POST['ids']);		
echo $all;		echo "select one";
	}
	

?>