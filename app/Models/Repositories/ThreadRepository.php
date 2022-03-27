<?php
namespace App\Models\Repositories;

use App\Utils\Database;
use App\Models\Entities\Thread;

class ThreadRepository extends Database {

    public function test(){
        $query = "SELECT * FROM thread";
        $stmt = $this->prepare($query);
        $stmt->execute();

        $thread = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $thread;
    }

    
    public function listThreads()
    {
        $query = $this->query('SELECT * FROM `thread`');

        return $this->sendJson($query->fetchAll($this::FETCH_CLASS, Thread::class));
    }
}