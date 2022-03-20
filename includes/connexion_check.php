<?php 
    session_start(); 
    if(!isset($_SESSION['email'])){
	    header('location: index.php?alert=Vous n\'êtes pas connecté.');
        exit;
    }
?>