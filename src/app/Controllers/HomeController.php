<?php

namespace App\Controllers;

use App\View;
use App\App;

class HomeController {
    public function index(): View {
        $db = App::db();

        $query = $db->query("SELECT * FROM users");

        $users = $query->fetchAll();

        return View::make('index', $users);
    }
}