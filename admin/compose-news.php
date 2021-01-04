<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar.php'; ?>
  	<!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
					<h3 class="blank1">Post News</h3>
					<div class="xs">
						
						<div class="col-md-8 inbox_right">
							<div class="Compose-Message">               
								<div class="panel panel-default">
									<div class="panel-heading">
										Compose News 
									</div>
									
									<div class="panel-body panel-body-com-m">
										
										<form class="com-mail" action="save-news.php" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<label>News Title : </label>
												<input type="text" name="news_title" class="form-control" placeholder="News Title" >
											</div>
											<div class="form-group">
												<label>News Detail : </label>
												<textarea  id="body" name="news_detail" class="form-control"></textarea>
											</div>
											<div class="form-group">
												<label>News link : </label>
												<textarea  id="body" name="link" class="form-control"></textarea>
											</div>
			<div class="form-group">
							<label>Add Photo</label>
							<input type="file" name="file" class="form-control">
				</div>
						
											<hr>
											<input type="submit" value="Submit News">
										</form>
									</div>
								 </div>
							  </div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
		<?php include "includes/footer.php"; ?>
	</div>
	</body>