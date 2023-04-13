<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index()
    {
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'users.username', 'users.images')
            ->get();
        // dd($posts);
        return view('posts.index',['posts'=>$posts]);
    }

     public function createForm(Request $request)
    {
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'posts' => $post,
            'user_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/top');
    }
    public function update(Request $request)
    {
        $update = $request->input('update');
        $id = $request->input('id');
        //dd($id);
        DB::table('posts')
        ->where('id', $id)
        ->update([
            'posts' => $update,
            'user_id' => Auth::id(),
            'updated_at' => now(),
        ]);
        return redirect('/top');
    }

    public function delete($id)
    {
        DB::table('posts')
        ->where('id', $id)
        ->delete();

        return redirect('/top');
    }
}

?>
