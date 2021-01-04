<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar.php'; ?>
  	<!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">

		<?php 
		if(isset($_POST['submit']))
  		{
     		$pagetitle=$_POST['pagetitle'];
			$pagedes=$_POST['pagedes'];
 
    		$query=mysqli_query($con,"update tblpage set PageTitle='$pagetitle',PageDescription='$pagedes' where  PageType='aboutus'");
    		if ($query) {
    			echo '<script>alert("About Us has been updated.")</script>';
  			}
  			else
    		{
      			echo '<script>alert("Something Went Wrong. Please try again")</script>';
    		} 
		}
  		?>
  		<div class="content">
				<div class="forms">
					<h3 class="title1">Update About Us</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Update About Us:</h4>
						</div>
						<div class="form-body">
							<form method="post">
								
  <?php 
								$ret=mysqli_query($con,"select * from  tblpage where PageType='aboutus'");
								$cnt=1;
								while ($row=mysqli_fetch_array($ret)) {
							?>
							<div class="form-group"> 
								<label for="exampleInputEmail1">Page Title</label> 
								<input type="text" class="form-control" name="pagetitle" id="pagetitle" value="<?php  echo $row['PageTitle'];?>" required="true"> 
							</div> 
							<div class="form-group"> 
								<label for="exampleInputPassword1">Page Description</label> 
								<textarea name="pagedes" id="pagedes" rows="5" class="form-control"><?php  echo $row['PageDescription'];?></textarea> 
							</div>
							<?php } ?>
							<button type="submit" name="submit" class="btn btn-primary" class="btn btn-default">Update</button> 
						</form> 
					</div>	
				</div>
			</div>
		</div>
	</div>
		<?php include 'includes/footer.php'; ?>
	</div>
</body>