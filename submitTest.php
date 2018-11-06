<?php
require('database/database.php');
$queryBoxers = "SELECT * FROM users";
$statement1 = $db->prepare($queryBoxers);
$statement1->execute();
$boxers = $statement1->fetchAll(PDO::FETCH_ASSOC);
$statement1->closeCursor();



if(isset($_POST['btnsave']))
{
    

$name = filter_input(INPUT_POST, 'name');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');


$imgFile = $_FILES['bimage']['name'];
$tmp_dir = $_FILES['bimage']['tmp_name'];
$imgSize = $_FILES['bimage']['size'];


if(empty($name)){
$error_message = "Please enter artist name.";
}
else if(empty($username)){
$error_message = "Please enter artist genre.";
}
else if(empty($password)){
$error_message = "Please enter artist country.";
}
else
{
$upload_dir = 'images/'; // upload directory

$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

// valid image extensions
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

// rename uploading image
$boxerPic = rand(1000,1000000).".".$imgExt;

// allow valid image file formats
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
}
// if no error occured, continue ....
if(!isset($error_message))
{
$statement = $db->prepare('INSERT INTO users(name,username,password,avatar) VALUES(:aname,:ausername,:apassword,:aavatar)');
$statement->bindParam(':aname',$name);
$statement->bindParam(':ausername',$username);
$statement->bindParam(':apassword',$password);
$statement->bindParam(':aavatar',$boxerPic);

if($statement->execute())
{
$successMSG = "new record succesfully inserted ...";
header("refresh:2;submitTest.php"); // redirects image view page after 2 seconds.
}
else
{
$error_message = "error while inserting....";
}
}
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <Style>
            #addButton{
                width: 100%;
                padding: 15px;
                background-color: #98ff00;
                color: black;
            }

            table, th{
                border: 1px solid green;
                text-align: center;
            }
            
            td{
                border-bottom: 1px solid black;
            }
            
            #descInput{
                width: 100%;
                padding-bottom: 200px;
            }
            
            select{
                width: 100%;
            }

        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>EADB - Add Artists</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="css/business-casual.css" rel="stylesheet">

    </head>

    <body>



        
        
    <div class="container">

        <div class="bg-faded p-4 my-4">

            <?php
if(isset($error_message)){
?>
<div class="alert alert-danger">
<strong><?php echo $error_message; ?></strong>
</div>
<?php
}
else if(isset($successMSG)){
?>
<div class="alert alert-success">
<strong><?php echo $successMSG; ?></strong>
</div>
<?php
}
?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
<table class="table table-bordered table-responsive micro">
<tr>
<td><label class="control-label">Artist Name</label></td>
<td><input class="form-control" type="text" name="name" placeholder="Enter Name" value="<?php echo $name; ?>" /></td>
</tr>
<tr>
<td><label class="control-label">Genre</label></td>
  <td><select name="genreID">
    <option value="1">House</option>
    <option value="2">Techno</option>
    <option value="3">Tech House</option>
      </select></td>
</tr>
<tr>
<td><label class="control-label">Country</label></td>
<td><input class="form-control" type="text" name="username" placeholder="Country" value="<?php echo $username; ?>" /></td>
</tr>
<tr>
<td><label class="control-label">Label</label></td>
<td><input class="form-control" type="text" name="password" placeholder="Label" value="<?php echo $password; ?>" /></td>
</tr>
<tr>
</tr>
<tr>
<td><label class="control-label">Artist Img.</label></td>
<td><input class="input-group" type="file" name="bimage" accept="images/*" /></td>
</tr>
<tr>
<td colspan="2"><button type="submit" name="btnsave" class="btn btn-success">Save</button>
</td>
</tr>
</table>
</form>
            
            
            <br>
            <br>
            <table style="width:100%">   

                <?php foreach ($boxers as $artist) : ?> 

                    <tr>
                        <td><?php echo $artist['name']; ?></td>
                        <td><?php echo $artist['username']; ?></td>
                        <td><?php echo $artist['password']; ?></td>
                        <td><?php echo $artist['avatar']; ?></td>
                        

                        </td>
                        
                      
                        
                    </tr>    





                    </form>

                <?php endforeach; ?>   

            </table>        

        </div>
        
    </div>
    <br>
</table> 
</div>

</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</div>
<!-- /.container -->

<?php require 'footer.php'?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Zoom when clicked function for Google Map -->
<script>
            $('.map-container').click(function () {
                $(this).find('iframe').addClass('clicked')
            }).mouseleave(function () {
                $(this).find('iframe').removeClass('clicked')
            });
</script>

</body>

</html>


