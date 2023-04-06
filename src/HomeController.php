<?php

namespace Bolao\Classe\HomeController;

use Bolao\Classe\Controller\Controller;

class HomeController
{
    public function index() {
        Controller::views('index');
    }
}