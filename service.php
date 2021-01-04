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
	        		

	        		<?php

				$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
				$cnt=1;
				while ($row=mysqli_fetch_array($ret)) {

				?>
	          <div class="heading-section mb-4 mt-md-5">
	          	<h1 class="big">About</h1>
	          	<span class="subheading"><?php  echo $row['PageTitle'];?></span>
	           
	          </div>
	          <div class="pb-md-5">
							<p><?php  echo $row['PageDescription'];?>.</p>
							
						</div>
						<?php } ?>
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