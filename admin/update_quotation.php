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


<html>

<header>

    <link rel="stylesheet" href="css/bootsrap.css">
    <link rel="stylesheet" href="css/style.css">

</header>



<br><br><br><br>
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



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/scrollreveal.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- The AJAX login script -->
    <script src="js/login.js"></script>




</body>
</html>
