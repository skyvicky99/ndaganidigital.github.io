 
<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$cat_slug = slugify($name);
		$filename = $_FILES['image']['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM category WHERE cat_slug=:cat_slug");
		$stmt->execute(['cat_slug'=>$cat_slug]);
		$row = $stmt->fetch();
 
		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Category already exist';
		}
		else{
			if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = $cat_slug.'.'.$ext;
				move_uploaded_file($_FILES['image']['tmp_name'], '../images/'.$new_filename);	
			}
			else{
				$new_filename = '';
			}
			try{
				$stmt = $conn->prepare("INSERT INTO category (name,cat_slug,image) VALUES (:name,:cat_slug,:image)");
				$stmt->execute(['name'=>$name,'cat_slug'=>$cat_slug,'image'=>$new_filename]);
				$_SESSION['success'] = 'Category added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up category form first';
	}

	header('location: category.php');

?>