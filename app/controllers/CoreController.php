<?php

class CoreController{

    protected function show($viewName, $viewData = []){

        $footerBrand = new Brand();
        $viewData['footerBrandList'] = $footerBrand->findAllForFooter();

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . "/../views/{$viewName}.tpl.php";
        require_once __DIR__ . '/../views/footer.tpl.php';

    }

}