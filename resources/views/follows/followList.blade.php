@extends('layouts.login')

@section('content')

<div id ="content">
    <div class="FollowList">
        <h1>FOLLOWLIST</h1>
            @foreach($follows as $follow)
                <a href="list/{{ $follow->id }}">
                    <img src="{{ asset('/storage/images/'.$follow->images) }}">
                </a>
            @endforeach
     </div>
</div>
<div class="follows-post">
    @foreach($follows as $follow)
     <img src="{{ asset('/storage/images/'.$follow->images) }}">
    {{ $follow->posts }}
    {{ $follow->created_at }}
    @endforeach
</div>




@endsection
