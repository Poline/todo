<?php

namespace Todo\Todo\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Todo\Todo\Model\Category;
use Webpatser\Uuid\Uuid;

class CategoryIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return response(Category::get());
    }
}
