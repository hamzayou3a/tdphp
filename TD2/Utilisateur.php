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

        public function __construct($array = null)
        {
            if(!is_null($array))
            {
                $this->login = $array['login'];
                $this->nom = $array['nom'];
                $this->prenom = $array['prenom'];
            }
        }

        public static function getAllUtilisateurs()
        {
            $rep = Model::$pdo->query("SELECT * FROM utilisateur");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
            return $rep->fetchAll();
        }
    }