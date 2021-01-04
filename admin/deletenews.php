<?php include 'includes/session.php'; ?>
  		<?php
      if(isset($_GET['id']))
      {
  			$id=$_GET['id'];
        $conn = $pdo->open();
        try{
        	$result = $conn->prepare("DELETE FROM news WHERE id= :post_id");
        	$result->execute([':post_id'=> $id]);

          $_SESSION['success'] = 'News deleted successfully';
        }
        catch(PDOException $e){
          $_SESSION['error'] = $e->getMessage();
        }
      $pdo->close();
      }
    else{
     $_SESSION['error'] = 'Select News to delete first';
    }

     header('location: all-news.php');
     
?>