@extends('layouts.app')

@section('content')
    <h1>スレッド一覧</h1>
    @foreach ($threads as $thread)
        <div class="thread">
            <h2><a href="{{ route('threads.show', $thread) }}" target="_blank">{{ $thread->title }}</a></h2>
            <p>{{ $thread->content }}</p>
            <small>投稿日: {{ $thread->created_at->format('Y/m/d H:i:s') }}</small>
        </div>
        <hr>
    @endforeach
    <a href="{{ route('threads.create') }}" class="btn btn-success">新規スレッド作成</a>
@endsection
