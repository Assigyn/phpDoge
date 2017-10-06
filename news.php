<?php

$titlePage = "Les actualités";
$currentPage = "news";
$pageDescription = "Les actualités du club";

include('header.php'); ?>

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
            

            <div class="row">
                <div class="newsPresentation">
                    <div class="col-xs-12 col-sm-5 no-margin-left">
                        <a data-toggle="modal" href="#businessModal1"><img src="img/news_badminton.jpg" class="img-responsive" alt="photo"></a>
                    </div>
                    <div class="col-xs-12 col-sm-7 no-margin">
                            <div class="titleLeft col-xs-12 no-margin">
                                <h3>Titre de l'article</h3>
                            </div>
                            <div class="col-lg-12 no-margin ">
                                <p>Description de l'article</p>
                            </div>
                        <div class="knowMore">
                            <a data-toggle="modal" href="#businessModal1"> > En savoir plus </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="newsPresentation">
                    <div class="col-xs-12 col-sm-5 no-margin-left">
                        <a data-toggle="modal" href="#businessModal1"><img src="img/news_badminton.jpg" class="img-responsive" alt="photo"></a>
                    </div>
                    <div class="col-xs-12 col-sm-7 no-margin">
                        <div class="titleLeft col-xs-12 no-margin">
                            <h3>Titre de l'article</h3>
                        </div>
                        <div class="col-lg-12 no-margin ">
                            <p>Description de l'article</p>
                        </div>
                        <div class="knowMore">
                            <a data-toggle="modal" href="#businessModal1"> > En savoir plus </a>
                        </div>
                    </div>
                </div>
            </div>

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


<!-- Modal Drawer -->
<div class="business-modal modal fade" id="businessModal1" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h2>Titre de l'article</h2>
                            <p class="item-intro text-muted"></p>
                            <img class="d-block mx-auto img-responsive" src="img/news_bg.jpg" alt="illustration de l'article">
                            <p class="text-left">À l'heure de la standardisation des intérieurs du monde entier, nous, Drawer, prenons le pari que le design ne s'uniformise
                                pas si facilement, que les formes ont encore à dire et que l'on peut aimer ce qui n'est pas toujours
                                « instagramable »
                                Drawer.fr est une startup e-commerce de meubles design basée à Euratechnologies à Lille. Notre entreprise connaît un fort
                                développement depuis son lancement en 2011.
                            </p>
                            <p class="text-left">À l'heure de la standardisation des intérieurs du monde entier, nous, Drawer, prenons le pari que le design ne s'uniformise
                                pas si facilement, que les formes ont encore à dire et que l'on peut aimer ce qui n'est pas toujours
                                « instagramable »
                                Drawer.fr est une startup e-commerce de meubles design basée à Euratechnologies à Lille. Notre entreprise connaît un fort
                                développement depuis son lancement en 2011.
                            </p>
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

<?php include('footer.php'); ?>