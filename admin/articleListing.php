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
                <a href="add_quotation.php" class="pull-right">
                    <button class="btn btn-danger no-responsive">
                        <span class="glyphicon glyphicon-plus"></span>
                        <span class="hidden-xs"> Nouveau</span>
                    </button>
                </a>

                <h2 class="text-left">Mes articles</h2>
                



                <?php  
                //Print all quotations
                while ($quote = $result->fetch_assoc()) { 
                ?>
                <table class="table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">Contenu</th>
                        <th scope="col">Image</th>
                        <th scope="col">Date</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td  data-label="Titre"><?php echo $quote['titre']; ?></td>
                        <td  data-label="Contenu"><?php echo $quote['stitre']; ?></td>
                        <td  data-label="Afficher">
                            <?php
                                $sqlQueryImage = "SELECT name FROM tbl_images WHERE id =" . $quote['id_image'];
                                $imageResult = $bdd->query($sqlQueryImage);
                                $imageName = $imageResult->fetch_assoc();
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($imageName['name']).'" height="100" width="100" class="img-thumnail" />'
                            ?>
                        </td>
                        <td  data-label="Date de publication"><?php echo $quote['date']; ?></td>

                        <!-- Modification Articles 
                        <td  data-label="Modifier">
                            <form action="update_quotation.php" class="formInline" method="GET">
                                <button class="btn btn-actualité" type="submit" name="modify" value="<?php echo $quote['id'] ?>">
                                    Modifier
                                </button>
                            </form>
                        </td>
                        -->

                        <td  data-label="Supprimer">
                            <form action="articleListing.php" class="formInline" method="GET">
                                <button class="btn btn-danger" type="submit" name="delete" value="<?php echo $quote['id'] ?>">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                    <?php } ?>
                </table>


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