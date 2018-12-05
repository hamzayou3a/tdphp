<?php
    class Utilistateur
    {
        private $login;
        private $nom;
        private $prenom;

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
            $this->login = $array['login'];
            $this->nom = $array['nom'];
            $this->prenom = $array['prenom'];
        }

    }