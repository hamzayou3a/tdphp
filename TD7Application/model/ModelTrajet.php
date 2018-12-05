<?php
    class ModelTrajet extends Model
    {
        protected static $object = "trajet";
        protected static $primary = 'id';

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

        public function __construct($array = NULL)
        {
            if(!is_null($array))
            {
                $this->id = $array[0];
                $this->depart = $array[1];
                $this->arrivee = $array[2];
                $this->date = $array[3];
                $this->nbplaces = $array[4];
                $this->prix = $array[5];
                $this->conducteur_login = $array[6];
            }
        }
    }