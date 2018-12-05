<?php
    require_once (File::build_path(array("model", "ModelVoiture.php")));

    class ControllerVoiture
     {
        protected static $object = "voiture";

        public static function readAll()
        {
            $tab_v = ModelVoiture::selectAll();

            $view='list';
            $pagetitle='Liste des voitures';
            require (File::build_path(array("view", "view.php")));
        }

        public static function read()
        {
            $v = ModelVoiture::select($_GET['immat']);

            if(!$v)
            {
                $pagetitle='Erreur';
                $view='error';
            }
            else
            {
                $pagetitle='Détail d\'une voiture';
                $view='detail';
            }

            require (File::build_path(array("view", "view.php")));
        }

        public static function create()
        {
            $v = new ModelVoiture('', '', '');
            $modifier = "required";
            $target_action = "created";

            $view='update';
            $pagetitle='Création d\'une voiture';

            require (File::build_path(array("view", "view.php")));
        }

        public static function created()
        {
            ModelVoiture::save(array("immatriculation" => $_POST['immatriculation'], "marque" => $_POST['marque'], "couleur" => $_POST['couleur']));
            
            $tab_v = ModelVoiture::selectAll();

            $view='created';
            $pagetitle='Création d\'une voiture';
            require (File::build_path(array("view", "view.php")));
        }

        public static function deleted()
        {
            if(isset($_GET['immat']))
            {
                ModelVoiture::deleteVoitureByImmat($_GET['immat']);

                $tab_v = ModelVoiture::selectAll();

                $controller='voiture';
                $view='deleted';
                $pagetitle='Supression d\'une voiture';
                require (File::build_path(array("view", "view.php")));
            }
            else
            {
                self::readAll();
            }
        }

        public static function update()
        {
            $v = ModelVoiture::select($_GET['immat']);
            $modifier = "readonly";
            $target_action = "updated";

            if(!$v)
            {
                $pagetitle='Erreur';
                $view='error';
            }
            else
            {
                $pagetitle='Mise à jour d\'une voiture';
                $view='update';
            }

            require (File::build_path(array("view", "view.php")));
        }

        public static function updated()
        {
            ModelVoiture::update(array("immatriculation" => $_POST['immatriculation'], "marque" => $_POST['marque'], "couleur" => $_POST['couleur']));

            $tab_v = ModelVoiture::selectAll();
            $view='updated';
            $pagetitle='Mise à jour d\'une voiture';
            require (File::build_path(array("view", "view.php")));        
        }
    }
?>
