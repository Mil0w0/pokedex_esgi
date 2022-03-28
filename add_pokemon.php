<?php  include('includes/connexion_check.php')?>

<!DOCTYPE html>
<html>
    <?php include('includes/head.php'); ?>
    <body>
        <?php include('includes/header.php'); ?>
        <main id="createpokemon-main">
            <h1>ajouter un pokemon</h1>
            <?php  
                if(isset($_GET['alert']) && !empty($_GET['alert']))
                { echo '<h3 class="error">'. $_GET['alert'] .'</h3>' ;} 
            ?>
            <form enctype="multipart/form-data" method="POST" action="verifications/verif_pokemon.php">
                <input type="text" name="nom" placeholder=" Nom">
                <input type="text" name="pv" placeholder=" PV">
                <input type="text" name="attaque" placeholder=" Attaque">
                <input type="text" name="defense" placeholder=" Defense">
                <input type="text" name="vitesse" placeholder=" Vitesse">
                <label for="photo">Image : </label>
                <input type="file" name="image" id="photo">
                <input type="submit" value="Ajouter">
            </form>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>
