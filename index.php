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
	        		 <div class="jumbotron">
        			<div class="w3-content w3-section">
	        		<div id="myCarousel" class="carousel slide" data-ride="carousel"> <!--Slider Image Start Here--> 
					    <!-- Indicators -->
					    <ol class="carousel-indicators">
					      	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					      	<li data-target="#myCarousel" data-slide-to="1"></li>
						   	<li data-target="#myCarousel" data-slide-to="2"></li>
					    </ol>
					    <!--Indicators Close Here-->
					    <!-- Wrapper for slides -->
					    <div class="carousel-inner" role="listbox">
					    <?php
							$i=1;
						  	$sql=mysqli_query($con,"select * from slider");
							while($slider=mysqli_fetch_assoc($sql))
							{
								$slider_img=$slider['image'];
								$slider_cap=$slider['caption'];
								$path="image/Slider/$slider_img";	
								if($i==1)
								{	
						?>
						  	<div class="item active">
					        	<img src="<?php echo $path; ?>" alt="Image">
					        	<div class="carousel-caption">
									<h2><?php echo $slider_cap; ?></h2>
								</div>      
					      	</div>
						<?php 
						} 
							else 
							{
						?>	
							<div class="item">
					        	<img src="<?php echo $path; ?>" alt="Image">
					        	<div class="carousel-caption">
					        		<h2><?php echo $slider_cap; ?></h2>
								</div>      
					      	</div>	
							<?php	} ?>
							<?php $i++; } ?>

					    </div>

					    
					    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					      <span class="sr-only">Previous</span>
					    </a>
					    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					      <span class="sr-only">Next</span>
					    </a> 
					    <!-- Left and right controls Close Here -->
					    </div>
					</div>
					</div> <!--Room Info Start Here-->
		            <h2>Clients Available</h2>
		       		<?php
             
                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM category");
                  $stmt->execute();
                  foreach($stmt as $row){
                  	$image = (!empty($row['image'])) ? 'images/'.$row['image'] : 'images/noimage.jpg';
                    echo "
                    	<div class='col-sm-4'>
	       					<div class='box box-solid'>
		       					<div class='box-body prod-body'>
		       						<a href='category.php?category=".$row['cat_slug']."'><img src='".$image."' width='100%' height='230px' class='thumbnail'></a>
		       						<h5><a href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a></h5>
		       					</div>
	       					</div>
	       				</div>
                    ";                  
                  }
                }
                catch(PDOException $e){
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

              ?> 
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