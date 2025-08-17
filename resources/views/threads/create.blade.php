@extends('layouts.app')

@section('content')
    <h1>新規スレッド作成</h1>
    <form action="{{ route('threads.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">スレッドタイトル</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="タイトルを入力" required>
        </div>
        <div class="form-group">
            <label for="name">名前</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="名前を入力">
        </div>
        <div class="form-group">
            <label for="content">スレッド内容</label>
            <textarea name="content" id="content" class="form-control" rows="5" placeholder="内容を入力" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">スレッド作成</button>
        <a href="{{ route('threads.index') }}" class="btn btn-secondary">戻る</a>
    </form>
@endsection
