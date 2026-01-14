<?php

namespace Communitytable\Foodbank\Core;

use mysqli;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller
{
    protected Environment $twig;
    protected mysqli $db;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views');
        $this->twig = new Environment($loader, [
            'cache' => __DIR__ . '/../../storage/twig',
            'debug' => true,
        ]);

        $this->twig->addGlobal('session', $_SESSION);
        $this->db = db_connect();
    }

    protected function render(string $view, array $data = []): void
    {
        echo $this->twig->render("$view.twig", $data);
    }
}
