<?php
    require_once (File::build_path(array("model", "ModelUtilisateur.php")));
    require_once (File::build_path(array("lib", "Security.php")));

    class ControllerUtilisateur
    {
        protected static $object = "utilisateur";

        public static function readAll()
        {
            $tab_v = ModelUtilisateur::selectAll();

            $view='list';
            $pagetitle='Liste des utilisateurs';
            require (File::build_path(array("view", "view.php")));
        }

        public static function read()
        {
            $v = ModelUtilisateur::select($_GET['login']);

            if(!$v)
            {
                $pagetitle='Erreur';
                $view='error';
            }
            else
            {
                $pagetitle='Détail d\'une utilisateur';
                $view='detail';
            }

            require (File::build_path(array("view", "view.php")));
        }

        public static function deleted()
        {
            if(isset($_GET['login']))
            {
                ModelUtilisateur::delete($_GET['login']);

                $tab_v = ModelUtilisateur::selectAll();

                $view='deleted';
                $pagetitle='Supression d\'une utilisateur';
                require (File::build_path(array("view", "view.php")));
            }
            else
            {
                self::readAll();
            }
        }

        public static function create()
        {
            $v = new ModelUtilisateur(array('', '', ''));
            $modifier = "required";
            $target_action = "created";

            $view='update';
            $pagetitle='Création d\'un utilisateur';

            require (File::build_path(array("view", "view.php")));
        }

        public static function created()
        {
            if($_POST['mdp'] == $_POST['mdpConfirm'])
            {
                ModelUtilisateur::save(array("login" => $_POST['login'], "nom" => $_POST['nom'], "prenom" => $_POST['prenom'], "mdp" => Security::chiffrer($_POST['mdp'])));
                
                $tab_v = ModelUtilisateur::selectAll();

                $view='created';
                $pagetitle='Création d\'un utilisateur';
                require (File::build_path(array("view", "view.php")));
            }
            else
            {
                self::create();
            }
        }

        public static function update()
        {
            $v = ModelUtilisateur::select($_GET['login']);
            $modifier = "readonly";
            $target_action = "updated";

            if(!$v)
            {
                $pagetitle='Erreur';
                $view='error';
            }
            else
            {
                $pagetitle='Mise à jour d\'un utilisateur';
                $view='update';
            }

            require (File::build_path(array("view", "view.php")));
        }

        public static function updated()
        {
            if($_POST['mdp'] == $_POST['mdpConfirm'])
            {
                ModelUtilisateur::update(array("login" => $_POST['login'], "nom" => $_POST['nom'], "prenom" => $_POST['prenom'], "mdp" => Security::chiffrer($_POST['mdp'])));
                
                $tab_v = ModelUtilisateur::selectAll();
                $view='updated';
                $pagetitle='Mise à jour d\'un utilisateur';
                require (File::build_path(array("view", "view.php")));
            }
            else
            {
                self::update();
            }       
        }
    }
?>
