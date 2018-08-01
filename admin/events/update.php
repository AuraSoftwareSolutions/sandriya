<?php

require("../php/checkAuth.php");
require_once("../header2.php");
require_once("../connection.php");

if(isset($_POST['id'])){

    $id =  mysqli_real_escape_string($con, $_POST["id"]);

    $name=  mysqli_real_escape_string($con, $_POST['pkg_name']);
    $desc=  mysqli_real_escape_string($con, $_POST['desc']);
   

    if(!empty($_FILES['img']['name'])){
       
        $sql = "Select image from packages where id='$id'";
        $qr = mysqli_query($con,$sql);
        if (mysqli_num_rows($qr) > 0) {
            
        $row = mysqli_fetch_assoc($qr);
        $image = $row['image'];
        if($image){
        unlink('../../'.$image); //unlink past image
        }

        $fileinfo=PATHINFO($_FILES["img"]["name"]);    
        $newFilename=str_replace( " ", "-",$fileinfo['filename']) ."_". time() . "." . $fileinfo['extension'];
        move_uploaded_file($_FILES["img"]["tmp_name"],"../../img/Locations/images/" . $newFilename);
        $location="img/Locations/images/" . $newFilename;

      
          
        $sql2 = "UPDATE packages SET name='$name',description='$desc',image='$location' WHERE id=$id";
        
        if (mysqli_query($con, $sql2)) {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Succesfully Updated');
            history.go(-2);
            </script>"); 
        } else {
           echo "Error updating record: " . mysqli_error($con);
        }
        mysqli_close($con);
        }

      
    }else{
        $sql = "Select image from packages where id='$id'";
        $qr = mysqli_query($con,$sql);
        if (mysqli_num_rows($qr) > 0) {
        $row = mysqli_fetch_assoc($qr);
        $image = $row['image'];
        
        $sql = "UPDATE packages SET name='$name',description='$desc',image='$image' WHERE id='$id'";
        
        if (mysqli_query($con, $sql)) {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Succesfully Updated');
            history.go(-2);
            </script>"); 
        } else {
           echo "Error updating record: " . mysqli_error($con);
        }
        mysqli_close($con);

    }
    }
    

}





?>