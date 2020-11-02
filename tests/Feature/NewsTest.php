<?php

namespace Tests\Feature;

use Tests\TestCase;

class NewsTest extends TestCase
{
    public function testSuccess(): void
    {
        $response = $this->get('/news/1');

        $response->assertStatus(200);
    }
}
