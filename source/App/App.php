<?php

namespace Source\App;

use League\Plates\Engine;

class App
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/app","php");
    }

    public function home ()
    {
        echo $this->view->render("home",[]);
    }

    public function profile ()
    {
        echo $this->view->render("profile",[]);
    }

    public function articles ()
    {
        echo $this->view->render("articles",[]);
    }

    public function sponsors ()
    {
        echo $this->view->render("sponsors",[]);
    }

    public function market ()
    {
        echo $this->view->render("market",[]);
    }
}