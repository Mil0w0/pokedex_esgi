<?php  include('includes/connexion_check.php');
var_dump($_SESSION) ;
?>

<!DOCTYPE html>

<html>
    <?php include('includes/head.php'); ?>
    <body>
        <?php include('includes/header.php'); ?>
        <main id="profile-main">
            <h1>Mon compte</h1>
            <section>
                <h2>Mes infos</h2>
                <h3>Pseudo : <span><?= $_SESSION['pseudo'] ?></span></h3>
                <h3>Email : <span><?= $_SESSION['email'] ?></span></h3>
                <div id="profile-image">
                    <h3>Image : </h3>
                    <?php echo '<img src="' . $_SESSION['image'] . '" alt="photo de profil">' ?>
                </div>
            </section>
            <hr>
            <h2>Mes pokemons</h2>
            <section class="collection-container">
                <div class="collection-card">
                <div class="collection-text">
                    <h4>Aéromite</h4>
                    <p>PV</p>
                    <p>Attaque</p>
                    <p>Défense</p>
                    <p>Vitesse</p>
                </div>
                <img src="images/pikachu.png">
            </div>
            <div class="collection-card">
                <div class="collection-text">
                    <h4>Aéromite</h4>
                    <p>PV</p>
                    <p>Attaque</p>
                    <p>Défense</p>
                    <p>Vitesse</p>
                </div>
                <img src="images/pikachu.png">
            </div>
            <div class="collection-card">
                <div class="collection-text">
                    <h4>Aéromite</h4>
                    <p>PV</p>
                    <p>Attaque</p>
                    <p>Défense</p>
                    <p>Vitesse</p>
                </div>
                <img src="images/pikachu.png">
            </div>
            <div class="collection-card">
                <div class="collection-text">
                    <h4>Aéromite</h4>
                    <p>PV</p>
                    <p>Attaque</p>
                    <p>Défense</p>
                    <p>Vitesse</p>
                </div>
                <img src="images/pikachu.png">
            </div>
            <div class="collection-card">
                <div class="collection-text">
                    <h4>Aéromite</h4>
                    <p>PV</p>
                    <p>Attaque</p>
                    <p>Défense</p>
                    <p>Vitesse</p>
                </div>
                <img src="images/pikachu.png">
            </div>
            <div class="collection-card">
                <div class="collection-text">
                    <h4>Aéromite</h4>
                    <p>PV</p>
                    <p>Attaque</p>
                    <p>Défense</p>
                    <p>Vitesse</p>
                </div>
                <img src="images/pikachu.png">
            </div>
            <div class="collection-card">
                <div class="collection-text">
                    <h4>Aéromite</h4>
                    <p>PV</p>
                    <p>Attaque</p>
                    <p>Défense</p>
                    <p>Vitesse</p>
                </div>
                <img src="images/pikachu.png">
            </div>
            <div class="collection-card">
                <div class="collection-text">
                    <h4>Aéromite</h4>
                    <p>PV</p>
                    <p>Attaque</p>
                    <p>Défense</p>
                    <p>Vitesse</p>
                </div>
                <img src="images/pikachu.png">
            </div>
            <div class="collection-card">
                <div class="collection-text">
                    <h4>Aéromite</h4>
                    <p>PV</p>
                    <p>Attaque</p>
                    <p>Défense</p>
                    <p>Vitesse</p>
                </div>
                <img src="images/pikachu.png">
            </div>
            <div class="collection-card">
                <div class="collection-text">
                    <h4>Aéromite</h4>
                    <p>PV</p>
                    <p>Attaque</p>
                    <p>Défense</p>
                    <p>Vitesse</p>
                </div>
                <img src="images/pikachu.png">
            </div>
            <div class="collection-card">
                <div class="collection-text">
                    <h4>Aéromite</h4>
                    <p>PV</p>
                    <p>Attaque</p>
                    <p>Défense</p>
                    <p>Vitesse</p>
                </div>
                <img src="images/pikachu.png">
            </div>
            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>
