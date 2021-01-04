<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>

	        		 <div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">News Update</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- End Nav Backed Header --> 
  <!-- Start Page Header -->
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Latest News</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page Header --> 
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <div class="col-md-9 posts-archive">
		
              <?php
        
        $sql="SELECT * FROM news";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                	?>
            <article class="post">
              <div class="row">
                <div class="col-md-4 col-sm-4"> <a href="http://<?php echo $row['link'];?>"><img src="uploads/<?php echo $row['file'];?>" alt="" class="img-thumbnail img-responsive"></a> </div>
                <div class="col-md-8 col-sm-8">
                  <h3><a href="http://<?php echo $row['link'];?>"><?php echo $row['news_title']; ?></a></h3>
                  <span class="post-meta meta-data"> <span><i class="fa fa-calendar"></i> <?php echo $row['date']; ?></span></span>
                  <?php echo strip_tags(substr($row['news_detail'],0,180)) ;?>...
				  <p><a href="http://<?php echo $row['link'];?>" class="btn btn-primary"><?php echo $row['link']; ?><i class="fa fa-long-arrow-right"></i></a></p>
                </div>
              </div>
            </article>
            <?php } ?>
            <?php } ?> 
            <?php } ?>                                    
            </div>	
			</div>
		</div>
	</div>
</div>


	        		</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>