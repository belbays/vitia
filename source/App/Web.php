<?php

namespace Source\App;

use League\Plates\Engine;
use Source\App\Api\Faqs;
use Source\Models\Faq\Question;

class Web
{
    private $view;

public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/web","php");
    }

    public function home ()
    {
        //echo "<h1>Eu sou a Home...</h1>";
        echo $this->view->render("home",[]);
    }

    public function aboutUs ()
    {
        //echo "<h1>Eu sou a Home...</h1>";
        echo $this->view->render("aboutUs",[]);
    }

    public function contactUs()
    {
        echo $this->view->render("contactUs",[]);
        //echo "<h1>Olá, eu sou o Contato...</h1>";
    }

    public function login ()
    {
        echo $this->view->render("login",[]);
    }
    public function register ()
    {
        echo $this->view->render("register",[]);
    }

    public function faqs(): void
    {
        $question = new Question();
        $questions = $question->selectAll();
        //var_dump($questions);
        echo $this->view->render("faqs",[
            "questions" => $questions
        ]);
    }

    public function error (array $data)
    {
        var_dump($data);
    }

}