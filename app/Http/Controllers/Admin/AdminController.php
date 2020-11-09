<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::view('admin.index');
    }
}
