<?php
namespace App\Controllers;

class AdminController{
    public function __construct()
    {
        
    }

    public function getPageLogin(){
        require_once "app/Views/login.view.php";
    }
}