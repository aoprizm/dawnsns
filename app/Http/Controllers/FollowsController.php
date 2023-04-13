<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){

        $follows = DB::table('follows')
        ->first();
        return view('follows.followList', compact('follows'));
    }
    public function followerList(){
        $followers = DB::table('follows')
        ->first();
        return view('follows.followerList', ['followers' => $followers]);
    }
    public function create(Request $request){
        $id = $request->id;

        DB::table('follows')
        ->insert([
            'follow' => $id,
            'follower' => Auth::id(),
            'created_at' => now(),
            ]);
        return back();
    }
    public function delete(Request $request){
        $id = $request->id;

        DB::table('follows')
        ->where([
            'follow' => $id,
            'follower' => Auth::id(),
            ])->delete();
        return back();
    }

}
