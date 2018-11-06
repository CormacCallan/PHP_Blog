<?php
session_start();
require('database/database.php');

//gets the user session ID
$stmt = $db->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid" => $_SESSION['user_session']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


 

$comment_id = "comment_id";
$blogID =  filter_input(INPUT_POST, 'blogID');
$user_id = $_SESSION['user_session'];
$commentText = filter_input(INPUT_POST, 'commentText');



if (isset($_POST['btnsave'])) {

        $stmt = $db->prepare("INSERT INTO comments (comment_id,blogID, user_id,text)
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
   <p>BLOG ID </p><?php echo $blogID?>
<form method="post">
 
    
    <div class="form-group">
        <textarea class="form-control" rows="3" name="commentText"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="btnsave">Submit</button>
</form>