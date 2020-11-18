<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources = [
            'Яндекс Авто'           => 'https://news.yandex.ru/auto.rss',
            'Яндекс АвтоСпорт'      => 'https://news.yandex.ru/auto_racing.rss',
            'Яндекс Армия'          => 'https://news.yandex.ru/army.rss',
            'Яндекс Гаджеты'        => 'https://news.yandex.ru/gadgets.rss',
            'Яндекс Главное'        => 'https://news.yandex.ru/index.rss',
            'Яндекс Единоборства'   => 'https://news.yandex.ru/martial_arts.rss',
            'Яндекс ЖКХ'            => 'https://news.yandex.ru/communal.rss',
            'Яндекс Здоровье'       => 'https://news.yandex.ru/health.rss',
            'Яндекс Игры'           => 'https://news.yandex.ru/games.rss',
            'Яндекс Интернет'       => 'https://news.yandex.ru/internet.rss',
            'Яндекс Киберспорт'     => 'https://news.yandex.ru/cyber_sport.rss',
            'Яндекс Кино'           => 'https://news.yandex.ru/movies.rss',
            'Яндекс Космос'         => 'https://news.yandex.ru/cosmos.rss',
            'Яндекс Культура'       => 'https://news.yandex.ru/culture.rss',
            'Яндекс Лига чемпионов' => 'https://news.yandex.ru/championsleague.rss',
            'Яндекс Музыка'         => 'https://news.yandex.ru/music.rss',
            'Яндекс НХЛ'            => 'https://news.yandex.ru/nhl.rss',
        ];

        foreach ($sources as $sourceName => $sourceLink) {
            \DB::table('sources')->insert([
                'title' => $sourceName,
                'link'  => $sourceLink,
            ]);
        }
    }
}
