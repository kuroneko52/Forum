<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use App\Models\Thread;
use App\Models\Reply;

class ReplyTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    #[Test]
    public function test_store_reply()
    {
        $thread = Thread::factory()->create();

        $data = [
            'content' => 'This is a test reply.',
            'name' => 'Replier'
        ];

        $response = $this->post(route('replies.store', $thread), $data);

        $this->assertDatabaseHas('replies', $data);
        $response->assertRedirect(route('threads.show', $thread));
    }

    #[Test]
    public function it_requires_content_when_storing_a_reply()
    {
        $thread = Thread::create([
            'title' => 'Test Thread',
            'content' => 'This is a test thread content.',
        ]);

        $response = $this->post(route('replies.store', $thread), [
            'name' => 'Replier', // contentを省略
        ]);

        $response->assertSessionHasErrors('content');
    }

    #[Test]
    public function it_can_display_a_reply()
    {
        $thread = Thread::create([
            'title' => 'Test Thread',
            'content' => 'This is a test thread content.',
        ]);

        $reply = Reply::create([
            'content' => 'This is a test reply.',
            'thread_id' => $thread->id,
            'name' => 'Replier'
        ]);

        $response = $this->get(route('threads.show', $thread));

        $response->assertStatus(200);
        $response->assertSee($reply->content);
    }
}
