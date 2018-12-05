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

        public function __construct($m, $c, $i)
        {
            $this->marque = $m;
            $this->couleur = $c;
            $this->immatriculation = $i;
        }

        public function afficher()
        {
            echo '<li> Voiture ' . $this->immatriculation . ' de marque ' . $this->marque . ' (couleur ' . $this->couleur . ') </li>';
        }
    }
?>