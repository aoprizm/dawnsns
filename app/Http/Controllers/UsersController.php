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
        //dd($users);
        return view('users.search', compact('users'));
    }
    public function result(Request $request){
        $keyword = $request->input('keyword');
        //dd($keyword);

        if(!empty($keyword)){
            $users = DB::table('users')
            ->where('username', 'like', "%{$keyword}%")
            ->get();
        }else{
             $users = DB::table('users')->get();
        }

        return view('users.search', compact('users', 'keyword'));
    }
    public function update(Request $request)
    {
    $up_profile = $request->all();
    $newpassword = $request->newpassword;

        DB::table('users')
            ->where('id', Auth::id())
            ->update([
                'username' => $request->username,
                'mail' => $request->mail,
                'password' => $password,
                'bio' => $request->bio,
            ]);

        //空の状態でアップデートすることはできないのか？
        //今のままだとnewpassworの入力が必ず必要になる
        if (!empty($newpassword)) {
            $password = bcrypt($newpassword);
        } else {
            $password = DB::table('users')
            ->where('id', Auth::id())
            ->pluck('password');
        }

        return redirect('/profile');
    }
}
