<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    //
    public function profile(){
        $profile = DB::table('users')
        ->where('id', Auth::id())
        ->first();
        //dd($profile);
        return view('users.profile', compact('profile'));
    }
    public function search(){
        $users = DB::table('users')->get();

        $follows = DB::table('follows')
            ->where('follower', Auth::id())
            ->pluck('follow');
            // dd($follows);
            // dd($users);

        return view('users.search', compact('users', 'follows'));
    }
    public function result(Request $request){
        $keyword = $request->input('keyword');
        //dd($keyword);
        $follows = DB::table('follows')
            ->where('follower', Auth::id())
            ->pluck('follow');

        if(!empty($keyword)){
            $users = DB::table('users')
            ->where('username', 'like', "%{$keyword}%")
            ->get();
        }else{
             $users = DB::table('users')->get();
        }

        return view('users.search', compact('users', 'keyword', 'follows'));
    }
    public function update(Request $request)
    {
    $up_profile = $request->all();
    $newpassword = $request->newpassword;
    $image = $request->file('cover_image');

        if (!empty($newpassword)) {
            $password = bcrypt($newpassword);
        } else {
            $password = DB::table('users')
            ->where('id', Auth::id())
            ->pluck('password');
        }

        if(!empty($image)){
            $image_name = $image->getClientOriginalName();
            $image->storeAs('images', $image_name, 'public');
        } else{
            $image_name =  DB::table('users')
            ->where('id', Auth::id())
            ->pluck('images');
        }

        DB::table('users')
            ->where('id', Auth::id())
            ->update([
                'username' => $request->username,
                'mail' => $request->mail,
                'password' => $password,
                'images' => $image_name,
                'bio' => $request->bio,
            ]);

        return redirect('/profile');
    }
    public function show($id){
        $profile=DB::table('users')
        ->where('id', $id)
        ->first();

        $posts = DB::table('users')
        ->join('posts', 'posts.user_id', '=', 'users.id')
        ->select('posts.posts', 'posts.created_at', 'users.username', 'users.images')
        ->where('users.id', $id)
        ->get();

        $follows = DB::table('follows')
            ->where('follower', Auth::id())
            ->pluck('follow');

        return view('users.list', compact('profile', 'posts', 'follows'));
    }
}
