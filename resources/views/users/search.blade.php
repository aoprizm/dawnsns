@extends('layouts.login')

@section('content')

<div id="search">
    <form action ="search" method="post">
        @csrf
        <input type="text" name="keyword" placeholder="ユーザー名">
        <input type="submit" value="検索する">
        <i class="fas fa-search"></i>
    </form>
    @if(isset($keyword))
    <div>
        <span>検索ワード:</span>
        <span>{{ $keyword }}</span>
    </div>
    @endif
    <div id ="content">
        <table style="border-collapse: separate">
            <tr>
                <th class="username">USERNAME</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td class="id">{{ $user->username }}</td>
                    <td>
                        <form action ="/follow/create" method="post">
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <input type="submit" value="フォローする">
                        </form>
                    </td>
                    <td>
                        <form action ="/follow/delete" method="post">
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <input type="submit" value="フォローを外す">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
