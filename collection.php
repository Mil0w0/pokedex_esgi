<?php session_start();  ?>
<!DOCTYPE html>
<html>
    <?php include('includes/head.php'); 
    include('includes/config.php');
    ?>
    <body>
        <?php include('includes/header.php'); ?>
        <main class="collection-container">

        <?php

        $q = 'SELECT nom, pv, attaque, defense, vitesse, image FROM pokemon' ; 
        $req = $bdd->query($q); // Requête non préparée
        // Récupération des résultats de la requête SELECT
        $results = $req->fetchAll(PDO::FETCH_ASSOC);

        // var_dump($results);


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


<!-- J'ai peur de supprimer ça
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
            </div> -->
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>
