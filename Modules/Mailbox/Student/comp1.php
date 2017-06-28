<?php
include('../../session.php');
include('../../config.php');

if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      // username and password sent from form 
      
      $sender = htmlspecialchars($_POST['sender']);
      $receiver = htmlspecialchars($_POST['receiver']);
	  $message = htmlspecialchars($_POST['message']);
	  $attachment = htmlspecialchars($_POST['attachment']);
	  
	  function send()
	  {
		  $sql = "INSERT INTO mails (sender, receiver, message,)
	VALUES ('$sender', '$receiver', '$message',)";

		if ($db->query($sql) === TRUE) 
		{
		  echo "<script language='javascript'>";
		  echo "alert('Message sent successfully')";
		  echo "</script>";
		}
	  }
	  
	  function draft()
	  {
		  $sql="INSERT INTO `draft`(`sender`, `receiver`, `date`, `message`, `attachment`) VALUES ('$sender','$receiver','$message','$attachment')";
		  mysqli_query($db,$sql);
		  echo "<script language='javascript'>";
		  echo "alert('Message saved  draft')";
		  echo "</script>";
	  }
   }
?>