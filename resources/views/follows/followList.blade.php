@extends('layouts.login')

@section('content')

<div id ="content">
    <table style="border-collapse: separate">
            <tr>
                <FLOLLOWLIST class="FollowList">FOLLOWLIST</th>
            </tr>
            @php
               $f_found=false;
             @endphp
            @foreach ($follows as $follow)
            <tr>
                    <td class="id">{{ $follows->follow }}</td>
            </tr>
            @endforeach
    </table>
</div>
@endsection
