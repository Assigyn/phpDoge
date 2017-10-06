<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $titlePage; ?></title>
    <meta name="description" content="<?php echo $pageDescription; ?>">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab|Open+Sans" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/logo_small.png" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand hidden-xs hidden-sm visible-md visible-lg" href="home.php">
                <img src="img/logo.png" class="logoImg" alt="Doge_logo" title="Doge logo">
                </a>
                <a class="navbar-brand visible-xs visible-sm hidden-md" href="home.php">
                    <img src="img/logo_small.png" class="logoImg" alt="Doge_logo" title="Doge logo">
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li <?php if($currentPage =="home") echo"class=\"active\"";?>><a href="home.php">Home</a></li>
                    <li <?php if($currentPage =="business") echo"class=\"active\"";?>><a href="business.php">Entreprises</a></li>
                    <li <?php if($currentPage =="team") echo"class=\"active\"";?>><a href="team.php">Doge Team</a></li>
                    <li <?php if($currentPage =="news") echo"class=\"active\"";?>><a href="news.php">Actualités</a></li>
                    <li><a class="js-scrollTo" href="home.php#contactAnchor">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav><!-- End of navbar-->
</header>
