<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParserRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Http\RedirectResponse;
use Response;
use XmlParser;

class AdminParserController extends Controller
{

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::view('admin.parser.index', [
            'sources' => Source::all(),
        ]);
    }

    /**
     * @param ParserRequest $request
     * @return RedirectResponse
     */
    public function parse(ParserRequest $request)
    {
        $sources = Source::query()
            ->whereIn('id', $request->input('sources'))
            ->get();

        $categories = array_column(Category::query()->select('id')->get()->toArray(), 'id');

        foreach ($sources as $source) {
            $xmlData = XmlParser::load($source->link);

            $parsedData = $xmlData->parse([
                'title'       => ['uses' => 'channel.title'],
                'link'        => ['uses' => 'channel.link'],
                'description' => ['uses' => 'channel.description'],
                'image'       => ['uses' => 'channel.image.url'],
                'news'        => ['uses' => 'channel.item[title,link,guid,description,pubDate]'],
            ]);

            $newsInSystem = News::query()
                ->whereIn('source_guid', array_column($parsedData['news'], 'guid'))
                ->where('source_id', $source->id)
                ->get()
                ->keyBy('source_guid')
                ->toArray();

            $forInsert = [];

            foreach ($parsedData['news'] as $news) {
                if (!array_key_exists($news['guid'], $newsInSystem)) {
                    $forInsert[] = [
                        'title'       => $news['title'],
                        'short_text'  => $news['description'],
                        'full_text'   => $news['description'],
                        'category_id' => $categories[array_rand($categories)],
                        'source_guid' => $news['guid'],
                        'source_id'   => $source->id,
                        'link'        => $news['link'],
                    ];
                }
            }

            News::query()->insert($forInsert);
        }

        return redirect()->route('parser')->with('success', 'Парсинг прошел успешно');
    }
}
