<?php 

session_start();

include 'database/database.php';


  
$stmt = $db->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);


$blogID = filter_input(INPUT_POST, 'blogID');


$queryPost = "SELECT * FROM blog WHERE blogID =" . $blogID . '';
$statement = $db->prepare($queryPost);
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();
//
//
//$queryComment = "SELECT * FROM comments WHERE blogID =" . $_POST['blogID'] . '';
//$statement1 = $db->prepare($queryComment);
//$statement1->execute();
//$comms = $statement1->fetchAll(PDO::FETCH_ASSOC);
//$statement1->closeCursor();




if (isset($_POST['btnsave'])) {

    // insert a row
    $comment_id = "comment_id";
    $blogID = 1;
    $user_id = $_SESSION['user_session'];
    $commentText = filter_input(INPUT_POST, 'commentText');



    // prepare sql and bind parameters
    $stmt = $db->prepare("INSERT INTO comments (comment_id,blogID, user_id,text)
    VALUES (:comment_id,:blogID, :user_id, :text)");
    $stmt->bindParam(':comment_id', $comment_id);
    $stmt->bindParam(':blogID', $blogID);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':text', $commentText);
    $stmt->execute();

    echo "New records created successfully";
} 
else {
    $error_message = "error while inserting....";
}

?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    
    <?php foreach ($posts as $post) : 
        ?>
    <title><?php echo $post['blogTitle'];?></title>


    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">

  </head>
 <?php include'includes/nav.php'?>
  <body>

   
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"><?php echo $post['blogTitle'];echo $blogID;?>
        <small>by
          <a href="#">Start Bootstrap</a>
        </small>
      </h1>
         <?php endforeach;?><br>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="blogHome.php">Back</a>
        </li>
        
      </ol>
      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="img/<?php echo $post['blogImg'];?>" alt="">

          
          <hr>

          <!-- Date/Time -->
          <p>Posted on January 1, 2017 at 12:00 PM</p>

          <hr>

          <!-- Post Content -->
          <p class="lead"><?php echo$post['blogText'];?></p>

          <p></p>

          <p></p>

          <blockquote class="blockquote">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer class="blockquote-footer">Someone famous in
              <cite title="Source Title">Source Title</cite>
            </footer>
          </blockquote>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

          <hr>

          
          
          
          
          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3" name="commentText"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="btnsave">Submit</button>
              </form>
            </div>
          </div>

          
          
          
          
          
          
          <!-- Single Comment -->
           <?php foreach ($comms as $post) : ?>
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="img/<?php echo $row['user_pic']; ?> alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo $row['user_name']; ?></h5>
              <?php echo $post['text'];?>
            </div>
          </div>
          <?php endforeach;?>

          <!-- Comment with nested comments -->


        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php include"includes/footer.php" ?>;

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
