<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use Storage;

class FeedbackController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        return Response::view('feedback.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): \Illuminate\Http\Response
    {
        $requestData = $request->except(['_token']);

        $fileData = [];
        if (Storage::exists('feedback.json')) {
            $fileData = json_decode(Storage::get('feedback.json'), true);
        }
        $fileData[] = $requestData;

        Storage::put('feedback.json', json_encode($fileData));

        return Response::view('feedback.index', ['status' => true]);
    }
}
