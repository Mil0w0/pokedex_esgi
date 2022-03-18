<footer>
    <?php
        // En paramètre dans date(), on met le code du format qu'on souhaite
        // 'Y' signifie année en 4 chiffres.
        // Pour test si la connexion à BDD focntionne.

        $year = date('Y');
        echo '<p>Copyright '. $year .' Gaudeaux & Hilderal</p>';
    ?>
</footer>