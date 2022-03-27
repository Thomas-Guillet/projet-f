Le système de Namespace permet de rendre l'appel de fichier bien plus pratique et simple à lire

Si j'ai besoin d'utiliser une fonction de ma class Test, le PHP "from scratch" va me demander d'appeler la classe :
`
require_once "emplacement/du/fichier/"
(ex. require_once "../../controllers/api/testController")

Les namespace permettent de modifier ça pour que le rendu soit

use App/Controllers/Api/testController;

Pour permettre de faire ça il faut ajouter un namespace au début de chaque fichier de classe pour bien clarifier son emplacement

namespace App\Controller\Api;

C'est bien plus lisible et ça empêche beaucoup d'erreur sur les emplacements de class