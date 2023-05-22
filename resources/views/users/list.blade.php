@extends('layouts.login')

@section('content')

<div>
  <img src="{{ asset('/storage/images/'.$profile->images) }}" alt="">
  <p>{{ $profile->username }}</p>
  <p>{{ $profile->bio }}</p>
@if($follows->contains($profile->id))
  <form action ="/follow/delete" method="post">
      @csrf
      <input type="hidden" value="{{$profile->id}}" name="id">
      <input type="submit" value="フォローを外す">
  </form>
@else
  <form action ="/follow/create" method="post">
      @csrf
      <input type="hidden" value="{{$profile->id}}" name="id">
      <input type="submit" value="フォローする">
  </form>
@endif
</div>

<div>
  @foreach($posts as $post)
     <img src="{{ asset('/storage/images/'.$post->images) }}">
    {{ $post->posts }}
    {{ $post->created_at }}
    @endforeach
</div>
@endsection
