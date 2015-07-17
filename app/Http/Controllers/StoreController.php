<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;

class StoreController extends Controller
{
    protected $productModel;
    protected $categoryModel;
    protected $tagModel;

    public function __construct(Category $categoryModel, Product $productModel, Tag $tagModel) {
        $this->productModel = $productModel;
        $this->categoryModel = $categoryModel;
        $this->tagModel = $tagModel;
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
        $category = $this->categoryModel->find($id);

        $products = $this->productModel->ofCategory($id)->get();

        return view('store.category', compact('categories', 'products', 'category'));
    }

    public function tag($id)
    {
        $categories = $this->categoryModel->all();
        $tag = $this->tagModel->find($id);

        $products = $this->tagModel->find($id)->products;

        return view('store.tag', compact('categories', 'products', 'tag'));
    }

    public function product($id)
    {
        $categories = $this->categoryModel->all();

        $product = $this->productModel->find($id);

        return view('store.product', compact('categories', 'product'));
    }
}
