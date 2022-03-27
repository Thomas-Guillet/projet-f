<?php 
require 'vendor/autoload.php';

use App\Controllers\ApiController;
use App\Controllers\AdminController;

/**
 * On créer une constante globale "URL" avec la fonction define qui permet d'avoir accès à l'url globale du site et de pouvoir utiliser des chemins absolus pour accèder aux ressources
 * chemin relatif = ../../fichier (chiant)
 * chemin absolu = http://site.com/emplacement/du/fichier (pratique)
 */
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

try{
    if(empty($_GET['page'])){
        throw new Exception("La page n'existe pas");
    } else {
        $adminController = new AdminController();

        $url = explode("/",filter_var($_GET['page'],FILTER_SANITIZE_URL));
        if(empty($url[0])) throw new Exception ("La page n'existe pas");
        switch($url[0]){
            case "admin" : 
                switch($url[1]){
                    case "login" : $adminController->getPageLogin();
                    break;
                    default : throw new Exception ("La page n'existe pas");
                }
            break;
            default : 
            switch($url[0]){
                case "truc": echo "page truc";
                break;
                default : throw new Exception ("La page n'existe pas");
            }
            break;
        }
    }
} catch (Exception $e){
    $msg = $e->getMessage();
    echo $msg;
}

/**
 * On est dans un fichier PHP (qui commence du coup avec la balise <?php) bien que la logique voudrait que l'on ferme un fichier PHP avec la balise ?>
 *  une pratique générale veut qu'on utilise cette fermeture seulement dans des fichiers destinés à contenir autre chose que du PHP.
 *  Ce fichier est destiné à contenir seulement du PHP, donc on ne ferme pas la balise.
 */