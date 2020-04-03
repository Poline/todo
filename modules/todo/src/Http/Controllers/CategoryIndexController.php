<?php

namespace Todo\Todo\Http\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Todo\Todo\Http\Resources\CategoryCollectionResource;
use Todo\Todo\Model\Category;

class CategoryIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $categories = Category::get();

        $categoriesResource = CategoryCollectionResource::make($categories);

        return $categoriesResource;
    }
}
