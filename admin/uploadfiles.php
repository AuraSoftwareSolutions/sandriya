<?php
require("php/checkAuth.php");
require_once("header.php");
?>
<script>
            function previewFile()
            {
                var preview = document.querySelector('#img'); //selects the query named img
                var file    = document.querySelector('input[type=file]').files[0]; //sames as here
                var reader  = new FileReader();
                reader.onloadend = function () 
                {
                    preview.src = reader.result;
                }
                if (file) 
                {
                    reader.readAsDataURL(file); //reads the data as a URL
                } 
                else 
                {
                    preview.src = "";
                }
            }
            previewFile();  //calls the function named previewFile()
        </script>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left"><i class='icon-user icon-black'></i> Drag and drop files</div>
                    </div>
                    <div class="block-content collapse in">
                        <form action="php/uploadFilesDropZone.php" class="dropzone"></form>
                    </div>
                </div>
             
                <!-- /block -->
            </div>
        </div>
    </div>


<form action="" method="post" enctype="multipart/form-data">
<div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left"><i class='icon-user icon-black'></i> Drag and drop files</div>
                    </div>
                    <div class="block-content collapse in" >
                      <div style="padding-left: 20px; float:left">  <input type="text" name="Place" placeholder="Place"><br>

                        <input type="text" name="Description" placeholder="Description"><br>
                        <select id="nationality" name="Dist" class="form-control">
                                <option value="Kochi">Kochi</option>
                                <option value="Malapppuram">Malapppuram</option>
                                <option value="Vayanad">Vayanad</option>
                                <option value="palakkad">palakkad</option>
                                <option value="kozhikkode">kozhikkode</option>
                                <option value="trishur">trishur</option>
                            </select><br>
                             <select id="cat1" name="Category1" class="form-control">
                                <option value="Adventures">Adventures</option>
                                <option value="Jeepsafari">Jeepsafari</option>
                            </select><br>
                              <select id="cat2" name="Category2" class="form-control">
                                <option value="WildLife">Wild Life</option>
                                <option value="Nature">Nature</option>
                                <option value="Beach">Beach</option>
                                <option value="Trekking">Trekking</option>
                                <option value="Boating">Boating</option>
                                <option value="History">History</option>
                                <option value="Culture">Culture</option>
                                <option value="Ayurveda">Ayurveda</option>
                            </select>





                    </div>
                    <input type="file" name="image1" onchange="previewFile()" class="block-content collapse in dropzone navbar navbar-inner block-header">
                    <input type="file" name="image2" class="block-content collapse in dropzone navbar navbar-inner block-header">
                    <input type="file" name="image3" class="block-content collapse in dropzone navbar navbar-inner block-header">






                    </div>
                    <input type="submit" value="submit" name="insert">
                </div>
<?php

include 'connection.php';

if(isset($_POST['insert']))
{
    $place=$_POST['Place'];
    $desc=$_POST['Description'];
    $dt=$_POST['Dist'];
    $cat1=$_POST['Category1'];
    $cat2=$_POST['Category2'];
    $f=$_FILES['image1']['name'];
    $s=$_FILES['image2']['name'];
    $t=$_FILES['image3']['name'];
    
  
    move_uploaded_file($_FILES['image1']['tmp_name'],'img/'.$f);
      move_uploaded_file($_FILES['image2']['tmp_name'],'img/'.$s);
        move_uploaded_file($_FILES['image3']['tmp_name'],'img/'.$t);
    mysqli_query($con,"insert into place(place,description,district,category1,category2,image1,image2,image3)values('$place','$desc','$dt','$cat1','$cat2','$f','$s','$t')");

}



?>


<img id="img"  src="" height="200px" width="302px" height="300px"> 


    <input type="file" name="" class="block-content collapse in dropzone navbar navbar-inner block-header">

<?php
include("footer.php");
?>