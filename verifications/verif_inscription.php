<?php 
//Ce fichier centralise toutes les vérifications à effectuer avant d'inscrire un utilisateur dans la BDD.

include('../includes/config.php');


//Vérification des champs vides 
//

if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['pseudo'] || empty($_POST['image']))){
	header('location: ../connexion.php?alert=Vous devez remplir tous les champs');
	exit;
}

// Vérification validité de l'email
//

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	header('location: ../connexion.php?alert=Format de l\' email invalide.');
	exit;
}


//Vérification du pseudo : pas déjà utilisé
//

$q = 'SELECT id FROM user WHERE pseudo = :pseudo'; 
$req = $bdd->prepare($q); 

$req->execute([	
				'pseudo' => $_POST['pseudo']
			]);

// Récupération des résultats de la requête SELECT
$results = $req->fetchAll(PDO::FETCH_ASSOC); 


//La fonction count() retourne le nb d'éléments d'un tableau
if(count ($results) != 0) {
    header('location: ../connexion.php?alert=Ce pseudo est déjà utilisé !');
    exit;
}

//Vérification e-mail : pas déjà utilisé 
//
$q = 'SELECT id FROM user WHERE email = :email'; 
$req = $bdd->prepare($q); 

$req->execute([	
				'email' => $_POST['email']
			]);

//PDO::FETCH_ASSOC : utiliser pour ne pas afficher en double les indexs.
$results = $req->fetchAll(PDO::FETCH_ASSOC); 

// var_dump($results);

if(count ($results) != 0) {
    header('location: ../connexion.php?alert=Cet email est déjà utilisé !');
    exit;
}

/*Vérification mdp : min 8 caractères dont une majuscule, 
une minuscule et un chiffre.*/



//Vérification image : fichier uploadé est une image et ne dépasse pas 1Mo.
//
var_dump($_FILES["image"]);
if($_FILES['image']['error'] != 4 ){

	//si le fichier n'est pas du bon type : pas dans le tableau de type alors redirection avec message
	
	$acceptable = [
		'image/jpeg',
		'image/gif',
		'image/png'
	];

	if (!in_array($_FILES['image']['type'], $acceptable)){
		header('location: ../connexion.php?alert=Type de fichier incorrecte');
		exit;
	}
    
	//si la taille du fichier est > 1Mo 

	$maxSize = 1*1024*1024 ; //1Mo

	if($_FILES['image']['size'] > $maxSize ) {
		header('location: ../connexion.php?alert=Image trop lourde');
		exit;
    }
}


//SI TOUT VA BIEN : 
//
$q = 'INSERT INTO user(pseudo,email,password,image) VALUES (:pseudo, :email, :password, :image)'; 
$req = $bdd->prepare($q); 

$req->execute([	
				'pseudo' => $_POST['pseudo'],
				'email' => $_POST['email'],
				'password' => $_POST['password'],
				'image' => isset($fileName) ? $fileName : 'nope' 
			]);


    ?>