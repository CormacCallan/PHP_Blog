<?php

require('database/database.php');

$queryPost = 'SELECT * FROM blog order by blogID asc limit 3';
$statement = $db->prepare($queryPost);
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();




$queryUsers = 'SELECT * FROM tbl_users order by user_id desc limit 3';
$statement2 = $db->prepare($queryUsers);
$statement2->execute();
$users = $statement2->fetchAll(PDO::FETCH_ASSOC);
$statement2->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blackrock Athletics Club</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="js/ccScript.js"></script>
    <script>

        $(document).ready(function(){ /*code here*/  
        $("#slide").hide();       
    $("#slide").slideDown("slow","swing");
    }) ;


        
        
        
        </script>
  </head>

  <body>
      
    <?php include'includes/nav.php';?>
      

    <header>
    <div id="slide">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('img/social.png')">
            <div class="carousel-caption d-none d-md-block">
 
              <p></p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/blog.png')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Keep up to Date</h3>
              <p></p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/membership.png')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Follow Us</h3>
              <p></p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    </header>

    <!-- Page Content -->
    <div class="container">

      <h1 id="zoom" class="my-4">Keeping up to date..</h1>
    
      <!-- Marketing Icons Section -->
      <div class="row">
          <?php foreach ($posts as $post) : ?>
        <div  class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"><?php echo $post['blogTitle'];?></h4>
            <div class="card-body">
              <p class="card-text"><?php echo$post['blogText'];?></p>
            </div>
            <div class="card-footer">
                <a id="fade2"  href="blogHome.php" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
               <?php endforeach;?><br>
    
              </div>
      <!-- /.row -->

      <!-- Portfolio Section -->
      <h2>Newest Members</h2>

      <div class="row">
        <?php foreach ($users as $post) : ?>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
              <img class="card-img-top"  src="img/<?php echo $post['user_pic']; ?>" alt="">
            <div class="card-body">
              <h4 class="card-title">
                <?php echo $post['user_name'];?>
              </h4>
                <p class="card-text"> <?php echo $post['joining_date'];?></p>
            </div>
          </div>
        </div>
          <?php endforeach;?>
      </div>
      <!-- /.row -->

      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <h2>Featured Article</h2>
          <p>The Modern Business template by Start Bootstrap includes:</p>
          <ul>
            <li>
              <strong>Bootstrap v4</strong>
            </li>
            <li>jQuery</li>
            <li>Font Awesome</li>
            <li>Working contact form with validation</li>
            <li>Unstyled page elements for easy customization</li>
          </ul>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4">
        <div class="col-md-8">
          <p>You can sign up to our club online by click here.</p>
        </div>
        <div class="col-md-4">
            <a class="btn btn-lg btn-secondary btn-block" href="payment/index.php">Become a Member</a>
        </div>
      </div>

    </div>
    <!-- /.container -->

    <?php include"includes/footer.php" ?>;

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>


