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
//

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

//OUVERTURE SESSION et enregistrement des paramètres de base de la session
//
session_start();
$_SESSION['email'] = $_POST['email'];

$q = 'SELECT pseudo,image,id FROM user WHERE email = :email'; 
$req = $bdd->prepare($q); 
$req->execute([	
	'email' => $_SESSION['email']
	]);
$results =  $req->fetchAll();

$_SESSION['pseudo'] = $results[0]['pseudo'];
//Les images de profil sont archivées dans vérifications/uploads.
$_SESSION['image'] = 'verifications/uploads/' . $results[0]['image'];
$_SESSION['id_user'] = $results[0]['id'];

//Redirection si tout va bien
header('location: ../index.php?alert=Connexion réussie');
exit;


?>