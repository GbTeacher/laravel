<?php

namespace App\Http\Controllers;

use DB;

class CategoryController extends Controller
{
    public function all()
    {
        $categories = DB::select('SELECT * FROM categories');

        return view('category', [
            'categories' => $categories,
        ]);
    }
}
