<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertNewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Response;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::view('admin.news.index', [
            'news'       => News::query()->paginate(5),
            'categories' => Category::all()->keyBy('id'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Response::view('admin.news.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpsertNewsRequest $request
     * @return \Illuminate\Http\Response | RedirectResponse
     */
    public function store(UpsertNewsRequest $request)
    {
        News::query()->create($request->except(['_token']));

        return redirect()->route('news.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response | RedirectResponse
     */
    public function edit(int $id)
    {
        $news = News::query()->findOrFail($id);
        return Response::view('admin.news.edit', [
            'news'       => $news,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpsertNewsRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response | RedirectResponse
     */
    public function update(UpsertNewsRequest $request, int $id)
    {
        $news = News::query()->findOrFail($id);
        $news->update($request->except(['_token']));
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        News::destroy($id);
        return Response::json([
            'status' => true,
        ]);
    }
}
