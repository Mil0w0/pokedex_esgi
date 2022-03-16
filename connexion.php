<!DOCTYPE html>
<html>
    <?php include('includes/head.php'); ?>
    <body>
        <?php include('includes/header.php'); ?>
        <main id="connexion-main">
            <div>
                <h2>Je possède un compte</h2>
                <form>
                    <input type="email" name="email" placeholder=" E-mail">
                    <input type="password" name="password" placeholder=" Mot de passe">
                    <input type="submit" value="Connexion">
                </form>
            </div>
            <div>
                <h2>Je crée un compte</h2>
                <form>
                    <input type="text" name="pseudo" placeholder=" Pseudo">
                    <input type="email" name="email" placeholder=" E-mail">
                    <input type="password" name="password" placeholder=" Mot de passe">
                    <label for="photo">Image de profil : </label>
                    <input type="file" name="image" id="photo">
                    <input type="submit" value="Connexion">
                </form>
            </div>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>
