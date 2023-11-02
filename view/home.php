<style>

    /* body{
        background-image: linear-gradient(135deg, #1f4037 10%, #99f2c8 100%);;
    } */
     .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; 
        justify-content: flex-start; 
        margin-top: -35%;
        margin-left: 20%;
    }
   
   .card {
        border: 1px solid #ccc;
        background-color: white;
        border-radius: 8px;
        padding: 20px;
        margin: 10px;
        width: 300px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .card h2 {
        color: #333;
        font-size: 1.5em;
        margin-bottom: 10px;
    }

    .card p {
        color: #666;
    }

    .card input {
        /* background-color: #4CAF50; */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        margin: 5px;
        cursor: pointer;
        font-size: 14px;
        width: 70%;
    }

    .card button:hover {
        /* background-color: #45a049; */
    }

    .favori {
        background-color: #FF0000; /* Couleur rouge */
        color: white;
        height: 35px;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        margin: 5px;
        cursor: pointer;
        font-size: 14px;
        margin-left: 60px;
    }

    .favori-on {
        background-color: #00FF00; /* Couleur verte */
        color: white;
        height: 35px;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        margin: 5px;
        cursor: pointer;
        font-size: 14px;
        margin-left: 60px;
    }
.green{
    background-color: green;

}

.form{
    width: 130%;
}

.allforms{
    display: flex;
    margin-left: 30px;
    margin-top: 10px;
    justify-content: space-between;
}
</style>

<script>
    function toggleFavori(id) {
        var button = document.getElementById('favoriBtn_' + id);
        if (button.classList.contains('favori-on')) {
            button.classList.remove('favori-on');
            button.textContent = 'Ajouter aux favoris';
        } else {
            button.classList.add('favori-on');
            button.textContent = 'Retirer des favoris';
        }
    }
</script>


<?php
include('../modele/Contact.php');
include('../modele/Database.php');
?>
 <?php include('../view/navbar.html')  ?>
    <div class="card-container">
      
           <?php
    $contacts = Contact::afficher($database);
    foreach ($contacts as $contact):
        $_SESSION['contact_id'] = $contact['id'];
        ?>
        <div class="card">
        <h2><?php echo $contact['prenom'] . ' ' . $contact['nom']; ?></h2>
        <p>Téléphone: <?php echo $contact['telephone']; ?></p>
        <form action="../control/app.php" method="post">
        <input type="hidden" name="contact_idf" value="<?php echo $contact['id']; ?>">
        <button id="favoriBtn_<?php echo $contact['id']; ?>" name = "favori" class="favori" onclick="toggleFavori(<?php echo $contact['id']; ?>)">
            Ajouter aux favoris
        </button>
        </form>
    <div class="allforms">
        <form action="forModif.php" method="post" class="form">
            <input type="hidden" name="contact_id" value="<?php echo $contact['id']; ?>">
            <input class='green' value='Modifier' type="submit" name="update">
         </form>
        <form action="../control/app.php" method="post" class="form">
            <input type="hidden" name="contact_idDelete" value="<?php echo $contact['id']; ?>">
            <input class='green' value='Supprimer' type="submit" name="delete">
        </form>
    </div>     
    </div>
        <?php
    endforeach;
    ?>
    </div>