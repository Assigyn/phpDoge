<?php

$titlePage = "Le Doge Club vous souhaite la bienvenue";
$currentPage = "home";
$pageDescription = "La page principale du site";

include ('header.php');
if ($_POST)
{
    $myemail = 'aurelien.buscot@gmail.com';
    $errors = array();

    if (empty($_POST['first_name']))
    {
        $errors['nom1'] = "Veuillez indiquer votre nom.";
    }
    if (!preg_match("/^[a-zA-Z ]*$/", $_POST['first_name']))
    {
        $errors['nom2'] = "Votre nom ne peut comporter que des lettres.";
    }
    if (empty($_POST['last_name']))
    {
        $errors['prenom1'] = "Veuillez indiquer votre prénom";
    }
    if (!preg_match("/^[a-zA-Z ]*$/", $_POST['last_name']))
    {
        $errors['prenom2'] = "Votre prénom ne peut comporter que de lettres.";
    }
    if (!preg_match("/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/", $_POST['email']))
    {
        $errors['email1'] = "Votre mail est invalide.";
    }
    if (empty($_POST['objet']))
    {
        $errors['objet1'] = "Veuillez indiquer l'objet de votre message.";
    }
    if (empty($_POST['message']))
    {
        $errors['message1'] = "Vous n'avez pas écrit de message.";
    }
    if (count($errors) == 0) {
        {
            $to = $myemail;
            $name = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $company = $_POST['company'];
            $email_address = $_POST['email'];
            $message = $_POST['message'];
            $email_subject = $_POST['objet'];
            $email_body = "Vous avez reçu un nouveau message. "." Voici le contenu du message:\n Nom: $name \n Prénom: $lastName \n Organisme: $company"."Email: $email_address\n Message \n $message";
            $headers = "From: $myemail\n";
            $headers .= "Reply-To: $email_address";
            mail($to,$email_subject,$email_body,$headers);
            $validation = '<div class="alert alert-success" role="alert">Votre message a bien été envoyé</div>';
            unset($_POST);
        }
    }
}
?>

<div class="container-fluid no-margin videoContain hidden-xs visible-sm visible-md visible-lg">
    <div class="col-lg-12"><h2>The place to be at Euratechnologies</h2></div>
    <div id="videoPlayer" class="player"
         data-property="{videoURL:'https://youtu.be/FeLrfTioYww',
         containment:'#videoPlayer',
         startAt:10,
         mute:false,
         autoPlay:true,
         optimizeDisplay:true,
         loop:true,
         opacity:1}">
    </div>
</div>

<div class="container-fluid no-margin imgContain hidden-lg hidden-md hidden-sm visible-xs">
    <div class="col-lg-12"><h2>The place to be at Euratechnologies</h2></div>
</div>


<div class="container"> <!-- Introduction section -->
    <section id="introduction">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 text-center">
                <h2>Ici commence notre histoire...</h2>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta
                    sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                    ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate
                    velit esse
                    quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
            </div>
        </div>
    </section>
</div>

<div class="container-fluid grey"> <!-- Activities section. Fluid section for full background color-->
    <div class="container">
        <section id="activities">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12 text-center">
                    <h2>Ce que nous proposons</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 text-center activitiesFrame">
                    <img src="img/assemble_icon.png" alt="assemble" title="assemble">
                    <h4 class="text-center text-bold">Rassembler</h4>
                    <p class="text-center">Afin de créer des relations durables entre tous les acteurs du bâtiment.</p>
                </div>
                <div class="col-sm-4 text-center activitiesFrame">
                    <img src="img/animate_icon.png" alt="animate" title="animate">
                    <h4 class="text-center text-bold">Animer</h4>
                    <p class="text-center">Des activités diverses et variées pour dynamiser la vie d'entreprise.</p>
                </div>
                <div class="col-sm-4 text-center activitiesFrame">
                    <img src="img/housing_icon.png" alt="housing" title="housing">
                    <h4 class="text-center text-bold">Amménager</h4>
                    <p class="text-center">Les lieux de vie pour créer un endroit où il fait bon vivre et travailler</p>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="container"> <!-- Euratech section -->
    <section id="euratechnologie">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>Ecosystème numérique</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 text-center">
                <img class="img-responsive img-circle" src="img/euratechnologie.jpg" alt="euratechnologie" title="batiment euratech">
            </div>
            <div class="col-md-7 col-md-offset-1 col-sm-6">
                <h4>Euratechnologie c'est un écosystème digital avec 300 entreprises.</h4>
                <p>
                    EuraTechnologies accompagne le développement de tous les entrepreneurs du numérique grâce à une
                    méthodologie et un savoir-faire unique dans le soutien aux entreprises, de leur amorçage à leur
                    déploiement international. Créé en 2009, EuraTechnologies a été classé dans le top 10 des
                    accélérateurs d’Europe par Fundacity, et le 1er en France !</p>
            </div>
        </div>
    </section>
