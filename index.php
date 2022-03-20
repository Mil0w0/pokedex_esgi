<?php session_start();  
?>

<!DOCTYPE html>
<html>
    <?php include('includes/head.php'); ?>
    <body>
        <?php include('includes/header.php'); ?>
        <main id="index-main">
            <img src="images/pikachu.png" alt="pikachu">
            <h1>Bienvenue sur le pokedex de l'ESGI !</h1>
            <?php  
                if(isset($_GET['alert']) && !empty($_GET['alert']))
                { echo '<p>'. $_GET['alert'] .'</p>' ;} 
            ?>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>
