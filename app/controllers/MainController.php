<?php

class MainController{

    public function homepage(){
        $this->show('home');
    }

    public function legalMentions(){
        $this->show('legal');
    }

    public function error(){
        http_response_code(404);
        echo 'erreur';
        exit();
    }

    private function show($viewName, $viewData = []){

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . "/../views/{$viewName}.tpl.php";
        require_once __DIR__ . '/../views/footer.tpl.php';

    }
}