</div>

<div class="container-fluid grey"> <!-- News sections-->
    <div class="container">
        <section id="news">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2>Les dernières actualités</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 newsFrame">
                    <div class="cropImg">
                        <a href="news.php"><img class="img-responsive" src="img/news_kayak.jpg" alt="photo meet up"></a>
                    </div>
                    <h3><a href="#">Premier meet-up de Kayak Communication</a></h3>
                    <p>Ce mardi 19 Septembre 2016, Kayak Communication a effectué son premier meet-up
                        d'une longue série dans le domaine du numérique....
                    </p>
                    <a class="text-bold" href="news.php">> Lire la suite</a>
                </div>

                <div class="col-md-4 col-sm-6 newsFrame">
                    <a href="news.php"><img class="img-responsive" src="img/news_ak10.jpg" alt="photo bureau"></a>
                    <h3><a href="news.php">La société Ak 10 arrive dans nos locaux</a></h3>
                    <p>Ak10, nouvelle entreprise du numérique qui s'installe dans nos locaux. Leur mission :
                        minimiser vos dépenses dans les goulags.
                    </p>
                    <a class="text-bold" href="news.php">> Lire la suite</a>
                </div>

                <div class="col-md-4 col-sm-6 newsFrame">
                    <a href="news.php"><img class="img-responsive" src="img/news_apero.jpg" alt="photo fête"></a>
                    <h3><a href="news.php">Retour sur l'apéro du 12 Septembre 2016</a></h3>
                    <p>Le Doge Club a organisé ce mardi 12 Septembre 2016 un apéro pour que toutes les entreprises
                        des locaux A et B fassent plus ample connaissance.
                    </p>
                    <a class="text-bold" href="news.php">> Lire la suite</a>
                </div>
            </div>
            <div class="row">
                <div id="contactAnchor" class="col-lg-12 btn-seeAll">
                    <a href="news.php" class="btn btn-danger btn-lg">Voir plus d'actualités</a>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="container">
    <section id="contact"> <!-- Contact section-->
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2>Contactez-nous !</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                    <?php if(isset($validation)) ?>
                    <?php echo $validation; ?>
                <form action="#contactAnchor" id="contactForm" method="post">
                    <div class="form-group">
                        <input class="form-control" id="first_name" name="first_name" type="text" placeholder="Votre nom *" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
                        <div class="alert alert-danger" role="alert">
                            <?php if(isset($errors['nom1'])) echo $errors['nom1']; ?><?php if(isset($errors['nom2'])) echo $errors['nom2']; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="last_name" name="last_name" type="text" placeholder="Votre prénom *" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                        <div class="alert alert-danger" role="alert">
                            <?php if(isset($errors['prenom1'])) echo $errors['prenom1'];?><?php if(isset($errors['prenom2'])) echo $errors['prenom2']; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="company" name="company" type="text" placeholder="Votre entreprise (facultatif)" value="<?php if(isset($_POST['company'])) echo $_POST['company']; ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="email" name="email" type="text" placeholder="Votre email *" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                        <div class="alert alert-danger" role="alert">
                            <?php if(isset($errors['email1'])) echo $errors['email1']; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="objet" name="objet" type="text" placeholder="Objet *" value="<?php if(isset($_POST['objet'])) echo $_POST['objet']; ?>">
                        <div class="alert alert-danger" role="alert">
                            <?php if(isset($errors['objet1'])) echo $errors['objet1'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="message" name="message" placeholder="Votre Message...*"><?php if(isset($_POST['message'])) echo $_POST['message']; ?></textarea>
                        <div class="alert alert-danger" role="alert">
                            <?php if(isset($errors['message1'])) echo $errors['message1']; ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
            <div class="col-sm-12 col-md-6"> <!-- Gmap -->
                <iframe width="100%" height="400" frameborder="0" style="border-radius:7px;" src="https://www.google.com/maps/embed/v1/view?key=AIzaSyC78ZsYNiBk7RXhaewJfXk2q7MQ_yc5OuQ&zoom=17&center=50.6331%2C3.0203" allowfullscreen></iframe>
            </div>
        </div>
    </section>
</div>
<?php include ('footer.php'); ?>

