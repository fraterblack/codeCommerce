<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index(Category $categoryModel)
    {
        $categories = $categoryModel->all();

        return view('store.index', compact('categories'));
    }
}
