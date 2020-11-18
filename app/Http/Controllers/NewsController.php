<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @param string $categoryId
     * @return string
     */
    public function allByCategory(string $categoryId)
    {
        $news = News::query()
            ->where('category_id', $categoryId)
            ->get();

        $category = Category::query()->findOrFail($categoryId)->first();

        return view('category_news', compact('news', 'category'));
    }

    /**
     * @param Request $request
     * @param string $id
     * @return string
     */
    public function one(string $id)
    {

        $news = News::query()->findOrFail($id);

        return view('news', compact('news'));
    }
}
