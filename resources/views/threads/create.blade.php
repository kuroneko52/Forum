@extends('layouts.app')

@section('content')
    <h1>新規スレッド作成</h1>
    <form action="{{ route('threads.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="content">内容</label>
            <textarea name="content" id="content" required></textarea>
        </div>
        <button type="submit">作成</button>
    </form>
    <a href="{{ route('threads.index') }}">戻る</a>
@endsection