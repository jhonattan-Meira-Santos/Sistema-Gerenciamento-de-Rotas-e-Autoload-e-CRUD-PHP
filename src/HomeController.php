<?php

namespace Bolao\Classe;

use Bolao\Classe\Controller;

class HomeController
{
    public function index() {
        Controller::views('index');
    }
}