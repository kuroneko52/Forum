<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use App\Controllers\ThreadController;
use App\Models\Thread;

class ThreadTest extends TestCase
{
    use refreshDatabase;

    #[Test]
    public function it_can_create_a_thread()
    {
        $response = $this->post('/threads', [
            'title' => 'Test Thread',
            'content' => 'This is a test thread content.',
        ]);

        $response->assertRedirect('/threads');
        $this->assertDatabaseHas('threads', [
            'title' => 'Test Thread',
            'content' => 'This is a test thread content.',
        ]);
    }

    #[Test]
    public function it_can_display_a_thread()
    {
        $thread = Thread::create([
            'title' => 'Test Thread',
            'content' => 'This is a test thread content.',
        ]);

        $response = $this->get('/threads/' . $thread->id);
        $response->assertStatus(200);
        $response->assertSee('Test Thread');
        $response->assertSee('This is a test thread content.');
    }

    #[Test]
    public function it_can_update_a_thread()
    {
        $thread = Thread::create([
            'title' => 'Old Title',
            'content' => 'Old content.',
        ]);

        $response = $this->put('/threads/' . $thread->id, [
            'title' => 'Updated Title',
            'content' => 'Updated content.',
        ]);

        $response->assertRedirect('/threads/' . $thread->id);
        $this->assertDatabaseHas('threads', [
            'title' => 'Updated Title',
            'content' => 'Updated content.',
        ]);
    }

    #[Test]
    public function it_can_delete_a_thread()
    {
        $thread = Thread::create([
            'title' => 'Test Thread',
            'content' => 'This is a test thread content.',
        ]);

        $response = $this->delete('/threads/' . $thread->id);
        $response->assertRedirect('/threads');
        $this->assertDatabaseMissing('threads', [
            'id' => $thread->id,
        ]);
    }
}
