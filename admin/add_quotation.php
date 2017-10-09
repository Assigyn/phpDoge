<?php

// Connect to DB
require('bdd/connection.php');

$errorPostArray = array();

/* Checking $_POST's values */
if ($_POST) {

    if (empty($_POST['titre']) || !isset($_POST['titre']))
        $errorPostArray['titre'] = "Missing input : You must complete the title input.";
    if (empty($_POST['stitre']) || !isset($_POST['stitre']))
        $errorPostArray['stitre'] = "Missing input : You must assign a Sub title.";
    if (empty($_POST['date']) || !isset($_POST['date']))
        $errorPostArray['date'] = "Missing input : You must complete the date input.";
    if (empty($_POST['contenu']) || !isset($_POST['contenu']))
        $errorPostArray['contenu'] = "Missing input : You must complete the comment area.";

    // If there are no errors, let's do the SQL query
   if (!$errorPostArray || count($errorPostArray) === 0) {
        $titre = $_POST['titre'];
        $stitre = $_POST['stitre'];
        $date = $_POST['date'];
        $contenu = $_POST['contenu'];
        $_contenu = addslashes($contenu);



        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
        $uploadQuery = "INSERT INTO tbl_images(name) VALUES ('$file')";  

        if ($bdd->query($uploadQuery) === TRUE) {
            $last_id = $bdd->insert_id;
        }

        // SQL Query
        $sqlAddQuery = "INSERT INTO evenements (titre, stitre, date, contenu, id_image) VALUES ('$titre','$stitre','$date','$_contenu', '$last_id')";
        $bdd->query($sqlAddQuery);

        // Redirection to homepage.
        header('location:articleListing.php');
    }
}
?>

<html>

<header>

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

</header>



<br><br><br><br>
<div class="container">
<a href="login/logout.php" class="btn btn-danger btn-lg btn-block btn-logout pull-right">Logout</a>
    <section id="articleForm">
        <div class="row add-articles">
            <div class="col-md-8 col-md-offset-2 col-sm-12 bgWhite">
                <a href="articleListing.php" class="pull-right">
                <i class="fa fa-chevron-circle-left fa-5x" aria-hidden="true"></i>
                </a>
                <h2 class="text-left">Nouvel article</h2>
                    <form action="./add_quotation.php" method="POST" enctype="multipart/form-data"> <!-- FORM STARTS HERE -->
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre"
                               value="<?php echo isset($_POST["titre"]) ? $_POST["titre"] : ''; ?>">
                        <p class="alert-danger error_message">
                            <?php if (isset($errorPostArray['titre'])) echo $errorPostArray['titre']; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="stitre">Sous-Titre</label>
                        <input type="text" class="form-control" id="stitre" name="stitre"
                               value="<?php echo isset($_POST["stitre"]) ? $_POST["stitre"] : ''; ?>">
                        <p class="alert-danger error_message">
                            <?php if (isset($errorPostArray['stitre'])) echo $errorPostArray['stitre']; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="date">Date de création</label>
                        <input type="date" class="form-control" id="date" name="date"
                               value="<?php echo isset($_POST["date"]) ? $_POST["date"] : date('Y-m-d'); ?>">
                        <p class="alert-danger error_message">
                            <?php if (isset($errorPostArray['date'])) echo $errorPostArray['date']; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="contenu">Contenu</label>
                        <textarea class="form-control" name="contenu" id="contenu" cols="30" rows="15"><?php echo isset($_POST["contenu"]) ? $_POST["contenu"] : ''; ?></textarea>
                    </div>
                    <!-- File input -->
                    <div class="form-group sendImageInput">
                        <label for="">Image</label>
                        <input type="file" name="image" id="image" />  
                        <p class="help-block">Formats acceptés : jpg, png. Max : 2Mo.</p>
                    </div>
                    <button type="submit" name="insert" id="insert" value="Insert" class="btn btn-danger">Publier</button>
                </form>
            </div>
        </div>
    </section>
</div>

<?php
// Closing DB connection
$bdd->close();
?>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="login/js/bootstrap.js"></script>
<!-- The AJAX login script -->
<script src="login/js/login.js"></script>

<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  


</body>
</html>