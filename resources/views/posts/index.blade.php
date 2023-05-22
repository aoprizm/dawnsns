@extends('layouts.login')

@section('content')

<div class='container'>
    <div class='post-container'>
    {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？']) !!}
        </div>
    <input type="image" img src="images/post.png" class="post-ping" width="30px">
    {!! Form::close() !!}
    </div>

@foreach ($posts as $post)
<div class="post-list">
    <img src="/storage/images/{{ $post->images }}" alt="">
        {{ $post->posts }}
        {{ $post->created_at }}
    <div class="edit-icon">
        <a href="" class="modalopen"  data-target="{{ $post->id }}">
            <img class="edit-img" src="/images/edit.png">
        </a>
    </div>
<!-- 1つ目のモーダルの中身 -->
<div class="modal-main js-modal" id="{{ $post->id }}">
  <div class="modal-inner">
    <div class="inner-content">
        {!! Form::open(['url' => 'post/update']) !!}
        {!! Form::input('text', 'update', $post->posts , ['required', 'class' => 'form-control02']) !!}
        {!! Form::hidden('id', $post->id ) !!}
        <input type="image" src="/images/edit.png" class="image">
        {!! Form::close() !!}
      <a class="send-button modalClose">Close</a>
    </div>
  </div>
</div>
<a class="btn btn-primary" href="/post/{{ $post->id }}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')"><img src="/images/trash.png"></a>
</div>
@endforeach
@endsection
