<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Reply;

class ThreadController extends Controller
{
    //
    public function index()
    {
        $threads = Thread::with('replies')->get();
        return view('threads.index', compact('threads'));
    }

    public function create()
    {
        return view('threads.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'name' => 'nullable|string|max:255',
        ]);

        Thread::create($request->only(['title', 'content', 'name']));
        return redirect()->route('threads.index');
    }

    public function show(Thread $thread)
    {
        return view('threads.show', compact('thread'));
    }

}
