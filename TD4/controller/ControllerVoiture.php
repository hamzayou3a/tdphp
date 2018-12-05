<?php
    require_once ('../model/ModelVoiture.php');

    class ControllerVoiture
     {
        public static function readAll()
        {
            $tab_v = ModelVoiture::getAllVoitures();
            require ('../view/voiture/list.php');
        }

        public static function read()
        {
            $v = ModelVoiture::getVoitureByImmat($_GET['immat']);

            if(!$v)
            {
                require ('../view/voiture/error.php');
            }
            else
            {
                require ('../view/voiture/detail.php');
            }
        }

        public static function create()
        {
            require ('../view/voiture/create.php');
        }

        public static function created()
        {
            $v = new ModelVoiture($_POST['marque'], $_POST['couleur'], $_POST['immatriculation']);
            $v->save();
            self::readAll();
        }
    }
?>
