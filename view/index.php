<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
  <?php  include('navbar.html');?>
    
    <div class="container">  
        <form id="contact" action="../control/app.php" method="post">
          <h3>Gestion de contact</h3>
          <h4>Sauvegardez et gérez au mieux vos contacts</h4>
          <fieldset>
            <input placeholder="Nom" type="text" tabindex="1" required autofocus name="nom">
          </fieldset>
          <fieldset>
            <input placeholder="Prenom" type="text" tabindex="2" required name="prenom">
          </fieldset>
          <fieldset>
            <input placeholder="Numéro Tél" type="tel" tabindex="3" required name="numero">
          </fieldset>
         
          <fieldset>
            <button type="submit" id="contact-submit" data-submit="...Sending" name="sent">Submit</button>
          </fieldset>
        </form>
       
        
      </div>
</body>
</html>