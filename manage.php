<?php

require_once("connection.php");

function showEventDataLimit(){
    global $con;
    $sql = 'SELECT * FROM events LIMIT 4';
    $response=array();
    $result=mysqli_query($con, $sql);
    if($result){
    while($row=mysqli_fetch_array($result))
    {
    $response[]=$row;
    }
      return json_encode($response);
   }else{
       
    return  json_encode(null);
   }
}

function showEventAll(){
  global $con;
  $sql = 'SELECT * FROM events';
  $response=array();
  $result=mysqli_query($con, $sql);
  if($result){
  while($row=mysqli_fetch_array($result))
  {
  $response[]=$row;
  }
    return json_encode($response);
 }else{
     
  return  json_encode(null);
 }
}

function showJeepSafariDataLimit(){
    global $con;
    $sql = 'SELECT * FROM jeepsafari LIMIT 4';
    $response=array();
    $result=mysqli_query($con, $sql);
    if($result){
    while($row=mysqli_fetch_array($result))
    {
    $response[]=$row;
    }
      return json_encode($response);
   }else{
       
    return  json_encode(null);
   }
}

function showJeepSafariAll(){
  global $con;
  $sql = 'SELECT * FROM jeepsafari';
  $response=array();
  $result=mysqli_query($con, $sql);
  if($result){
  while($row=mysqli_fetch_array($result))
  {
  $response[]=$row;
  }
    return json_encode($response);
 }else{
     
  return  json_encode(null);
 }
}

function showPackagesDataLimit(){
  global $con;
  $sql = 'SELECT * FROM packages LIMIT 4';
  $response=array();
  $result=mysqli_query($con, $sql);
  if($result){
  while($row=mysqli_fetch_array($result))
  {
  $response[]=$row;
  }
    return json_encode($response);
 }else{
     
  return  json_encode(null);
 }
}

function showPackagesAll(){
  global $con;
  $sql = 'SELECT * FROM packages';
  $response=array();
  $result=mysqli_query($con, $sql);
  if($result){
  while($row=mysqli_fetch_array($result))
  {
  $response[]=$row;
  }
    return json_encode($response);
 }else{
     
  return  json_encode(null);
 }
}




?>