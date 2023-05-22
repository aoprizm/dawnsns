@extends('layouts.login')

@section('content')

<div id ="content">
    <div class="FollowerList">
        <h1>FOLLOWERLIST</h1>
            @foreach($followers as $follower)
            <a href="list/{{ $follower->id }}">
                <img src="{{ asset('/storage/images/'.$follower->images) }}">
            </a>
            @endforeach
     </div>
</div>
<div class="followers-post">
    @foreach($followers as $follower)
    <img src="{{ asset('/storage/images/'.$follower->images) }}">
    {{ $follower->posts }}
    {{ $follower->created_at }}
    @endforeach
</div>

@endsection
