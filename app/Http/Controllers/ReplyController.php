<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Reply;

class ReplyController extends Controller
{
    //
    public function store(Request $request, Thread $thread)
    {
        $request->validate([
            'content' => 'required',
            'name' => 'nullable|string|max:255',
        ]);
    
        $thread->replies()->create($request->only(['content', 'name']));
        return redirect()->route('threads.show', $thread);
    }

}
