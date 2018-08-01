<?php
require("../php/checkAuth.php");
include_once("../connection.php");


if(isset($_POST['insert'])){
    insertPackages();
}

if(isset($_POST['update'])){
    updatePackages();
}

if(isset($_POST['del'])){
    $id = $_POST['id1'];
    deleteRecords($id);
}



function insertPackages(){   
        global $con;
    
        $name1=$_POST["name"];
        $description=$_POST["desc"];
        
        if (empty($_FILES)) {
            echo "no";
            exit();
        }
        /* file upload check validation*/

        $uploadedFiles = array();
        $extension = array("jpeg","jpg","png","gif","JPG","GIF","PNG");
        $bytes = 1024;
        $KB = 1024;
        $totalBytes = $bytes * $KB;
        $UploadFolder = "../../img/Locations/images/";
        $errors = array();
            
        $counter = 0;
        $total = $_FILES['files']['name'];
            
        $temp = $_FILES["files"]["tmp_name"];
        $name_1 = $_FILES["files"]["name"];
        $fileinfo=PATHINFO($_FILES["files"]["name"]);    

        $name=str_replace( " ", "-",$name_1) ."_". time() . "." . $fileinfo['extension'];
        $location="img/Locations/images/" . $name;      
        
    
            $counter++;
            $UploadOk = true;
    
            
           /* file size check 10 mb max */
            if ($_FILES["files"]["size"] > $totalBytes) {
                $UploadOk = false;
                array_push($errors, $name . " file size is larger than the 1 MB.");
            }
    
            $ext = pathinfo($name, PATHINFO_EXTENSION);
     
            
            /* file extention check*/
            if (in_array($ext, $extension) == false) {
                $UploadOk = false;
                array_push($errors, $name . " is invalid file type.");
            }
    
            /* file check exist already or not */

            if (file_exists($UploadFolder . "/" . $name) == true) {
                $UploadOk = false;
                array_push($errors, $name . " file is already exist.");
            }
    
            if ($UploadOk == true) {
                move_uploaded_file($temp, $UploadFolder . "/" .$name);
                array_push($uploadedFiles, $name);
            }

        /* if file is choosen insert the record */

        
        if ($name){

            /* Insert the record  */
            $query="INSERT INTO packages (name,description,image) Values(?,?,?)";
            $stmt = $con->prepare($query);
            $stmt->bind_param('sss',$name1,$description,$location);
            
            /* If inserted return the response in json */

            if($stmt->execute())
            {
                $response=array(
                'status' => 1,
                'status_message' =>'Data Added Successfully.'
                );
            }
            else
            {
                $response=array(
                'status' => 0,
                'status_message' =>'Data Addition Failed.'
                );
            }
            echo  json_encode($response);
      

        }
}

function updatePackages(){
    global $con;
    
        $name1=$_POST["name"];
        $description=$_POST["desc"];
        $id = $_POST['id'];
     
        /* file upload check validation*/
        $uploadedFiles = array();
        $extension = array("jpeg","jpg","png","gif","JPG","GIF","PNG");
        $bytes = 1024;
        $KB = 1024;
        $totalBytes = $bytes * $KB;

        $UploadFolder = "../../img/Locations/images/";
        
        $errors = array();
        $uploadedFiles[0] = '';
        if(!isset($_FILES['files'])){
            $query = "Select * from packages where id = '$id'";
            $rs = mysqli_query($con,$query);
            $row = mysqli_fetch_assoc($rs);
            $pro_images = $row['image'];
            $uploadedFiles[0] = $pro_images;
            $query="Update packages set name=?,description=?,image=? where id=?";
            $stmt = $con->prepare($query);
            
           /* Bind the data in query  */
            $stmt->bind_param('sssi',$name1,$description,$uploadedFiles[0],$id);
            
            
           /* if data is updated return json response at end*/
            if($stmt->execute())
            {
                $response=array(
                'status' => 1,
                'status_message' =>'Data Updated Successfully.'
                );
            }
            else
            {
                $response=array(
                'status' => 0,
                'status_message' =>'Data Updated Failed.'
                );
            }
            echo  json_encode($response);
        }else{
            
        $name_1 = $_FILES["files"]["name"];
        $fileinfo=PATHINFO($_FILES["files"]["name"]);    

        $name=str_replace( " ", "-",$name_1) ."_". time() . "." . $fileinfo['extension'];
        $location="img/Locations/images/" . $name;      
        
        $total = $_FILES['files']['name'];


        $temp = $_FILES["files"]["tmp_name"];
        $name1 = $_FILES["files"]["name"];
        $fileinfo=PATHINFO($_FILES["files"]["name"]);    

        $name=str_replace( " ", "-",$name1) ."_". time() . "." . $fileinfo['extension'];
        $location="img/Locations/images/" . $name;      
                
        $UploadOk = true;

        /* file size check 10 mb max */

        if ($_FILES["files"]["size"] > $totalBytes) {
            $UploadOk = false;
            array_push($errors, $name . " file size is larger than the 1 MB.");
        }

        $ext = pathinfo($name, PATHINFO_EXTENSION);
 
        /* file extention check */

        if (in_array($ext, $extension) == false) {
            $UploadOk = false;
            array_push($errors, $name . " is invalid file type.");
        }

        /* file check exist already or not */

        if (file_exists($UploadFolder . "/" . $name) == true) {
            $UploadOk = false;
            array_push($errors, $name . " file is already exist.");
        }

        if ($UploadOk == true) {
            move_uploaded_file($temp, $UploadFolder . "/" .$name);
            array_push($uploadedFiles, $name);
        }
    
    
    /* if file is choosen check */
    if (!empty($name)) {
            
        
           /* Select data from table base on id match */
            $query = "Select * from packages where id = '$id'";
            $rs = mysqli_query($con,$query);
            $row = mysqli_fetch_assoc($rs);
            $pro_images = $row['image'];
            
           /* delete the image in images folder and update with new one */
            unlink('../../'.$pro_images);
    
            if (count($errors) > 0) {
                echo "<b>Errors:</b>";
                echo "<br/><ul>";
                foreach ($errors as $error) {
                    echo "<li>" . $error . "</li>";
                }
                echo "</ul><br/>";
            }
        
       /* Update the record in the table packages base on id match */
        $query="Update packages set name=?,description=?,image=? where id=?";
        $stmt = $con->prepare($query);
        
       /* Bind the data in query  */
        $stmt->bind_param('sssi',$name1,$description,$location,$id);
        
        
       /* if data is updated return json response at end*/
        if($stmt->execute())
        {
            $response=array(
            'status' => 1,
            'status_message' =>'Data Updated Successfully.'
            );
        }
        else
        {
            $response=array(
            'status' => 0,
            'status_message' =>'Data Updated Failed.'
            );
        }
       echo  json_encode($response);
     
    }
        }

}
function deleteRecords($id){
    global $con;

    /* Get id from url and delete record base on that */
	$query =  "DELETE FROM packages WHERE id=$id";
	if(mysqli_query($con, $query))
    {
    $response=array(
    'status' => 1,
    'status_message' =>'Data Deleted Successfully.'
    );
    }
    else
    {
    $response=array(
    'status' => 0,
    'status_message' =>'Data Deletion Failed.'
    );
    }

    
    /* return json response if deleted */
   echo  json_encode($response);
}
