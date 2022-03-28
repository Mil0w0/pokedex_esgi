<?php 
session_start();
//VERIFICATIONS AVANT AJOUT NOUVEAU POKEMON

include('../includes/config.php');

//Vérification des champs vides 
//

if(empty($_POST['nom']) || empty($_POST['pv']) || empty($_POST['attaque']) || empty($_POST['defense']) || empty($_POST['vitesse'])){
	header('location: ../add_pokemon.php?alert=Vous devez remplir tous les champs');
	exit;
}

//Le nom n’est pas déjà utilisé :
//
$q = 'SELECT id FROM pokemon WHERE nom = :nom'; 
$req = $bdd->prepare($q); 

$req->execute([	
				'nom' => $_POST['nom']
			]);
$results = $req->fetchAll(PDO::FETCH_ASSOC); 

if(count ($results) != 0) {
    header('location: ../add_pokemon.php?alert=Ce nom de pokémon est déjà utilisé !');
    exit;
}

// Les champs de stats sont bien des integers:
//
$inputName = array('pv', 'attaque', 'defense', 'vitesse');

foreach($inputName as $stat){

    if (filter_var($_POST[$stat], FILTER_VALIDATE_INT) === false){
        header('location: ../add_pokemon.php?alert=Vous ne pouvez mettre qu\'un nombre dans les champs de statistiques du pokémon');
        exit;    
        
    }    
    //Pour chaque champ que l'on veut vérifier, si ce n'est pas un nombre, on redirige.
}




// IMAGE PAS TROP LOURDE
//
if($_FILES['image']['size'] > 1024*1024*1 ) {
    header('location: ../add_pokemon.php?alert=Image trop lourde');
    exit;
}

//ENREGISTREMENT DE L'IMAGE POKEMON
$path = 'uploads/pokemon';

if(!file_exists($path)){
    mkdir($path, 0777); //chmod 777 
}

$imageName = $_FILES['image']['name'];

$array= explode('.', $imageName);

$extension = end($array);

$fileName ='img-pokemon-' . time() . '.' . $extension ;

$destination = $path . '/' . $fileName ;

//
//On enregistre le fichier envoyé dans le serveur
//
move_uploaded_file($_FILES['image']['tmp_name'], $destination);


//RECHERCHE DE $id_user
$query = 'SELECT id FROM user WHERE email = :email';
$req = $bdd->prepare($query);
$req -> execute ([
    'email' => $_SESSION['email']
]);
$id_ = $req->fetchAll(PDO::FETCH_ASSOC);

$id_user = $id_[0]['id'] ;

//INSERTION DES VALEURS DANS LA  BDD
$q = 'INSERT INTO pokemon(nom, pv, attaque, defense, vitesse, image, id_user) VALUES (:nom, :pv, :attaque, :defense, :vitesse, :image, :id_user)';

$req = $bdd -> prepare($q) ;

$result = $req -> execute([
    'nom' => $_POST['nom'],
    'pv' => $_POST['pv'],
    'attaque' => $_POST['attaque'],
    'defense' => $_POST['defense'],
    'vitesse' => $_POST['vitesse'],
    'image' => empty($imageName) == false ? $fileName : 'default.png' ,
    //Par défault, si le pokémon n'a pas d'image, affiche un oeuf
    'id_user' => $id_user 
]);

header('location: ../profile.php');

?>

