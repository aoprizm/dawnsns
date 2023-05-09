@extends('layouts.login')

@section('content')

<div class='post-container'>
    {!! Form::open(['url' => 'post/create']) !!}
    <div class="form-group">
        {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？']) !!}
    </div>
    <input type="image" img src="images/post.png" class="post-ping" width="30px">
    {!! Form::close() !!}
</div>

<div class="post-list">
    @foreach ($posts as $post)
        {{ $post->posts }}
        {{ $post->created_at }}
        <button id="modalopen">
        <img src="/images/edit.png" width="20" height="20"></button>
        <section id="modalArea" class="modalArea">
             <div id="modalBg" class="modalBg"></div>
                <div class="modalWrapper">
                    <div class="modalContents">
                    {!! Form::open(['url' => 'post/update']) !!}
                            {!! Form::input('text', 'update', $post->posts , ['required', 'class' => 'form-control02']) !!}
                            {!! Form::hidden('id', $post->id ) !!}
                        <img src="/images/edit.png" class="image">
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div id="closeModal" class="closeModal"></div>
        </section>
<a class="btn btn-primary" href="/post/{{ $post->id }}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')"><img src="/images/trash.png"  width="50" height="50"></a>
</div>
@endforeach
@endsection
