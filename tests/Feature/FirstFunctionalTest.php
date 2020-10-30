<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FirstFunctionalTest extends TestCase
{
    /**
     * Feature test for html.
     *
     * @return void
     */
    public function testHtml(): void
    {
        $response = $this->get('/');

        $response->assertSeeText('Новостной');
        $response->assertDontSeeText('Новостной123');
    }

    /**
     * Feature test for json.
     *
     * @return void
     */
    public function testJson(): void
    {
        $response = $this->json('GET', '/json');

        $response->assertStatus(200);

        $json = $response->json();

        $this->assertTrue($json['status']);
        $this->assertNotEmpty($json['data']);
        $this->assertEquals('News title', $json['data']['title']);
        $this->assertEquals('News text', $json['data']['text']);
    }
}
