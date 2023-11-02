<?php
interface Icontact{
    public function ajouter(Contact $contact,$db);
    public static function modifier($id,$nom,$prenom,$telephone,$db);
    public static function supprimer($db,$id);
}
?>