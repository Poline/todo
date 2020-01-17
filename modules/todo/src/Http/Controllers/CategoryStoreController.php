<?php

namespace Todo\Todo\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Todo\Todo\Model\Category;
use Webpatser\Uuid\Uuid;

class CategoryStoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'name' => sprintf('required|min:1|max:255|unique:%s', (new Category())->getTable())
        ]);

        $categoryName = $request->get('name');

        Category::create([Category::NAME_COLUMN => $categoryName, Category::ID_COLUMN => Uuid::generate()->string]);

        return response(Category::get());
    }
}
