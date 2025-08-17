<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use App\Models\Thread;

class ThreadTest extends TestCase
{
    use refreshDatabase;

    #[Test]
    public function test_index_returns_threads()
    {
        $threads = Thread::factory()->count(3)->create();

        $response = $this->get(route('threads.index'));

        $response->assertStatus(200);
        $response->assertViewHas('threads', $threads);
    }

    #[Test]
    public function test_create_thread()
    {
        $response = $this->get(route('threads.create'));

        $response->assertStatus(200);
        $response->assertViewIs('threads.create');
    }

    #[Test]
    public function test_store_thread()
    {
        $data = [
            'title' => 'Test Thread',
            'content' => 'This is a test thread.',
            'name' => 'Tester'
        ];

        $response = $this->post(route('threads.store'), $data);

        $this->assertDatabaseHas('threads', $data);
        $response->assertRedirect(route('threads.index'));
    }

    #[Test]
    public function test_show_thread()
    {
        $thread = Thread::factory()->create();

        $response = $this->get(route('threads.show', $thread));

        $response->assertStatus(200);
        $response->assertViewHas('thread', $thread);
    }

    #[Test]
    public function it_can_display_all_threads()
    {
        $threads = Thread::factory()->count(3)->create();

        $response = $this->get('/threads');
        $response->assertStatus(200);
        foreach ($threads as $thread) {
            $response->assertSee($thread->title);
        }
    }

    #[Test]
    public function it_requires_title_and_content()
    {
        $response = $this->post('/threads', [
            'content' => 'This is a test thread content.',
        ]);
        $response->assertSessionHasErrors('title');

        $response = $this->post('/threads', [
            'title' => 'Test Thread',
        ]);
        $response->assertSessionHasErrors('content');
    }

    #[Test]
    public function it_returns_404_for_nonexistent_thread()
    {
        $response = $this->get('/threads/9999'); // 存在しないID
        $response->assertStatus(404);
    }

}
