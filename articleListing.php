<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ajouter un article</title>

    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab|Open+Sans" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="bgGrey">

<!-- Static navbar -->

<header><!-- Backoffice navbar-->
    <nav id="backoffice">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <a class="navbar-brand hidden-xs hidden-sm visible-md visible-lg" href="#">
                        <img src="img/logo_white.png" class="logoImg" alt="Doge_logo" title="Doge logo">
                    </a>
                    <a class="navbar-brand visible-xs visible-sm hidden-md" href="#">
                        <img src="img/logo_small_white.png" class="logoImg" alt="Doge_logo" title="Doge logo">
                    </a>
                </div>
                <div class="col-xs-6 text-right">
                    <button class="btn btn-primary btn-lg no-responsive"><!-- Connexion btn -->
                        <span class="visible-xs hidden-sm hidden-md hidden-lg glyphicon glyphicon-user"></span>
                        <span class="hidden-xs visible-sm visible-md visible-lg"> Déconnexion</span></button>
                </div>
            </div>
        </div>
    </nav>
</header>
<?php

// Connecting to DB
require('bdd/connection.php');

// Getting ID from previous query ?
$idDelete = isset($_GET['delete']) && $_GET['delete'] ? $_GET['delete'] : null;

// If an ID has been sent, delete this one
if ($idDelete) {
    $sqlQueryDeleteQuote = "DELETE FROM evenements WHERE id = $idDelete";
    $bdd->query($sqlQueryDeleteQuote);
}

// Display citation's data
$sqlQueryQuotes = "SELECT * FROM evenements";
$result = $bdd->query($sqlQueryQuotes);

// Checking query result
if (!$result)
    echo '<p>No result founded.</p>';
// Print all quotations
while ($quote = $result->fetch_assoc()) { ?>
<div class="container">
    <section id="articleForm">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 bgWhite">
                <div class="col-xs-6 no-margin"><h2 class="text-left">Mes articles</h2></div>
                <div class="col-xs-6 no-margin newArticle"><button class="btn btn-danger no-responsive">
                        <span class="glyphicon glyphicon-plus"></span><span class="hidden-xs"> Nouveau</span></button></div>
                <table class="table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">Contenu</th>
                        <th scope="col">Date de publication</th>
                        <th scope="col">Afficher</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td  data-label="Titre"><?php echo $quote['titre']; ?></td>
                        <td  data-label="Contenu"><?php echo $quote['stitre']; ?></td>
                        <td  data-label="Date de publication"><?php echo $quote['date']; ?></td>
                        <td  data-label="Afficher"><button class="btnForm btnView">Voir</button></td>
                        <td  data-label="Modifier"><a href="form2.php"><button class="btnForm btnEdit" type="submit" name="modify" value="<?php echo $quote['id'] ?>">Modifier</button></a></td>
                        <td  data-label="Supprimer"><button class="btnForm btnDelete" type="submit" name="delete" value="<?php echo $quote['id'] ?>">Supprimer</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } ?>
    </section>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>


</body>
</html>