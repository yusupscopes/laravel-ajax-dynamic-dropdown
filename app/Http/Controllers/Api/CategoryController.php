<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function categories()
    {
        return Category::orderBy('name', 'ASC')->get(['id', 'name']);
    }

    public function subcategories(Category $category)
    {
        return $category->subcategories()->orderBy('name', 'ASC')->get(['id', 'name']);
    }
}
