<?php

class CatalogController{

    public function category($params){

        $categoryId = $params['categoryId'];

        $this->show('category', [
            'categoryId' => $categoryId
        ]);
    }


    private function show($viewName, $viewData = []){

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . "/../views/{$viewName}.tpl.php";
        require_once __DIR__ . '/../views/footer.tpl.php';

    }
}
