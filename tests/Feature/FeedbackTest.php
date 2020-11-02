<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    public function testSuccess(): void
    {
        $response = $this->get('/feedback');

        $response->assertStatus(200);
    }

    public function testStore(): void
    {
        Storage::fake();

        $response = $this->post('/feedback/store', [
            'name'    => 'name123',
            'comment' => 'comment',
        ]);

        $response->assertSeeText('Форма обратной связи успешно отправлена.');
    }
}
