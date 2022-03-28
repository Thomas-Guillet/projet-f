<?php
namespace App\Utils;

use App\Controllers\ApiController;
use App\Controllers\AdminController;

final class Router
{    
    public static function renderPage($data) {

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
    }
}