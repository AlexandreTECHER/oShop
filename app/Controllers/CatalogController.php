<?php

namespace Oshop\Controllers;

use Oshop\Models\Brand;
use Oshop\Models\Category;
use Oshop\Models\Product;

class CatalogController extends CoreController{

    public function category($params){

        $categoryId = $params['categoryId'];

        $product = new Product();
        $productsToLoad = $product->findAllByCategory($categoryId);

        $category = new Category();
        $categoryToDisplay = $category->find($categoryId);


        $this->show('category', [
            'products' => $productsToLoad,
            'category' => $categoryToDisplay
        ]);
    }

    public function type($params){

        $typeId = $params['typeId'];

        $this->show('type', [
            'typeId' => $typeId
        ]);
    }

    public function product($params){

        $productId = $params['productId'];

        $product = new Product;
        $productToDisplay = $product->find($productId);

        $categoryModel = new Category;
        $category = $categoryModel->find($productToDisplay->getCategoryId());

        $this->show('product', [
            'category' => $category,
            'product' => $productToDisplay
        ]);
    }

    public function brand($params){

        $brandId = $params['brandId'];

        $products = new Brand();
        $productsToDisplay = $products->findAllByBrand($brandId);

        $this->show('brand', [
            'brandId' => $brandId,
            'productsByBrand' => $productsToDisplay
        ]);
    }
}
