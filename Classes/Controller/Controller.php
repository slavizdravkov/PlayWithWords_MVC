<?php

namespace Controller;


class Controller
{
    private $twig;
    private $templatesPath;

    public function __construct()
    {
        $this->templatesPath = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..') . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR . 'Templates';
        $loader = new \Twig_Loader_Filesystem(TEMPLATES_PATH);
        $this->twig = new \Twig_Environment($loader, [
            'cashe' => 'var/cashe/twig',
        ]);
    }

    protected function render($template, $parameters = [])
    {
        echo $this->twig->render($template, $parameters);
    }
}