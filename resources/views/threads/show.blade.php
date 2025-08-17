@extends('layouts.app')

@section('content')
    <h1>{{ $thread->title }}</h1>

    <p>1 : {{ $thread->created_at->format('Y/m/d H:i:s') }}</p> <!-- スレッド内容に番号1を追加 -->
    <div class="reply">
        <p>{{ $thread->content }}</p>
    </div>
    <hr>
    
    @foreach ($thread->replies as $index => $reply)
        <p>{{ $index + 2 }} : {{ $reply->created_at->format('Y/m/d H:i:s') }}</p> <!-- レスに番号を追加 -->
        <div class="reply">
            <p> {{ $reply->content }}</p>
        </div>
        <hr>
    @endforeach

    <h4>書き込み</h4>
    <form action="{{ route('replies.store', $thread) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">名前</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="名前を入力">
        </div>
        <div class="form-group">
            <label for="name">内容</label>
            <textarea name="content" class="form-control" rows="3" placeholder="レス内容" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">書き込む</button>
    </form>
@endsection
