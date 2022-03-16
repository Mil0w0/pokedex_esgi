<!DOCTYPE html>
<html>
    <?php include('includes/head.php'); ?>
    <body>
        <?php include('includes/header.php'); ?>
        <main id="createpokemon-main">
            <h1>ajouter un pokemon</h1>
            <form enctype="multipart/form-data" method="POST">
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
