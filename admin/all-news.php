<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar.php'; ?>
  	<!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
			<h3 class="blank1" >All News</h3>
			<div class="xs tabls">
				<div class="panel-body1">
					<td colspan="5"><a href="compose-news.php" class="btn btn-primary">Add New</a></td>
					<table class="table">
					    <thead>
							<tr>
								<th>#</th>
							  	<th>Title</th>
							  	<th>Details</th>
							  	<th>Date</th>
							  	<th>Action</th>
							</tr>
						</thead>
						<tbody>
        <?php
        
        $sql="SELECT * FROM news ";
        $result = mysqli_query($con, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                	?>
       		<tr>
       		
							  <td><?php echo $row['id']; ?></td>
							  <td><?php echo $row['news_title']; ?></td>
							  <td><?php echo $row['news_detail']; ?></td>
							  <td><?php echo $row['date']; ?></td>
							  <td>
                                <a href="deletenews.php?id=<?=$row['id'] ?>" class="fa fa-eraser btn btn-xs btn-success warning_4 delbtn" >Delete</a>
                               
							  </td>

							</tr>
							 </tbody>
							 <?php } ?>
							 <?php } ?>
							<?php } ?>
						</table>
						</div>
						</div>
					</div>
	<?php include"includes/footer.php"; ?>
</div>	
</body>