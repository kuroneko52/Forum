<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReplyController extends Controller
{
    //
    public function store(Request $request, Thread $thread)
    {
        $request->validate([
            'content' => 'required',
        ]);
    
        $thread->replies()->create($request->all());
        return redirect()->route('threads.show', $thread);
    }

}
