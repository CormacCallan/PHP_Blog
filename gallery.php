<?php 

require('database/database.php');


$queryPost = 'SELECT * FROM gallery';
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

        <title>Gallery</title>

        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Custom styles for this template -->
        <link href="css/modern-business.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


        <style>

        </style>
    </head>

    <body>
        <div id="fb-root"></div>

        <!-- Navigation -->

        <?php include'includes/nav.php'; ?>

        <!-- Page Content -->
        <div class="container">

<!DOCTYPE html>
<html>
<head>
<style>
div.gallery {
    border: 1px solid #ccc;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}

* {
    box-sizing: border-box;
}

.responsive {
    padding: 0 6px;
    float: left;
    width: 24.99999%;
}

@media only screen and (max-width: 700px) {
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
}

@media only screen and (max-width: 500px) {
    .responsive {
        width: 100%;
    }
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
</style>
</head>
<body>

<h2>Responsive Image Gallery</h2>
<h4>Resize the browser window to see the effect.</h4>

<?php foreach ($posts as $post) : ?>
<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img/<?php echo $post['file']; ?>">
      <img src="img/<?php echo $post['file']; ?>" alt="Trolltunga Norway" width="300" height="200">
    </a>
    <div class="desc">Add a description of the image here</div>
  </div>
</div>
<?php endforeach;?>



<div class="clearfix"></div>

<div style="padding:6px;">
  <p>This example use media queries to re-arrange the images on different screen sizes: for screens larger than 700px wide, it will show four images side by side, for screens smaller than 700px, it will show two images side by side. For screens smaller than 500px, the images will stack vertically (100%).</p>
  <p>You will learn more about media queries and responsive web design later in our CSS Tutorial.</p>
</div>

</body>
</html>


        </div>
        <!-- /.container -->

        <?php include"includes/footer.php" ?>;

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Contact form JavaScript -->
        <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

    </body>

</html>
