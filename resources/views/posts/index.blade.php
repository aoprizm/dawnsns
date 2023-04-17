@extends('layouts.login')

@section('content')

<div class='post-container'>
    {!! Form::open(['url' => 'post/create']) !!}
    <div class="form-group">
        {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？']) !!}
    </div>
    <button type="submit" class="btn btn-success pull-right">送信</button>
    {!! Form::close() !!}
</div>

<div class="post-list">
    <table class='table table-hover'>
    @foreach ($posts as $post)
    <tr>
        <td>{{ $post->posts }}</td>
        <td>{{ $post->created_at }}</td>
        {!! Form::open(['url' => 'post/update']) !!}
            <div class="modal-main" id="modal">
                <div id="modal-content">
                    <div class="modal-innner">
                        {!! Form::input('text', 'update', $post->posts , ['required', 'class' => 'form-control02']) !!}
                        {!! Form::hidden('id', $post->id ) !!}
                    </div>
                <img src="/images/edit.png" class="image">
                </div>
            </div>
            {!! Form::close() !!}
        <td>
            <div class="modalopen" data-target="modal">
                <img src="/images/edit.png" width="30" height="30">
            </div>
        </td>
        <td><a class="btn btn-primary" href="/post/{{ $post->id }}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')"><img src="/images/trash.png"  width="50" height="50"></a></td>
    </tr>
    @endforeach
    </table>
</div>
@endsection
