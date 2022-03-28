<?php 
// Ce fichier permet la connexion à la bdd

try{
    $bdd = new PDO('mysql:host=localhost:3306;dbname=pokedex', 'admin', 'Respons11', [PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}
//Test : on affiche l'erreur s'il y a un problème de connexion.

?>