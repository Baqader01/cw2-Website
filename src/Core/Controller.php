<?php

namespace Communitytable\Foodbank\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller
{
    protected Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views');
        $this->twig = new Environment($loader, [
            'cache' => false,
            'debug' => true,
        ]);

        $this->twig->addGlobal('session', $_SESSION);
    }

    protected function render(string $view, array $data = []): void
    {
        echo $this->twig->render("$view.twig", $data);
    }
}
