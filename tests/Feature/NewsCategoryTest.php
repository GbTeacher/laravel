<?php

namespace Tests\Feature;

use Tests\TestCase;

class NewsCategoryTest extends TestCase
{
    public function testSuccess(): void
    {
        $response = $this->get('/news/category/1');

        $response->assertStatus(200);
    }
}
