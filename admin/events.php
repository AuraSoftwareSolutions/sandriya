<?php
require("php/checkAuth.php");
include 'connection.php';
require_once("header2.php");
// session_start();
?>
<div class="container">
  <h2>Add Events</h2>
  <form action="" enctype="multipart/form-data" method="post">
    <div class="form-group">
      <label for="email">Title</label>
      <input type="text" class="form-control" id="email" placeholder="Title" name="heading">
      <?php
      $error=0;
      if(isset($_POST['heading']))
      {
        if($_POST['heading']=="")
        {
          echo "<span class='error'>Field Required</span>";
          $error++;
        }
      }
      ?>
    </div>
    <div class="form-group">
      <label for="pwd">Content</label>
      <textarea class="form-control" name="contents" placeholder="Testimonial Content Here"></textarea>
      <?php
      if(isset($_POST['contents']))
      {
        if($_POST['contents']=="")
        {
          echo "<span class='error'>Field Required</span>";
          $error++;
        }
      }
      ?>
    </div>
    <div class="form-group">
      <label for="pwd">Base Image</label>
      <input type="file" class="form-control" id="pwd" placeholder="" name="file" required="">
    </div>
    <div class="form-group">
      <label for="pwd">Other Image</label>
      <input type="file" class="form-control" id="pwd" placeholder="" name="files[]" required="" multiple="">
    </div>
    <button type="submit" name="ok" class="btn btn-default">Add</button>
  </form>
  <?php
  if(isset($_SESSION['msg']))
  {
    echo "<font color='green'>".$_SESSION['msg']."</font>"; 
    unset ($_SESSION["msg"]);
  }
  ?>
  <table class="table">
    <thead>
      <tr>
        <th>Heading</th>
        <th>Content</th>
        <th>Image</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $sql1="select * from events";
    $results=mysql_query($sql1);
    while($rows=mysql_fetch_array($results))
    {
    ?>
      <tr>
        <td><?php echo $rows['heading']; ?></td>
        <td><?php echo $rows['contents']; ?></td>
        <td><img src="images/<?php echo $rows['image']; ?>" width="100"></td>
        <td><a href="events.php?id=<?php echo $rows['id']; ?>" onclick="return confirm('Are You Sure');">Delete</td>
      </tr>
      <?php
    }
      ?>
    </tbody>
  </table>
</div>
<?php
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $sql="delete from events where id='$id'";
  mysql_query($sql);
  $_SESSION['msg']="Event Deleted Successfully";          
  ?>
  <script type="text/javascript">
    window.location="events.php";
  </script>
  <?php 
}
if(isset($_POST['ok']))
{
  if($error==0)
  {
    $heading=$_POST['heading'];
    $contents=$_POST['contents'];
    $image=$t=time().$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],"images/".$image);
    $sql="insert into events(heading,contents,image) values('$heading','$contents','$image')";
    mysql_query($sql);
    $last_id=mysql_insert_id();
    $total = count($_FILES['files']['name']);
  for( $i=0 ; $i < $total ; $i++ ) {
  $tmpFilePath = $_FILES['files']['tmp_name'][$i];
  if ($tmpFilePath != ""){
    $imagename=time().$_FILES['files']['name'][$i];
    $newFilePath = "images/" . $imagename;
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
      $sql="insert into event_images(event_id,image_name) values('$last_id','$imagename')";
      mysql_query($sql);
    }
    }
    }
    $_SESSION['msg']="Events Added Successfully";          
    header("location:events.php");
  }
}
?>
<?php
include("footer.php");
?>