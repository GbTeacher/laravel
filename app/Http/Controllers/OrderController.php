<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $requestData = $request->except(['_token']);

        $fileData = [];
        if (Storage::exists('order.json')) {
            $fileData = json_decode(Storage::get('order.json'), true);
        }
        $fileData[] = $requestData;

        Storage::put('order.json', json_encode($fileData));

        return Response::view('order.index', ['status' => true]);
    }
}
