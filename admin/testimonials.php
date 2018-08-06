<?php
require("php/checkAuth.php");
include 'connection.php';
require_once("./header.php");
// session_start();
?>
<div class="container">
  <h2>Add Testimonials</h2>
  <form action="" enctype="multipart/form-data" method="post">
    <div class="form-group">
      <label for="email">Testimonial Heading</label>
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
      <label for="pwd">Image</label>
      <input type="file" class="form-control" id="pwd" placeholder="" name="file" required="">
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
    $sql1="select * from testimonials";
    $results=mysqli_query($con,$sql1);
    while($rows=mysqli_fetch_array($results))
    {
    ?>
      <tr>
        <td><?php echo $rows['heading']; ?></td>
        <td><?php echo $rows['contents']; ?></td>
        <td><img src="images/<?php echo $rows['image']; ?>" width="100"></td>
        <td><a href="testimonials.php?id=<?php echo $rows['id']; ?>" onclick="return confirm('Are You Sure');">Delete</td>
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
  $sql="delete from testimonials where id='$id'";
  mysql_query($sql);
  $_SESSION['msg']="Testimonial Deleted Successfully";          
  ?>
  <script type="text/javascript">
    window.location="testimonials.php";
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
    $sql="insert into testimonials(heading,contents,image) values('$heading','$contents','$image')";
    mysql_query($sql);
    $_SESSION['msg']="Testimonial Added Successfully";          
    header("location:testimonials.php");
  }
}
?>
<?php
include("footer.php");
?>