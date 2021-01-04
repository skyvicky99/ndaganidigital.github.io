<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$slug = slugify($name);
		$filename = $_FILES['image']['name'];

		if(!empty($filename)){
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$new_filename = $row['cat_slug'].'_'.time().'.'.$ext;
			move_uploaded_file($_FILES['image']['tmp_name'], '../images/'.$new_filename);	
		}

		try{
			$stmt = $conn->prepare("UPDATE category SET name=:name, image=:image WHERE id=:id");
			$stmt->execute(['name'=>$name, 'image'=>$new_filename, 'id'=>$id]);
			$_SESSION['success'] = 'Category updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit category form first';
	}

	header('location: category.php');
 
?>