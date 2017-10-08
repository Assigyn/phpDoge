<div class="container-fluid darkGrey"><!-- Footer section-->
    <div class="container">
        <footer>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="business.php">Entreprises</a></li>
                        <li><a href="team.php">Doge Team</a></li>
                        <li><a href="news.php">Actualités</a></li>
                        <li><a href="legalMentions">Mentions légales</a></li>
                        <li><a href="/admin/login.php">Private acess</a></li>
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


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="js/jquery.mb.YTPlayer.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scrollreveal.min.js"></script>
<script src="js/navbar.js"></script>

<script type="text/javascript">

    jQuery(function () {


        jQuery("#videoPlayer").YTPlayer();

        var filters = {
            grayscale: 100,
            brightness: 50
        };

        jQuery('#videoPlayer').YTPApplyFilters(filters)


        //Condition for change of navbar

        var php_page = "<?php echo $currentPage; ?>";

        if (php_page == "home") {

            $('header').css('margin-bottom', '0');

            window.sr = ScrollReveal();
            sr.reveal('#introduction', {duration: 600},);
            sr.reveal('#activities', {duration: 600},);
            sr.reveal('#euratechnologie', {duration: 600},);
            sr.reveal('#news', {duration: 600},);
            sr.reveal('#contact', {duration: 600},);

            checkScroll();

            if ($('.navbar').length > 0) {
                $(window).on("scroll load resize", function () {
                    checkScroll();
                });
            }
        }

        else {
            $('.navbar ').css({"background-color": "#ddd", "color": "#333"});
        }

    });

</script>


</body>
</html>