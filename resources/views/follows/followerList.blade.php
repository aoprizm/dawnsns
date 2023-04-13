@extends('layouts.login')

@section('content')

<div id ="content">
    <table style="border-collapse: separate">
            <tr>
                <FLOLLOWERLIST class="FollowerList">FOLLOWERLIST</th>
            </tr>
            @foreach ($followers as $follower)
            <tr>
                    <td class="id">{{ $followers->follower }}</td>
            </tr>
            @endforeach
    </table>
</div>

@endsection
