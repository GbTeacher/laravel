<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use InvalidArgumentException;

class NewsController extends Controller
{
    private array $news = [
        '1' => [
            'id'    => 1,
            'title' => 'Новости в Москве',
            'text'  => 'Свежие новости в Москве',
        ],
        '2' => [
            'id'    => 2,
            'title' => 'Новости в Воронеже',
            'text'  => 'Свежие новости в Воронеже',
        ],
        '3' => [
            'id'    => 3,
            'title' => 'Новости в Калининграде',
            'text'  => 'Свежие новости в Калининграде',
        ],
        '4' => [
            'id'    => 4,
            'title' => 'Новости в Сыктывкаре',
            'text'  => 'Свежие новости в Сыктывкаре',
        ],
    ];

    /**
     * @param Request $request
     * @return string
     */
    public function all(Request $request): string
    {
        $html = "<h1>Новости</h1>";
        foreach ($this->news as $oneNews) {
            $link = route('news.id', ['id' => $oneNews['id']]);

            $html .= <<<HTML
                <h2><a href="{$link}" target="_blank">{$oneNews['title']} / {$oneNews['id']}</a></h2>
                <div>{$oneNews['text']}</div>
            HTML;
        }
        return $html;
    }

    /**
     * @param Request $request
     * @param string $id
     * @return string
     */
    public function one(Request $request, string $id): string
    {
        $oneNews = $this->getById($id);

        $allNewsLink = route('news');

        $html = <<<HTML
            <h1>{$oneNews['title']} / {$oneNews['id']}</h1>
            <div>{$oneNews['text']}</div>
            <a href="{$allNewsLink}">Обратно к новостям</a>
        HTML;

        return $html;
    }

    /**
     * @param string $id
     * @return array
     * @throws InvalidArgumentException
     */
    private function getById(string $id): array
    {
        if (empty($this->news[$id])) {
            throw new InvalidArgumentException('Invalid news ID', 404);
        }
        return $this->news[$id];
    }
}
