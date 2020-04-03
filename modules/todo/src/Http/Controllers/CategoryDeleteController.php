<?php

namespace Todo\Todo\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Todo\Todo\Model\Category;

class CategoryDeleteController extends Controller
{
    public function __invoke(Request $request, $categoryId)
    {
        $request->merge(['categoryId' => $categoryId]);

        $this->validate($request, [
            'categoryId' => sprintf('required')
        ]);

        /**@var Category $deletedItem */
        $deletedItem = Category::query()->where(Category::ID_COLUMN, $categoryId)->get()->first();

        $deletedItem->delete();

        return response(Category::get());
    }
}
