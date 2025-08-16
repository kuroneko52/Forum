@extends('layouts.app')

@section('content')
    <h1>{{ $thread->title }}</h1>
    <p>{{ $thread->content }}</p>

    <h2>レス一覧</h2>
    <ul>
        @foreach ($thread->replies as $reply)
            <li>
                <p>{{ $reply->content }}</p>
            </li>
        @endforeach
    </ul>

    <h2>レスを投稿</h2>
    <form action="{{ route('replies.store', $thread) }}" method="POST">
        @csrf
        <div>
            <label for="content">内容</label>
            <textarea name="content" id="content" required></textarea>
        </div>
        <button type="submit">投稿</button>
    </form>
    <a href="{{ route('threads.index') }}">戻る</a>
@endsection
