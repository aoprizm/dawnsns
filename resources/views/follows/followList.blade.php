@extends('layouts.login')

@section('content')

<div id ="content">
    <div class="FollowList">
        <h1>FOLLOWLIST</h1>
            @foreach($follows as $follow)
                <img src="{{ asset('images/'.$follow->images) }}">
            @endforeach
     </div>
</div>
<div class="follows-post">
    @foreach($follows as $follow)
    <img rsc="/storage/{{ $follow->images }}">
    {{ $follow->posts }}
    {{ $follow->created_at }}
    @endforeach
</div>




@endsection
