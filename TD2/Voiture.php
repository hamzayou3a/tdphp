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
            $rep = Model::$pdo->query("SELECT * FROM voiture");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
            return $rep->fetchAll();
        }
    }
?>