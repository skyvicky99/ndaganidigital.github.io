<?php
include 'includes/session.php';
$a = $_POST['news_title'];
$b = $_POST['news_detail'];
// query
$file_name  = strtolower($_FILES['file']['name']);
$file_ext = substr($file_name, strrpos($file_name, '.'));
$prefix = 'efac_'.md5(time()*rand(1, 9999));
$file_name_new = $prefix.$file_ext;
$path = '../uploads/'.$file_name_new;
$link = $_POST['link'];
    /* check if the file uploaded successfully */
    if(@move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
  //do your write to the database filename and other details   
        $sql = "INSERT INTO news (news_title,news_detail,file,link,date) VALUES (:a,:b,:c,:link,now())";
$q = $conn->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$file_name_new,':link'=>$link));
 if($q){
      echo '<script>alert(" You have succesfully added one image in the slider")</script>';
        }
    }
    header('location:all-news.php');
?>