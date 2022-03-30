<?php

namespace App\Controllers\Api;

use App\Models\Repositories\Api\ThreadApiRepository;

class ApiController
{
    private $threadRepository;

    /**
     * Ces fonctions __construct sont appelées lors de l'instanciation de la class
     * On indique dans cette fonction toutes les class dont on aura besoin pour le bon fonctionnement de la class dans laquelle on se trouve
     * Et on les stock dans des variable $this->var pour les instancier également
     * $this étant le contexte de class dans lequel on se trouve, tu peux appeler une autre fonction se trouvant dans la même class en faisant $this->nomDeFunction()
     *
     */
    public function __construct()
    {
        $this->threadRepository = new ThreadApiRepository();
    }

    function test()
    {
        $threadRepository = new ThreadApiRepository();
        echo $threadRepository->listThreads();
        }
}