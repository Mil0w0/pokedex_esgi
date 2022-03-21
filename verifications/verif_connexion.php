<?php 
//CE FICHIER vérifie si un utilisateur a un compte dans la bdd et lui ouvru une session si oui.

include('../includes/config.php');


//Vérification des champs vides 
//

if(empty($_POST['email']) || empty($_POST['password'])){
	header('location: ../connexion.php?alert=Vous devez remplir tous les champs');
	exit;
}

// Vérification validité de l'email
//

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	header('location: ../connexion.php?alert=Format de l\' email invalide.');
	exit;
}


//Vérification connexion


$q = 'SELECT id FROM user WHERE email = :email AND password = :password'; 
$req = $bdd->prepare($q); 

$req->execute([	
				'email' => $_POST['email'],
                'password' => hash('sha512', $_POST['password'] )
			]);

//PDO::FETCH_ASSOC : utiliser pour ne pas afficher en double les indexs.
$results = $req->fetchAll(PDO::FETCH_ASSOC); 

if(count($results) == 0) {
    header('location: ../connexion.php?alert=Identifiants incorrects!');
    exit;
}

//OUVERTURE SESSION et enregistrement paramètres de base
session_start();
$_SESSION['email'] = $_POST['email'];

$q = 'SELECT pseudo,image FROM user WHERE email = "' . $_SESSION['email'] . '"'; 
$req = $bdd->query($q); 
$results =  $req->fetchAll();

$_SESSION['pseudo'] = $results[0]['pseudo'];
$_SESSION['image'] = 'verifications/uploads/' . $results[0]['image'];



header('location: ../index.php?alert=Connexion réussie');
exit;


?>