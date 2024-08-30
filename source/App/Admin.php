<?php

namespace Source\App;

use League\Plates\Engine;

class Admin
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/adm","php");
    }

    public function home ()
    {
        echo $this->view->render("home",[]);
    }

    public function profile ()
    {
        echo $this->view->render("profile",[]);
    }

    public function payment ()
    {
        echo $this->view->render("payment",[]);
    }

    public function client ()
    {
        echo $this->view->render("client",[]);
    }

    public function tasks ()
    {
        echo $this->view->render("tasks",[]);
    }

    public function settings ()
    {
        echo $this->view->render("settings",[]);
    }

    //public function products () {
    //    echo $this->view->render("products",[]);
    //}

}