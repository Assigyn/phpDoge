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

<html>

<header>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

</header>

</body>

<div class="container-fluid">
    <div class="container">
        <a href="login/logout.php" class="btn btn-danger btn-lg btn-block btn-decos btn-logout pull-right">Logout</a>
        <section id="articleForm">
            <div class="row bg-danger listing-articles">
                <div class="col-md-12  col-sm-12">
                    <a href="add_quotation.php" class="pull-right">
                    <i class="fa fa-plus-circle fa-5x" aria-hidden="true"></i>
                    </a>

                    <h2 class="text-left title-listing">Mes articles</h2>
                    



                    <?php  
                    //Print all quotations
                    while ($quote = $result->fetch_assoc()) { 
                    ?>
                    <table class="table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Titre</th>
                            <th scope="col">Sous-titre</th>
                            <th scope="col">Contenu</th>
                            <th scope="col">Image</th>
                            <th scope="col">Date</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td  data-label="Titre" class="table-titre"><?php echo $quote['titre']; ?></td>
                            <td  data-label="Stitre" class="table-stitre"><?php echo $quote['stitre']; ?></td>
                            <td  data-label="Contenu" class="table-contenu"><?php echo $quote['contenu']; ?></td>
                            <td  data-label="Image" class="table-image">
                                <?php
                                    $sqlQueryImage = "SELECT name FROM tbl_images WHERE id =" . $quote['id_image'];
                                    $imageResult = $bdd->query($sqlQueryImage);
                                    $imageName = $imageResult->fetch_assoc();
                                    echo '<img src="data:image/jpeg;base64,'.base64_encode($imageName['name']).'" height="100" width="100" class="img-thumnail" />'
                                ?>
                            </td>
                            <td  data-label="Date de publication" class="table-date"><?php echo $quote['date']; ?></td>

                            <!-- Modification Articles 
                            <td  data-label="Modifier">
                                <form action="update_quotation.php" class="formInline" method="GET">
                                    <button class="btn btn-actualité" type="submit" name="modify" value="<?php echo $quote['id'] ?>">
                                        Modifier
                                    </button>
                                </form>
                            </td>
                            -->

                            <td  data-label="Supprimer" class="table-sup">
                                <form action="articleListing.php" class="formInline" method="GET">
                                    <button class="btn btn-danger" type="submit" name="delete" value="<?php echo $quote['id'] ?>">
                                    <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
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
</div>


<?php
// Closing DB connection
$bdd->close();
?>






<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="login/js/bootstrap.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="login/js/jquery-2.2.4.min.js"></script>
<!-- The AJAX login script -->
<script src="login/js/login.js"></script>




</body>
</html>