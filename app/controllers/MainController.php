<?php

class MainController extends CoreController{

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
    
}
