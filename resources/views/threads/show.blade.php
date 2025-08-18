@extends('layouts.app')

@section('content')
    <h1>{{ $thread->title }}</h1>

    <p><strong id="thread-info">1 名前：{{ $thread->name ?? '名無しさん' }} {{ $thread->created_at->format('Y/m/d H:i:s') }}</strong></p>
    <div class="reply" id="thread">
        <p>{{ $thread->content }}</p>
    </div>
    <hr>

    @foreach ($thread->replies as $index => $reply)
        <p><strong id="reply-info-{{ $index + 2 }}">{{ $index + 2 }} 名前：{{ $reply->name ?? '名無しさん' }} {{ $reply->created_at->format('Y/m/d H:i:s') }}</strong></p>
        <div class="reply" id="reply-{{ $reply->id }}">
            <p>{!! convertReplyContent($reply->content, $thread) !!}</p>
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

@php
function convertReplyContent($content, $thread) {
    return preg_replace_callback('/>>(\d+)/', function($matches) use ($thread) {
        $replyNumber = (int)$matches[1];

        // スレッドの内容にリンクする場合
        if ($replyNumber === 1) {
            return '<a href="#thread-info">>>1</a>'; // スレッドの内容へのリンク
        }

        // リンクを生成（存在しないIDでもリンクを作成）
        return '<a href="#reply-info-' . htmlspecialchars($replyNumber) . '">>>' . htmlspecialchars($replyNumber) . '</a>';
    }, $content);
}

@endphp