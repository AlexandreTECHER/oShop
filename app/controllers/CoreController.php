<?php

class CoreController{

    protected function show($viewName, $viewData = []){
        
        global $router;

        $footerBrand = new Brand();
        $viewData['footerBrandList'] = $footerBrand->findAllForFooter();

        $footerType = new Type();
        $viewData['footerTypeList'] = $footerType->findAllForFooter();


        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . "/../views/{$viewName}.tpl.php";
        require_once __DIR__ . '/../views/footer.tpl.php';

    }

}