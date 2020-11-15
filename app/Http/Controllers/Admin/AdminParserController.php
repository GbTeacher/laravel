<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use XmlParser;

class AdminParserController extends Controller
{
    public const RSS = 'https://news.yandex.ru/army.rss';

    public function index()
    {
        $xmlData = XmlParser::load(self::RSS);

        $parsedData = $xmlData->parse([
            'title'       => ['uses' => 'channel.title'],
            'link'        => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image'       => ['uses' => 'channel.image.url'],
            'news'        => ['uses' => 'channel.item[title,link,guid,description,pubDate]'],
        ]);

        dd($parsedData);
    }
}
