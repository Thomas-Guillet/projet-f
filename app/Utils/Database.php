<?php

namespace App\Utils;

use PDO;

/**
 * Indiquer qu'une class est abstract permet de dire que cette class ne doit pas être instanciée d'elle même (on ne va pas faire new Database->function()) dans un Controller
 * Il faut voir cette class comme une boite à outil que l'on va mettre à disposition d'une autre class
 * Tout nos fichier Repository vont "étendre" cette class Database
 * C'est à dire que dès qu'on va faire appel à ces Repository, la class Database va s'instancier directement et nous permettre d'établir une connexion à la bdd automatique
 *
 * Il faut voir ça comme des class parent/enfant. Un Repository est un enfant de Database car il ne peut pas fonctionner sans les fonctions de Database, sa class "parent"
 * Dans notre cas présent, Database est parent des Repository mais enfant de PDO (car extends PDO) qui est un outil de communication à la BDD (que j'ai installé avec composer)
 *
 * Quand un Repository est appelé ça va au final instancier la class PDO puis Database puis le Repo
 * Théoriquement on aurait pu vouloir faire PDO puis direct notre Repository sauf que PDO est un bundle donc on ne peut pas modifier ses fichiers
 * Et on a besoin d'indiquer les paramètres de connexion à notre BDD, notre class Database nous sert donc à surcharger la class PDO pour qu'on puisse indiquer nos paramètres de connexion
 * Dans notre fonction __construct on fait appel à la fonction construct de PDO (qui est appelé parent dans parent::__construct() et on injecte nos paramètres
 */
abstract class Database extends PDO
{
    public function __construct()
    {
        parent::__construct("mysql:host=127.0.0.1:3306;dbname=db_project_f", "root", "");
        PDO::setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        PDO::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function sendJson($data)
    {
        /**
         * Access-Control-Allow-Origin permet d'indiquer qui ont autorise à utiliser l'API
         * Une étoile si on veut faire en sorte que n'importe quel site ou app puisse appeler notre Api
         * Sinon on indique à la place de l'étoile l'url l'adresse du site autorisé
         */
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");

        echo json_encode($data);
    }
}