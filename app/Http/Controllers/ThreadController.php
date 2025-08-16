<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        ]);

        Thread::create($request->all());
        return redirect()->route('threads.index');
    }

    public function show(Thread $thread)
    {
        return view('threads.show', compact('thread'));
    }

}
