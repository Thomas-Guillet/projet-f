<?php

namespace App\Controllers\Admin;

class ThreadsController
{
    public function listThreads()
    {
        echo 'list threads';
    }

    public function edit()
    {
        dd($_GET);
        echo 'edit thread';
    }
}