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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="container-fluid grey"> <!-- News sections-->
    <div class="container">
        <section id="news">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2>Les dernières actualités</h2>
                </div>
            </div>
            <div class="row">

            <?php  
                //Print all quotations
                while ($quote = $result->fetch_assoc()) { 
                ?>


                <div class="col-md-4 col-sm-6 newsFrame">
                    <div class="cropImg">
                        <a href="news.php">
                            <?php
                                $sqlQueryImage = "SELECT name FROM tbl_images WHERE id =" . $quote['id_image'];
                                $imageResult = $bdd->query($sqlQueryImage);
                                $imageName = $imageResult->fetch_assoc();
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($imageName['name']).'" height="250" width="100%"/>'
                            ?>
                        </a>
                    </div>
                    <h3><a href="#"><?php echo $quote['titre']; ?></a></h3>
                    <p><?php echo $quote['contenu']; ?></p>
                    <a class="text-bold" href="news.php">> Lire la suite</a>
                </div>


                <?php } ?>
            </div>
            <div class="row">
                <div id="contactAnchor" class="col-lg-12 btn-seeAll">
                    <a href="news.php" class="btn btn-danger btn-lg">Voir plus d'actualités</a>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
// Closing DB connection
$bdd->close();
?>

    
</body>
</html>