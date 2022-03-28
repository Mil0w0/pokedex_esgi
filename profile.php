<?php  include('includes/connexion_check.php');
include('includes/config.php');
//var_dump($_SESSION) ;
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
            <?php
            
            
                $q = 'SELECT nom, pv, attaque, defense, vitesse, image FROM pokemon WHERE id_user = :id' ; 
                $req = $bdd->prepare($q); 
                $req -> execute([
                        'id' => $_SESSION['id_user'] 
                ]);
                // Récupération des résultats de la requête SELECT
                $results = $req->fetchAll(PDO::FETCH_ASSOC);

                //var_dump($results);

                //Affichage des cartes pokémons avec toutes les stats.
                /* Selon le modèle suivant :
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
                */
                
                foreach($results as $key => $pokemon) {
                    echo '<div class="collection-card">
                    <div class="collection-text">
                    <h4>'. $pokemon['nom'] . '</h4>';
                            echo ' <p>PV : '. $pokemon['pv'] .'</p>';
                            echo ' <p>Attaque : '. $pokemon['attaque'] .'</p> ';
                            echo ' <p>Défense : '. $pokemon['defense'] .'</p>';
                            echo ' <p>Vitesse : '. $pokemon['vitesse'] .'</p>';
                            echo '</div>' ;
                            echo ' <img src="verifications/uploads/pokemon/' . $pokemon['image'] . '" alt="image du pokemon">';
                            echo '</div>';
                           
                    }
            ?>
    
            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>
