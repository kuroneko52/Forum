@extends('layouts.app')

@section('content')
    <h2>スレッド一覧</h2>

    @foreach ($threads as $thread)
        <div class="thread">
            <h3><a href="{{ route('threads.show', $thread->id) }}">{{ $thread->title }}</a></h3>
            <p>{{ $thread->content }}</p>
            <p>レスポンス数: {{ $thread->replies->count() }} | 投稿日: {{ $thread->created_at->format('Y/m/d H:i') }}</p>
        </div>
        <hr>
    @endforeach
    <a href="{{ route('threads.create') }}">新規スレッド作成</a>
@endsection
