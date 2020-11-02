<?php

namespace Tests\Feature;

use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function testSuccess(): void
    {
        $response = $this->get('/category');

        $response->assertStatus(200);
    }
}
