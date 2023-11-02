<?php  
include('interface.php');
class Contact implements Icontact{
    private $nom;
    private $prenom;
    private $telephone;

    public function  __construct($_nom,$_prenom,$_telephone){
        $this->nom = $_nom;
        $this->prenom = $_prenom;
        $this->telephone = $_telephone;
    }

    public function ajouter(Contact $contact,$db){
           
            $requete = $db->prepare("INSERT INTO contact(nom, prenom, telephone,favoris) VALUES(:nom, :prenom, :telephone,:favoris)");
            $requete->execute(
                array(
                    ':nom' => $contact->nom,
                    ':prenom' => $contact->prenom,
                    ':telephone' => $contact->telephone,
                    ':favoris'=>0
                )
            );
            header('../view/index.php');
        }

        public static function modifier($id,$nom,$prenom,$telephone,$db){
            $req= $db->prepare("UPDATE contact SET nom= :nom, prenom = :prenom, telephone = :telephone WHERE id = $id");
            $req->execute(array(":nom"=> $nom, ":prenom"=> $prenom, ":telephone"=> $telephone));
            
            echo "yesssss";
           
        }

        public static function supprimer($db,$id){
            $req= $db->prepare("DELETE FROM taches WHERE id = :id");
        $req->execute(array(":id"=>$id));
        echo 'supp validei';
        }

        public static function gererFavoris($id, $db) {
            $requete = $db->prepare("SELECT favoris FROM contact WHERE id = :id");
            $requete->execute(array(":id" => $id));
            $statutFavori = $requete->fetch(PDO::FETCH_COLUMN);
            $nouveauStatut = ($statutFavori == 1) ? 0 : 1;
            $req = $db->prepare("UPDATE contact SET favoris = :nouveauStatut WHERE id = :id");
            $req->execute(array(":nouveauStatut" => $nouveauStatut, ":id" => $id));
        }
        public static function afficher($db){
            $req = $db->prepare("SELECT * FROM contact");
            $liste =  $req->execute();
            $liste = $req->fetchAll(); 
            // print_r($liste);
            return $liste;
           
        }

        public static function listeFavoris($db){
            $requete = $db->prepare("SELECT * FROM  contact WHERE favoris = :favoris");
            $liste= $requete->execute(array(':favoris'=>1));
            $liste =$requete->fetchAll();
            return $liste;
        }

    }


?>