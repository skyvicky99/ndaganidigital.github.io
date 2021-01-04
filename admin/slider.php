<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<script>
	function delSlider(id)
	{
		if(confirm("You want to delete this Slider ?"))
		{
		window.location.href='delete_slider.php?id='+id;	
		}
	}
</script>
<h3 class="blank1" >Slider</h3>
<table class="table table-bordered table-striped table-hover">
	<tr>
	<td colspan="5"><a href="add_slider.php" class="btn btn-primary">Add New</a></td>
	</tr>
	<tr style="height:40">
		<th>Sr No</th>
		<th>Image</th>
		<th>Caption</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>
<?php 
$i=1;
$sql=mysqli_query($con,"select * from slider");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['id'];	
$img=$res['image'];
$path="../image/Slider/$img";
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><img src="<?php echo $path;?>" width="50" height="50"/></td>
		<td><?php echo $res['caption']; ?></td>
		<td><a href="update_slider.php?option=&id=<?php echo $id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
		<td><a href="#" onclick="delSlider('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove" style='color:red'></span></a></td>
	</tr>	
<?php 	
}
?>	
	
</table>
</div>
<?php include 'includes/footer.php'; ?>
</div>
</body>