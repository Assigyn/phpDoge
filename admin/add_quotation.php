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


        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
        $uploadQuery = "INSERT INTO tbl_images(name) VALUES ('$file')";  

        if ($bdd->query($uploadQuery) === TRUE) {
            $last_id = $bdd->insert_id;
        }

        // SQL Query
        $sqlAddQuery = "INSERT INTO evenements (titre, stitre, date, contenu, id_image) VALUES ('$titre','$stitre','$date','$contenu', '$last_id')";
        $bdd->query($sqlAddQuery);

        // Redirection to homepage.
        header('location:articleListing.php');
    }
}
?>

<?php

include('../header.php');

?>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">

<div class="container">
    <section id="articleForm">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 bgWhite">
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
                        <label for="contenu">Message</label>
                        <textarea class="form-control" name="contenu" id="contenu" cols="30" rows="10"><?php echo isset($_POST["contenu"]) ? $_POST["contenu"] : ''; ?></textarea>
                    </div>

                    <div class="form-group sendImageInput"><!-- File input -->
                        <label for="">Envoi d'image</label>
                        <input type="file" name="image" id="image" />  
                        <br />  
                        
                        <p class="help-block">Formats acceptés : jpg, png. Max : 2Mo.</p>
                    </div>

                    <button type="submit" name="insert" id="insert" value="Insert" class="btn btn-danger">Envoyer</button>
                </form>
            </div>
        </div>
    </section>
</div>

<?php
// Closing DB connection
$bdd->close();
?>


<div class="container-fluid darkGrey"><!-- Footer section-->
    <div class="container">
        <footer>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Entreprises</a></li>
                        <li><a href="#">Actualités</a></li>
                        <li><a href="#">Doge Team</a></li>
                        <li><a href="#">Mentions légales</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12 text-right visible-lg visible-md visible-sm hidden-xs">
                    <img class="logoImg" src="img/logo_white.png" alt="logo Doge" title="logo Doge">
                </div>
                <p>Copyright (c) Doge CLub</p>
                <div id="socialNetworks">
                    <ul>
                        <li><a href="#"><img class="img-responsive" src="img/fb_icon.png" alt="Facebook"></a></li>
                        <li><a href="#"><img class="img-responsive" src="img/twitter_icon.png" alt="Twitter"></a></li>
                        <li><a href="#"><img class="img-responsive" src="img/ytube_icon.png" alt="Twitter"></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/scrollreveal.min.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- The AJAX login script -->
    <script src="js/login.js"></script>

<script type="text/javascript">
    $(document).ready(function(){  //Progressive scroll animation on index page
        window.sr = ScrollReveal();
        sr.reveal('#introduction', { duration: 600 },);
        sr.reveal('#activities', { duration: 600 },);
        sr.reveal('#euratechnologie', { duration: 600 },);
        sr.reveal('#news', { duration: 600 },);
        sr.reveal('#contact', { duration: 600 },);
    });

</script>


</body>
</html>