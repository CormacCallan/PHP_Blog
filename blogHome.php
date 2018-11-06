<?php

require('database/database.php');

$queryPost = 'SELECT * FROM blog';
$statement = $db->prepare($queryPost);
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();



?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Our Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <?php include'includes/nav.php'?>
      
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Blog
        <small></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Blog Home </li>
      </ol>

      <!-- Blog Post -->
      <?php foreach ($posts as $post) : ?>
      <div class="card mb-4">
        <div class="card-body">         
          <div class="row">
            <div class="col-lg-6">
              <a href="#">
                  <img class="img-fluid rounded" src="img/<?php echo $post['blogImg'];?>" alt="">
              </a>
            </div>
            <div class="col-lg-6">
              <h2 class="card-title"><?php echo $post['blogTitle'];?></h2>
              <p class="card-text"><?php echo$post['blogText'];?></p>
              
              <form action="comment.php" method="POST" >
              
              <!--<a href="blogPost.php" class="btn btn-primary" >Read More &rarr;</a>-->
              <input class="btn btn-primary" type="submit" name='blogID' value="<?php echo $post['blogID'];?>"><br>
              </form>
              
            </div>
          </div>
        </div>
        <div class="card-footer text-muted">
          Posted on January 1, 2017 by
          <a href="#">Start Bootstrap</a>
        </div>
      </div>
      
      <?php endforeach;?><br>



      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li>
      </ul>

    </div>

  </div>
  <!-- /.container -->

  <?php include'includes/footer.php'?>;

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>


