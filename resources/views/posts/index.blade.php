@extends('layouts.login')

@section('content')

<div class='container'>
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">追加</button>
        {!! Form::close() !!}
</div>

<table class='table table-hover'>
            <tr>
                <th>投稿No</th>
                <th>投稿内容</th>
                <th>投稿日時</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
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
@endsection
</div>
