<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @param string $categoryId
     * @return string
     */
    public function allByCategory(string $categoryId)
    {
//        $category = \DB::table('categories')->find($categoryId);
//
//        if (!$category) {
//            return redirect('category');
//        }
//
//        $news = \DB::table('news')->where('category_id', $category->id)->get();

        $news = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->where('category_id', $categoryId)
            ->get([
                'news.*',
                'categories.name AS category_name',
            ]);

        return view('category_news', compact('news'));
    }

    /**
     * @param Request $request
     * @param string $id
     * @return string
     */
    public function one(string $id)
    {
        if (empty($this->news[$id])) {
            return redirect('category');
        }

        $news = $this->news[$id];

        return view('news', compact('news'));
    }
}
