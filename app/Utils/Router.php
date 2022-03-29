<?php

namespace App\Utils;

use Exception;

final class Router
{
    const ROUTES = [
    ];
    const ROUTES_ADMIN = [
        '' => 'DashboardController::render',
        'login' => 'LoginController::render',
        'threads' => 'ThreadsController::list',
        'threads/?2' => 'ThreadsController::edit'
    ];

    public static function renderPage($url)
    {
        try {
            if ($url) {
                $url = explode("/", filter_var($url, FILTER_SANITIZE_URL));

                switch ($url[0]) {
                    //Si l'url commence par /admin/, on load la partie Back Office
                    //On termine par \\ car php traduit \\ dans les string par \ (demande a toma pk, c'est trop long a expliqué pourquoi mais la raison est simple)
                    case "admin" :
                        return call_user_func("App\Controllers\Admin\\".self::getAdminRoute($url));
                    //Sinon on load le front
                    default :
                        return call_user_func("App\Controllers\\".self::getRoute($url));
                }
            }

            //home
            throw new Exception("HOME");
        } catch (Exception $e) {
            //page 404 car plantage total
            $msg = $e->getMessage();
            echo $msg;
        }

        return new Exception ("404");
    }

    private static function getAdminRoute($url)
    {
        //On enlève le mot 'admin' de l'url car on en veut pas une fois arrivé ici
        unset($url[0]);
        //On part du principe qu'on ne trouvera pas de route correspondante, on passe ce paramètre à true si une route est trouvée
        $notFound = true;
        $urlLength = count($url);

        foreach (self::ROUTES_ADMIN as $route => $class) {
            //TODO On ajoutera la vérification de Login ici

            //On reconstruit l'url en remplaçant les paramètres ?chiffre par la partie de l'url correspondant pour prendre en compte les url dynamique
            for ($i = 1; $i <= $urlLength; $i++) {
                $route = str_replace("?".$i, $url[$i], $route);
            }

            //On compare l'url reconstruit avec l'url actuel et si il y a match, on sort de la boucle
            if (implode('/', $url) === $route) {
                $notFound = false;
                break;
            }
        }

        if ($notFound) {
            throw new Exception ("404");
        }

        return $class;
    }

    private static function getRoute($url)
    {
        $notFound = true;
        $urlLength = count($url);

        foreach (self::ROUTES_ADMIN as $route => $class) {
            for ($i = 0; $urlLength; $i++) {
                $route = str_replace("?".($i + 1), $url[$i], $route);
            }

            if (implode('/', $url) === $route) {
                $notFound = false;
                break;
            }
        }

        if ($notFound) {
            throw new Exception ("404");
        }

        return $class;
    }
}