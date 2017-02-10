<?php
namespace Noneslad\Tools;

use PDO;

/**
 * Description de tools
 *
 */
class WebTools {
     public static function upload ($term,$dest){
        $dest .= $_FILES[$term]['name'];
        move_uploaded_file($_FILES[$term]['tmp_name'], $dest);
        return $dest;
    }
   

    public static function fromRequest($term){
    if (isset($_GET[$term]) && !empty($_GET[$term]))
        {
            $ret = $_GET[$term];
        }
        else if (isset($_POST[$term]) && !empty($_POST[$term]))
        {
            $ret = $_POST[$term];
        }
        else
        {
             $ret = false;   
    }
    return $ret;


}
    public static function fromSession($term){
        if (isset($_SESSION[$term]) && !empty($_SESSION[$term]))
        {
            $ret = $_SESSION[$term];
        }
        else
        {
            $ret = false;
        }
        return $ret;


    }

    public static function forbidden() {
        header("HTTP/1.0 404 Not Found");
    }

    public static function fromForm($term){
        if (isset($_POST['donnees'][$term]) && !empty($_POST['donnees'][$term]))
        {
            $ret = $_POST['donnees'][$term];
        }
        else
        {
             $ret = false;   
        }
        return $ret;
    }

    public static function setInFlashBag($key,$value){
        $_SESSION[$key] = $value;
    }
    public static function getInFlashBag($key){
        $retour = false;
        if(isset($_SESSION[$key])){
            $retour = $_SESSION[$key];
            unset($_SESSION[$key]);
        }
        return $retour;
    }


    /* Leur faire deviner la fonction redirect */
    public static function redirect($route) {

        header("location: ".$route."");

    }
}

