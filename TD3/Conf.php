<?php
    class Conf 
    {
        static private $debug = True;

        static private $databases = array('hostname' => 'webinfo', 
                                              'database' => 'bouzidh', 
                                              'login' => 'bouzidh',
                                              'password' => '1110034049Z');
             
        static public function getLogin() 
        {
            return self::$databases['login'];
        }

        static public function getHostname() 
        {
            return self::$databases['hostname'];
        }

        static public function getDatabase() 
        {
            return self::$databases['database'];
        }
         
        static public function getPassword() 
        {
            return self::$databases['password'];
        }  

        static public function getDebug() 
        {
            return self::$debug;
        }
    }
?>

