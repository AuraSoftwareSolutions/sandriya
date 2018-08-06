<?php
require("../php/checkAuth.php");
require_once("../header2.php");
require_once("../connection.php");

?>


<div class="container-fluid">
    <div class="row-fluid">
        <div class="span6">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left"><i class='icon-user icon-black'></i> Add JeepSafari</div>
                    <div class="pull-right"><span class="badge badge-info" id="amountOfUsers"></span>
                    </div>
                </div>
                <div class="block-content collapse in">
                <form  method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="text">Jeep Name:</label>
                        <input type="text" class="form-control" id="pkg_name" name="pkg_name">
                    </div>
                    <div class="form-group">
                        <label for="file">Image:</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                    <div class="form-group">
                          <label for="desc">Description:</label>
                          <textarea rows="7" cols="7" class="form-control" id="desc" name="desc" placeholder="Write Description..."></textarea>

                     </div>
                    <button type="submit" id="submit" name="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    
        <div class="row-fluid">
            <div>
                <h4 style="text-align:center;">All JeepSafari</h4>
                <table class="table" style="width:50%">
                    <thead>
                         <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Manage</th>
                    </tr>
                    </thead>
                    <tbody>

                    
                <?php 
                        $sql="Select * from jeepsafari";
                         $result = mysqli_query($con, $sql);
                         if (mysqli_num_rows($result)==0) {
                             echo "Not Found";
                             
                            
                          } else {
                             while($row = mysqli_fetch_assoc($result)) {
                                 ?>
                                   <tr>
                                       <td><?php echo $row['name']; ?></td>
                                       <td><?php echo $row['description']; ?></td>
                                       <td><img style="width:100px;height:50px;" src="../../<?php echo $row["image"]; ?>"></td>
                                       <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a></td>
                                       <td><button id="delete" onclick="deleteRecord(<?php echo $row['id'] ;  ?>);"  class="btn btn-danger btn-sm">Delete</button></td>
                                   </tr>
                                 <?php
                               }
                          }
                          mysqli_close($con);
        

                ?>
</tbody>
                </table>


            </div>
        </div>

    <script>

$(document).ready(function(){
 
 $("#submit").click(function(e){
    e.preventDefault();
    var fd = new FormData();
    var files = $('#img')[0].files[0];
    fd.append('files',files);

    fd.append('name', $('#pkg_name').val());
    fd.append('desc',$('#desc').val());
    fd.append('insert', 1);

    $.ajax({
      url : 'manage.php',
      type : 'POST',
      data : fd,
      cache: false,
      contentType: false,
      processData: false,  
      dataType : 'json',
      success:function(data){
        console.log(data);
        alert(data.status_message);
        window.location.href= "addjeep.php";
      },
      error : function(err){
        console.log(err);
        if(err.responseText == "no"){
          alert('Please Select the File');
        }
      }


    });
  })
});
function deleteRecord(id){
    var confirmation = confirm("Are you sure you want to remove the jeepsafari?");

    if (confirmation) {
       var fd = new FormData();
                fd.append('id1',id);
                fd.append("del",1);

                $.ajax({
                url : 'manage.php',
                type : 'POST',
                processData: false,
                contentType: false,
                data : fd,
                cache: false,
                success:function(data){
                    console.log(data);
                    alert('Delete Successfully');
                    window.location.href= "addjeep.php";
                },
                error : function(err){
                    console.log(err);
                }


                });
    }
           
  }
</script>
</div>
<?php

