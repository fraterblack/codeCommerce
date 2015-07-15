<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;

class StoreController extends Controller
{
    protected $productModel;
    protected $categoryModel;

    public function __construct(Category $categoryModel, Product $productModel) {
        $this->productModel = $productModel;
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        $categories = $this->categoryModel->all();

        $pFeatured = $this->productModel->featured()->get();

        $pRecommend = $this->productModel->recommend()->get();

        return view('store.index', compact('categories', 'pFeatured', 'pRecommend'));
    }

    public function category($id)
    {
        $categories = $this->categoryModel->all();

        $pCategory = $this->categoryModel->find($id)->products;

        return view('store.list', compact('categories', 'pCategory'));
    }
}
