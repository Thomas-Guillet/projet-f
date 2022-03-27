<?php
namespace App\Models\Repositories\Api;

use App\Utils\Database;
use App\Models\Entities\Thread;

class ThreadApiRepository extends Database {
   
    public function listThreads()
    {
        $query = $this->query('SELECT * FROM `thread`');

        return $this->sendJson($query->fetchAll($this::FETCH_ASSOC));
    }
}