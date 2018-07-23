<?php
require("../php/checkAuth.php");
require_once("../header2.php");
require_once("../connection.php");

?>

<?php
  if(isset($_POST['submit'])){
    $name=  mysqli_real_escape_string($con, $_POST['pkg_name']);
    $desc=  mysqli_real_escape_string($con, $_POST['desc']);
    $fileinfo=PATHINFO($_FILES["img"]["name"]);    
    $newFilename=str_replace( " ", "-",$fileinfo['filename']) ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["img"]["tmp_name"],"../../img/Locations/images/" . $newFilename);
	$location="img/Locations/images/" . $newFilename;
    $sql="INSERT INTO packages (name, description, image)
    VALUES ('$name', '$desc', '$location')";
      if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
      }
      $message = "Insert Successfully";
      echo "<script type='text/javascript'>alert('$message');</script>";
      
      mysqli_close($con);
    

  }

?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span6">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left"><i class='icon-user icon-black'></i> Add Package</div>
                    <div class="pull-right"><span class="badge badge-info" id="amountOfUsers"></span>
                    </div>
                </div>
                <div class="block-content collapse in">
                <form action="addpackage.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="text">Package Name:</label>
                        <input type="text" class="form-control" id="pkg_name" name="pkg_name">
                    </div>
                    <div class="form-group">
                        <label for="file">Image:</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                    <div class="form-group">
                          <label for="desc">Description:</label>
                          <textarea rows="7" cols="7" class="form-control" name="desc" placeholder="Write Description..."></textarea>

                     </div>
                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    <div class="row-fluid">
        <div class="span6">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left"><i class='icon-th-large icon-black'></i> Groups</div>
                    <div class="pull-right"><span class="badge badge-info" id="amountOfGroups"></span>
                    </div>
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Group ID</th>
                            <th>Group name</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody id="groupstbody">

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /block -->
            <a href="#" class="btn btn-primary btn-small btn-add-group"><i class='icon-plus icon-white'></i> Add a group</a>
        </div>
        <div class="span6">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left"><i class='icon-warning-sign icon-black'></i> Log</div>
                        <div class="pull-right"><span class="badge badge-info" id="amountOfLogs">0</span>
                    </div>
                </div>
                    <div class="block-content collapse in">
                        <ul class="news-items" id="logItems">

                        </ul>
                    </div>
                </div>
            <a href="php/exportFullLogFile.php" class="btn btn-primary btn-small btn-export-log" download><i class='icon-download icon-white'></i> Export full log</a>
            </div>
            <!-- /block -->
        </div>
    </div>
<?php

