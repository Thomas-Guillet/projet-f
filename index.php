<?php
require 'vendor/autoload.php';

use App\Utils\Router;

$router = new Router();
$router::renderPage((array_key_exists('page', $_GET)) ? $_GET['page'] : null);

/**
 * On est dans un fichier PHP (qui commence du coup avec la balise <?php) bien que la logique voudrait que l'on ferme un fichier PHP avec la balise ?>
 *  une pratique générale veut qu'on utilise cette fermeture seulement dans des fichiers destinés à contenir autre chose que du PHP.
 *  Ce fichier est destiné à contenir seulement du PHP, donc on ne ferme pas la balise.
 */