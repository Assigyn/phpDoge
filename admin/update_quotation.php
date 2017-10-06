<?php

// Connect to DB
require('bdd/connection.php');

// Declare these two variables for later ($id might be not affected below)
$id = -1;
$dataQuote = null;

// Getting targeted quotation
if (isset($_GET['modify'])) {
    $id = $_GET['modify'];
}

$errorPostArray = array();

/* Checking $_POST's values */
if ($_POST) {

    // Affect $id to update the targeted column later
    if (!empty($_POST['modify']) || isset($_POST['modify']))
        $id = $_POST['modify'];

    if (empty($_POST['titre']) || !isset($_POST['titre']))
        $errorPostArray['titre'] = "Missing input : You must complete the title input.";
    if (empty($_POST['stitre']) || !isset($_POST['stitre']))
        $errorPostArray['stitre'] = "Missing input : You must assign a sub titre.";
    if (empty($_POST['date']) || !isset($_POST['date']))
        $errorPostArray['date'] = "Missing input : You must complete the date.";
    if (empty($_POST['contenu']) || !isset($_POST['contenu']))
        $errorPostArray['contenu'] = "Missing input : You must complete the date input.";

    // If there are no errors, let's do the SQL query
    if (!$errorPostArray || count($errorPostArray) === 0) {
        $titre = $_POST['titre'];
        $stitre = $_POST['stitre'];
        $date = $_POST['date'];
        $contenu = $_POST['contenu'];

        // SQL Query
        $sqlModifyQuery = "UPDATE evenements SET titre='$titre', stitre='$stitre', date='$date', contenu='$contenu' WHERE id=$id";
        $bdd->query($sqlModifyQuery);

        // Redirection to homepage.
        header('location:articleListing.php');
    }
}

// Get current values by ID to fill inputs
if ($id) {
    $sqlQueryChosenQuote = "SELECT * FROM evenements WHERE id = $id";
    $resultQuote = $bdd->query($sqlQueryChosenQuote);
    $dataQuote = $resultQuote->fetch_assoc();
}

?>

<?php

    include('');

?>


<div class="container">
    <section id="articleForm">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 bgWhite">
                <h2 class="text-left">Modifier votre article</h2>
                <form action="update_quotation.php" method="post"> <!-- FORM STARTS HERE -->
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre"
                               value="<?php echo isset($dataQuote["titre"]) ? $dataQuote["titre"] : ''; ?>">
                        <p class="alert-danger error_message">
                            <?php if (isset($errorPostArray['titre'])) echo $errorPostArray['titre']; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="stitre">Sous-titre</label>
                        <input type="text" class="form-control" id="stitre" name="stitre"
                               value="<?php echo isset($dataQuote["stitre"]) ? $dataQuote["stitre"] : ''; ?>">
                        <p class="alert-danger error_message">
                            <?php if (isset($errorPostArray['stitre'])) echo $errorPostArray['stitre']; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date"
                               value="<?php echo isset($dataQuote["date"]) ? date('Y-m-d', strtotime($dataQuote["date"])) : date('Y-m-d'); ?>">
                        <p class="alert-danger error_message">
                            <?php if (isset($errorPostArray['date'])) echo $errorPostArray['date']; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="contenu">Message</label>
                        <textarea class="form-control" name="contenu" id="contenu" cols="30" rows="10"><?php echo isset($dataQuote["contenu"]) ? $dataQuote["contenu"] : ''; ?></textarea>
                        <p class="alert-danger error_message">
                            <?php if (isset($errorPostArray['contenu'])) echo $errorPostArray['contenu']; ?>
                        </p>
                    </div>
                    <div class="form-group sendImageInput"><!-- File input -->
                        <label for="">Envoi d'image</label>
                        <input type="file" id="">
                        <p class="help-block">Formats acceptés : jpg, png. Max : 2Mo.</p>
                    </div>

                    <input type="hidden" name="modify" id="modify" value="<?php echo $id ?>">
                <button type="submit" id="submit" class="btn btn-kaamelott">Valider</button>
                </form>
            </div>
        </div>
    </section>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>


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
