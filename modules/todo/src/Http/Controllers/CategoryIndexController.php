<?php

namespace Todo\Todo\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Todo\Todo\DTO\CategoryDTOAssembler;
use Todo\Todo\Http\Resources\CategoryCollectionResource;
use Todo\Todo\Model\Category;

class CategoryIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $categories = Category::get();

        $categoriesDTO = $categories->map(function ($category) {
            return CategoryDTOAssembler::fromEloquentModel($category);
        });

        $categoriesResource = CategoryCollectionResource::make($categoriesDTO);

        return $categoriesResource;
    }
}
