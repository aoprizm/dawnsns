@extends('layouts.login')

@section('content')

<div id ="content">
    <div class="FollowerList">
        <h1>FOLLOWLIST</h1>
            @foreach($followers as $follower)
                <img src="{{ asset('images/'.$follower->images) }}">
            @endforeach
     </div>
</div>
<div class="followers-post">
    @foreach($followers as $follower)
    {{ $follower->posts }}
    {{ $follower->created_at }}
    @endforeach
</div>

@endsection
