<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:../articleListing.php");
}
?>

<html>
<header>
    

    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

</header>

<body class="bgMap">


<div class="container">

    <section id="login">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Doge Club<br>Identification</h2>
                        <h4>Gestion d'article</h4>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                                <input name="myusername" id="myusername" type="text" class="form-control" placeholder="Username" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-lock" aria-hidden="tr   ue"></i>
                            </span>
                                <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary" name="Submit" id="submit" style="width: 100%">
                            Login
                        </button>
                        
                        <br><br><br>
                        <a href="../../home.php" class="pull-right">
                            <i class="fa fa fa-home fa-5x" aria-hidden="true"></i>
                        </a>

                        <!--
	                    <a href="signup.php" name="Sign Up" id="signup" class="btn btn-lg btn-primary btn-block" type="submit">Create new account</a>
                        -->
                        <div id="message"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- The AJAX login script -->
    <script src="js/login.js"></script>




</body>
</html>


