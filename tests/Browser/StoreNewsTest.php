<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class StoreNewsTest extends DuskTestCase
{
    public string $photoUrl = 'https://images.unsplash.com/photo-1575320181282-9afab399332c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1080&q=80';

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('admin/news/create')
                ->type('title', 'new title')
                ->type('photo', $this->photoUrl)
                ->type('short_text', 'Short Text')
                ->type('full_text', "Full text")
                ->press('Сохранить')
                ->assertPathIs('/admin/news');
        });
    }
}
