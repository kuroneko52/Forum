<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Thread extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'content', 'name'];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
