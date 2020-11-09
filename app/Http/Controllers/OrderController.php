<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Response;

class OrderController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        return Response::view('order.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): \Illuminate\Http\Response
    {
        Order::query()->create($request->except('_token'));

        return Response::view('order.index', ['status' => true]);
    }
}
