<?php

$titlePage = "Les actualités";
$currentPage = "news";
$pageDescription = "Les actualités du club";

include('header.php'); ?>

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

<div class="container">
    <section id="news">
        <div class="row">
            <div class="col-xs-12">
                <h2>Les actualités</h2>
                <div class="titleDeco">
                    <div class="titleDecoForm">
                    </div>
                </div>
            </div>
        </div>
        <div id="main" class="col-md-8 col-sm-12">

        <!-- affichege des elements a partir de la bdd -->
        <?php  
            while ($quote = $result->fetch_assoc()) { 
         ?>
            <div class="row">
                <div class="newsPresentation">
                    <!-- image -->
                    <div class="col-xs-12 col-sm-5 no-margin-left">
                        <a data-toggle="modal" href="#businessModal1">
                            <?php
                                $sqlQueryImage = "SELECT name FROM tbl_images WHERE id =" . $quote['id_image'];
                                $imageResult = $bdd->query($sqlQueryImage);
                                $imageName = $imageResult->fetch_assoc();
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($imageName['name']).'" height="250" width="100%"/>'
                            ?>
                        </a>
                    </div>
                    <!-- titre et description -->
                    <div class="col-xs-12 col-sm-7 no-margin">
                            <!-- titre -->
                            <div class="titleLeft col-xs-12 no-margin">
                                <h3><?php echo $quote['titre']; ?></h3>
                            </div>
                            <!--description-->
                            <div class="col-lg-12 no-margin ">
                                <p><?php echo $quote['stitre']; ?></p>
                            </div>
                        <!-- en savoir plus -->
                        <div class="knowMore">
                            <a data-toggle="modal" href="#<?php echo $quote['id'];?>">En savoir plus</a>
                        </div>
                    </div>
                </div>

            </div>
        
                    
        <?php } ?>

        </div>


        <!-- iFrame Facebook -->
        <div class="col-md-4 hidden-sm hidden-xs no-margin">
            <iframe class="socialNetworkWidth col-sm-6" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fdogeclubeuratec%2F&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                    height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true">
            </iframe>

            <!-- iFrame Twitter -->
        <div id="twitterPart">
            <a class="twitter-timeline socialNetworkWidth" data-height="800" href="https://twitter.com/TwitterDev">Tweets by TwitterDev</a>
            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>

        </div>


    </section>

</div>

<?php
// Display citation's data
        $sqlQueryQuotes = "SELECT * FROM evenements";
        $result = $bdd->query($sqlQueryQuotes);
?>

<?php  
    while ($quote = $result->fetch_assoc()) { 
?>
<!-- Modal Drawer -->
<div class="business-modal modal fade" id="<?php echo $quote['id'];?>" tabindex="" role="dialog" aria-hidden="true">
    <!-- affichege des elements a partir de la bdd -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
          
                    <div class="col-md-8 col-md-offset-2 col-sm-12">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2><?php echo $quote['titre']; ?></h2>
                            <p class="item-intro text-muted"><?php echo $quote['stitre']; ?></p>

                                <?php
                                $sqlQueryImage = "SELECT name FROM tbl_images WHERE id =" . $quote['id_image'];
                                $imageResult = $bdd->query($sqlQueryImage);
                                $imageName = $imageResult->fetch_assoc();
                                echo '<img class="d-block mAuto img-responsive" src="data:image/jpeg;base64,'.base64_encode($imageName['name']).'" />'
                                ?>

                            <p class="text-left"><?php echo $quote['contenu']; ?></p>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fa fa-times"></i>Fermer
                            </button>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php
// Closing DB connection
$bdd->close();
?>

<?php include('footer.php'); ?>