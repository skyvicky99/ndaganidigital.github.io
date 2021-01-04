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
	        		
	        	<section>
		<div class="contact">
			<div class="row">
				<div class="contact-form col-lg-4 col-md-4 col-sm-4">
					<h2>CONTACT FORM</h2>
					<p2>please fill out the form below to contact us</p2>
					<form  method="post" name="sentMessage" id="contactForm" >
							<div class="control-group form-group">
								<label>Full Name:</label>
								<div class="input-group input-group-lg">
                        		<input type="text" class="form-control"aria-describedby="addon"name="name" id="name" required >
							</div>
						</div>	
                    		<div class="control-group form-group">
								<label>Phone Number:</label>
                        		<input type="tel" class="form-control" name="phone" id="phone" required>
                    		</div>
                    		<div class="control-group form-group">
								<label>Email Address:</label>
                        		<input type="email" class="form-control" name="email" id="email" required >
                    		</div>
                    		<div class="control-group form-group">
                        		<label>Message:</label>
                        		<textarea class="form-control" name="message" id="message" required ></textarea>
                    		</div>
                    
                    		<input type="submit" name="sub" value="Send Now" class="btn btn-primary">	
						</form>
							<?php
                            
							if(isset($_POST['sub']))
							{
							$name =$_POST['name'];
							$phone = $_POST['phone'];
							$email = $_POST['email'];
							$message = $_POST['message'];
							$confirm = "Not Read";
							$sql = "INSERT INTO `contact`(`fullname`, `phoneno`, `email`,`cdate`,`message`,`confirm`) VALUES ('$name','$phone','$email',now(),'$message','$confirm')" ;
							if(mysqli_query($con,$sql))
							echo'<script>alert("Message sent successfully")</script>';
					
							}	
							?>
				</div>
				<div class="contact-us col-lg-4 col-md-4 col-sm-4">
					<h2>CONTACT US</h2>
					<p><strong>Address:</strong>P.O.BOX 170-90200<br>CHUKA<br>KENYA</p>
					<p><strong>Email:</strong><a href="www.gmail.com">info@chuka.ac.ke</a></p>
					<p><strong>Phone:</strong>+254-790942014</p>
					<div class="social_icons icons_info">
						<ul class="logo">
                            
						</ul>
					</div>
                        
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.7710331056783!2d37.751083614834116!3d-1.312814836026166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1825bb3cf4b0c723%3A0xc39f8ccea8ffee!2sGuest%20House%20-%20SEKU!5e0!3m2!1sen!2sde!4v1580470610464!5m2!1sen!2sde">
                        </iframe>

				</div>
			</div>
		</div>
		</section>
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