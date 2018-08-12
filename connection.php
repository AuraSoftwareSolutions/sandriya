<?php

//error_reporting(0);
$con=mysqli_connect("localhost","root","","sandriya");
if($con){
    return $con;
}else{
    return json_encode(false);
    
}


//mysql_select_db("sandriya");
//r_reporting();
// if(!$con)
// {
//     echo "not connected";  
// }
//  else
//      {
// mysql_select_db('auction',$con);
     
//  }
 ?>

