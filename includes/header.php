<header>
    <img src="images/logo.png">
    <nav>
        <ul>
            <li>
                <a href="index.php">Accueil</a>
            </li>
            <li>
                <a href="collection.php">Collection</a>
            </li>
           

            <!-- APPARAIT QUE SI USER CONNECTE -->
            <?php 
            if ( isset($_SESSION['email'])) {
                echo '
                <li>
                <a href="add_pokemon.php">Ajouter un pokémon</a>
                </li>';

                echo '<li>
                    <a href="profile.php">Mon compte</a>
                </li>' ;

                echo '<li>
                    <a href="deconnexion.php">Deconnexion</a>
                </li>' ;
            } else {
                echo ' <li>
                <a href="connexion.php">Connexion</a>
                </li>' ;
            }
            
            ?>

        </ul>
    </nav>
</header>
