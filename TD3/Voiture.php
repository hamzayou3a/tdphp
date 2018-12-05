<?php
    class Voiture
    {

        private $marque;
        private $couleur;
        private $immatriculation;

        public function getMarque()
        {
            return $this->marque;
        }

        public function setMarque($marque2)
        {
            $this->marque = $marque2;
        }

        public function getCouleur()
        {
            return $this->couleur;
        }

        public function setCouleur($couleur2)
        {
            $this->couleur  = $couleur2;
        }

        public function getImmatriculation()
        {
            return $this->immatriculation;
        }

        public function setImmatriculation($immatriculation2)
        {
            if(strlen($immatriculation2) <= 8)
            {
                $this->immatriculation = $immatriculation2;
            }
        }

        public function __construct($m = NULL, $c = NULL, $i = NULL)
        {
            if (!is_null($m) && !is_null($c) && !is_null($i))
            {
                $this->marque = $m;
                $this->couleur = $c;
                $this->immatriculation = $i;
            }
        }

        public function afficher()
        {
            echo '<li> Voiture ' . $this->immatriculation . ' de marque ' . $this->marque . ' (couleur ' . $this->couleur . ') </li>';
        }

        public static function getAllVoitures()
        {
            try
            {
                $rep = Model::$pdo->query("SELECT * FROM voiture");
                $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
                return $rep->fetchAll();
            } catch(PDOException $e) {
                if (Conf::getDebug()) 
                {
                    echo $e->getMessage(); // affiche un message d'erreur
                } 
                else
                {
                    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
                }
                die();
            }
        }

        public static function getVoitureByImmat($immat)
        {
            try
            {
                $sql = "SELECT * from voiture WHERE immatriculation=:immat";
                $req_prep = Model::$pdo->prepare($sql);

                $values = array("immat" => $immat,);
                $req_prep->execute($values);

                $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
                $tab_voit = $req_prep->fetchAll();
            } catch(PDOException $e) {
                if (Conf::getDebug()) 
                {
                    echo $e->getMessage(); // affiche un message d'erreur
                } 
                else
                {
                    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
                }
                die();
            }

            if (empty($tab_voit))
                return false;
            return $tab_voit[0];
        }


        public function save()
        {
            try
            {
                $sql = "INSERT INTO voiture (immatriculation, marque, couleur) VALUES (:immat, :marque, :couleur)";
                $req_prep = Model::$pdo->prepare($sql);

                $values = array('immat' => $this->immatriculation, 'marque' => $this->marque, 'couleur' => $this->couleur);
                $req_prep->execute($values);
            } catch(PDOException $e) {
                if (Conf::getDebug()) 
                {
                    echo $e->getMessage(); // affiche un message d'erreur
                } 
                else
                {
                    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
                }
                die();
            }
        }
    }
?>