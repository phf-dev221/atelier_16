<?php
session_start();
include('../modele/Contact.php');
include('../modele/Database.php');

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['sent'])){
        
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['numero'];
    
    $newContact = new Contact($nom,$prenom,$telephone);
    $newContact->ajouter($newContact,$database);
    header('../view/index.php');
}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
    } if (isset($_POST['delete'])) {
        $contactIdToDelete = $_POST['contact_idDelete'];
        $req= $database->prepare("DELETE FROM contact WHERE id = :id");
        $req->execute(array(":id"=>$contactIdToDelete));

        header("Location:../view/home.php");
    }


if(($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['modifier']))) {
    $id = $_POST['modifier'];

    $name = $_POST['firstname']; 
    $lastname = $_POST['lastname']; 
    $number = $_POST['number']; 

    $req = $database->prepare("UPDATE contact SET nom = :nom, prenom = :prenom, telephone = :telephone WHERE id = :id");
    $req->execute(array(":nom"=> $name, ":prenom"=> $lastname, ":telephone"=> $number, ":id" => $id));

    header("location: ../view/home.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['favori'])) {
       $id=$_POST['contact_idf'];

        Contact::gererFavoris($id,$database);
        header("location: ../view/home.php");
    }
}

?>