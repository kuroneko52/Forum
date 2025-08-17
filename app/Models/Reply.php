<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $fillable = ['content', 'thread_id', 'name'];

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
