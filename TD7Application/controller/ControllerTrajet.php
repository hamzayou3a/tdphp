<?php
    require_once (File::build_path(array("model", "ModelTrajet.php")));

    class ControllerTrajet
    {
        protected static $object = "trajet";

        public static function readAll()
        {
            $tab_v = ModelTrajet::selectAll();

            $view='list';
            $pagetitle='Liste des trajets';
            require (File::build_path(array("view", "view.php")));
        }

        public static function read()
        {
            $v = ModelTrajet::select($_GET['id']);

            if(!$v)
            {
                $pagetitle='Erreur';
                $view='error';
            }
            else
            {
                $pagetitle='Détail d\'une trajet';
                $view='detail';
            }

            require (File::build_path(array("view", "view.php")));
        }

        public static function deleted()
        {
            if(isset($_GET['id']))
            {
                ModelTrajet::delete($_GET['id']);

                $tab_v = ModelTrajet::selectAll();

                $view='deleted';
                $pagetitle='Supression d\'une trajet';
                require (File::build_path(array("view", "view.php")));
            }
            else
            {
                self::readAll();
            }
        }

        public static function create()
        {
            $v = new ModelTrajet(array('', '', '','', '', '', ''));
            $modifier = "required";
            $target_action = "created";

            $view='update';
            $pagetitle='Création d\'un trajet';

            require (File::build_path(array("view", "view.php")));
        }

        public static function created()
        {
            ModelTrajet::save(array("id" => $_POST['id'], "depart" => $_POST['depart'], "arrivee" => $_POST['arrivee'], "date" => $_POST['date'], "nbplaces" => $_POST['nbplaces'], "prix" => $_POST['prix'], "conducteur_login" => $_POST['conducteur_login']));
            
            $tab_v = ModelTrajet::selectAll();

            $view='created';
            $pagetitle='Création d\'un trajet';
            require (File::build_path(array("view", "view.php")));
        }

        public static function update()
        {
            $v = ModelTrajet::select($_GET['id']);
            $modifier = "readonly";
            $target_action = "updated";

            if(!$v)
            {
                $pagetitle='Erreur';
                $view='error';
            }
            else
            {
                $pagetitle='Mise à jour d\'un trajet';
                $view='update';
            }

            require (File::build_path(array("view", "view.php")));
        }

        public static function updated()
        {
            ModelTrajet::update(array("id" => $_POST['id'], "depart" => $_POST['depart'], "arrivee" => $_POST['arrivee'], "date" => $_POST['date'], "nbplaces" => $_POST['nbplaces'], "prix" => $_POST['prix'], "conducteur_login" => $_POST['conducteur_login']));

            $tab_v = ModelTrajet::selectAll();
            $view='updated';
            $pagetitle='Mise à jour d\'un trajet';
            require (File::build_path(array("view", "view.php")));        
        }
    }
?>
    