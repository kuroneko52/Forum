<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory;
    
    protected $fillable = ['content', 'thread_id', 'name'];

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
