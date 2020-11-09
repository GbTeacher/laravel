<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

use Response;

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
        Feedback::query()->create($request->except('_token'));

        return Response::view('feedback.index', ['status' => true]);
    }
}
