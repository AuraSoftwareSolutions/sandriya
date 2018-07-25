<?php

require("../php/checkAuth.php");
require_once("../header2.php");
require_once("../connection.php");

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id =  mysqli_real_escape_string($con, $_GET["id"]);

    
    $sql="Select * from packages where id='$id'";
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            ?>
             <div class="container-fluid" style="width:60%;float:right;">
             <div class="row-fluid">
                 <div class="span6">
                     <!-- block -->
                     <div class="block">
                         <div class="navbar navbar-inner block-header">
                             <div class="muted pull-left"><i class='icon-user icon-black'></i> Update Package</div>
                             <div class="pull-right"><span class="badge badge-info" id="amountOfUsers"></span>
                             </div>
                         </div>
                         <div class="block-content collapse in">
                         <form action="update.php" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                 <label for="text">Package Name:</label>
                                 <input type="text" class="form-control" id="pkg_name" value="<?php echo $row['name']; ?>" name="pkg_name">
                             </div>
                             <div class="form-group">
                                 <label for="file">Image:</label>
                                 <input type="file" class="form-control" id="img" name="img">
                                 <img src="../../<?php echo $row['image']; ?>" style="width:200px;height:200px;">
                             </div>
                             <div class="form-group">
                                   <label for="desc">Description:</label>
                                   <textarea rows="11"  cols="20" class="form-control" name="desc" placeholder="Write Description..."><?php print $row['description']; ?></textarea>
         
                              </div>
                              <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                             <button type="submit" name="submit" class="btn btn-primary">Update</button>
                             <a href="addpackage.php" class="btn btn-default">Back</a>

                             </form>
                         </div>
                     </div>
                 </div>

            <?php
        }
    }else {
        echo "Not Found";
     }
     mysqli_close($con);
    

}else{
    echo "";
}



?>
