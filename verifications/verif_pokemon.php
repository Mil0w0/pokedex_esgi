<?php 
session_start();
//VERIFICATION AVANT AJOUT NOUVEAU POKEMON

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

$fileName = $_FILES['image']['name'];

$array= explode('.', $fileName);

$extension = end($array);

$fileName ='img-pokemon-' . time() . '.' . $extension ;

$destination = $path . '/' . $fileName ;

//
//On enregistre le fichier envoyé dans le serveur
//
move_uploaded_file($_FILES['image']['tmp_name'], $destination);

// var_dump($_SESSION['email']);

//RECHERCHE DE $id_user
$query = 'SELECT id FROM user WHERE email = "' . $_SESSION['email'] .'"';
$req = $bdd->query($query);
$id_ = $req->fetchAll(PDO::FETCH_ASSOC);

$id_user = $id_[0]['id'] ;


$q = 'INSERT INTO pokemon(nom, pv, attaque, defense, vitesse, image, id_user) VALUES (:nom, :pv, :attaque, :defense, :vitesse, :image, :id_user)';

$req = $bdd -> prepare($q) ;

$result = $req -> execute([
    'nom' => $_POST['nom'],
    'pv' => $_POST['pv'],
    'attaque' => $_POST['attaque'],
    'defense' => $_POST['defense'],
    'vitesse' => $_POST['vitesse'],
    'image' => isset($fileName) ? $fileName : 'default.png',
    'id_user' => $id_user 
]);

header('location: ../profile.php');

?>

