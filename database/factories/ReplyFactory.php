<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Thread;
use App\Models\Reply;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
{
    protected $model = Reply::class;
    
    public function definition(): array
    {
        return [
            'content' => $this->faker->sentence,
            'name' => $this->faker->name,
            'thread_id' => Thread::factory(), // Automatically associate with a thread
        ];
    }
}
