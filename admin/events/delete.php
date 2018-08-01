<?php
require("../php/checkAuth.php");
require_once("../header2.php");
require_once("../connection.php");


  if(isset($_GET['id']) && !empty($_GET['id'])){
      

    $id =  mysqli_real_escape_string($con, $_GET["id"]);
    $sql = "Delete from packages where id='$id'";
    if (mysqli_query($con, $sql)) {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Succesfully Deleted');
        history.go(-1);
     </script>");  
        } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
    
    mysqli_close($con);
    
  }else{
      echo "";
  }


?>