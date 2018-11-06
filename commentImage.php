<?php
session_start();
require('database/database.php');

//gets the user session ID
$stmt = $db->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid" => $_SESSION['user_session']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$blogID =  filter_input(INPUT_POST, 'blogID');
 

$imgFile = $_FILES['bimage']['name'];
$tmp_dir = $_FILES['bimage']['tmp_name'];
$imgSize = $_FILES['bimage']['size'];

$upload_dir = 'img/';
$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
$boxerPic = rand(1000,1000000).".".$imgExt;


if(in_array($imgExt, $valid_extensions)){			
// Check file size '5MB'
if($imgSize < 5000000)				{
move_uploaded_file($tmp_dir,$upload_dir.$boxerPic);
}
else{
$error_message = "Sorry, your file is too large.";
}
}
else{
$error_message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
}



if (isset($_POST['btnsave'])) {
        // insert a row
        $comment_id = "comment_id";
        $idFromForm =  filter_input(INPUT_POST, 'blogID');
        $user_id = $_SESSION['user_session'];
        $commentText = filter_input(INPUT_POST, 'commentText');


        // prepare sql and bind parameters
        $stmt = $db->prepare("INSERT INTO tbl_user (comment_id,blogID, user_id,text)
            VALUES (:comment_id,:blogID, :user_id, :text)");
        $stmt->bindParam(':comment_id', $comment_id);
        $stmt->bindParam(':blogID', $blogID);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':text', $commentText);
        $stmt->execute();

        
        
        echo "New records created successfully";
        
    } else {
        $error_message = "error while inserting....";
    }


?>



<button><a href="index.php">Home</a></button>
   <p>BLOG ID </p>
<form method="post">
 
    
    <div class="form-group">
        <textarea class="form-control" rows="3" name="commentText"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="btnsave">Submit</button>
</form>