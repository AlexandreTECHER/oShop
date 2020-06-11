<?php

namespace Oshop\Controllers;

use Oshop\Models\Brand;
use Oshop\Models\Type;

class CoreController{

    protected function show($viewName, $viewData = []){
        
        global $router;

        $footerBrand = new Brand;
        $viewData['footerBrandList'] = $footerBrand->findAllForFooter();

        $footerType = new Type;
        $viewData['footerTypeList'] = $footerType->findAllForFooter();


        require_once __DIR__ . '/../Views/header.tpl.php';
        require_once __DIR__ . "/../Views/{$viewName}.tpl.php";
        require_once __DIR__ . '/../Views/footer.tpl.php';

    }

}