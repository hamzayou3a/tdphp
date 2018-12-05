<?php
    class Trajet
    {
        private $id;
        private $depart;
        private $arrivee;
        private $date;
        private $nbplaces;
        private $prix;
        private $conducteur_login;


        public function get($nom_attribut)
        {
            return $this->$nom_attribut;
        }

        public function set($nom_attribut, $valeur)
        {
            $this->$nom_attribut = $valeur;
        }

        public function __construct($array)
        {
            if(!is_null($array))
            {
                $this->id = $array['id'];
                $this->depart = $array['depart'];
                $this->arrivee = $array['arrivee'];
                $this->date = $array['date'];
                $this->nbplaces = $array['nbplaces'];
                $this->prix = $array['prix'];
                $this->conducteur_login = $array['conducteur_login'];
            }
        }

        public static function getAllTrajets()
        {
            $rep = Model::$pdo->query("SELECT * FROM trajet");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Trajet');
            return $rep->fetchAll();
        }
    }