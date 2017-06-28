<?php

require '../../config.php';
$mode = $_REQUEST["mode"];
if ( $mode == "delete" ) {
   $cid = intval($_GET['id']);
   
   $sql = "DELETE FROM `mail` WHERE id = :cid";
   try {
     
      $stmt = $db->prepare($sql);
      $stmt->bindValue(":cid", $cid);
        
       $stmt->execute();  
       $res = $stmt->rowCount();
       if ($res > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Contact deleted successfully.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "Failed to delete contact.";
      }
     
   } catch (Exception $ex) {
      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
   }
   
   header("location:index.php?pagenum=".$_GET['pagenum']);
}
?>