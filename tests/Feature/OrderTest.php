<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function testSuccess(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('Заказ');
    }

    public function testStore(): void
    {
        Storage::fake();

        $response = $this->post('/order/store', [
            'name'  => 'name123',
            'photo' => 'photo',
            'email' => 'email',
            'info'  => 'info',
        ]);

        $response->assertSeeText('Форма заказа успешно отправлена.');
    }
}
