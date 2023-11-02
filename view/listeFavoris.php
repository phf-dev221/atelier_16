<style>
    .contacts-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: -40%;
}

.contacts-table th, .contacts-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.contacts-table th {
    background-color: #f2f2f2;
}

.contacts-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.contacts-table tr:hover {
    background-color: #e9e9e9;
}
</style>

<?php
include('../modele/Database.php');
include('../modele/Contact.php');
$contacts = Contact::listeFavoris($database);
// foreach($favoris as $favori){
//     print_r( $favori);
// }
?>
<?php  include('navbar.html');?>
<table class="contacts-table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($contacts as $contact):
        ?>
        <tr>
            <td><?php echo $contact['nom']; ?></td>
            <td><?php echo $contact['prenom']; ?></td>
            <td><?php echo $contact['telephone']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
