<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:../articleListing.php");
}
?>

<?php

    include('');

?>

<body class="bgMap">


<div class="container">

    <section id="login">
        <div class="row">
            <div id="loginImage" class="col-xs-12 text-center">
                <a href="index.php"><img src="img/logo_white.png" alt="logo_Doge"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user" style="width: auto"></i>
                            </span>
                                <input name="myusername" id="myusername" type="text" class="form-control" placeholder="Username" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock" style="width: auto"></i>
                            </span>
                                <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary" name="Submit" id="submit" style="width: 100%">
                            Login
                        </button>


	                    <a href="signup.php" name="Sign Up" id="signup" class="btn btn-lg btn-primary btn-block" type="submit">Create new account</a>
                        -->
                        <div id="message"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>



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


