<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //вывод опубликованных постов пользователя
    public function user_posts_published($id)
    {
        $posts = Post::where('user_id',$id)->where('publish',1)->orderBy('created_at','desc')->paginate(5);

//        $user = User::find($id)->name;
        $user = auth()->user();
        return view('posts.index', compact('posts', 'user'));
    }

    // Вывод всех постов отдельного пользователя
    public function user_posts_all(Request $request)
    {
        $user = $request->user();

        $posts = Post::where('user_id',$user->id)->orderBy('created_at','desc')->paginate(5);

        return view('posts.index', compact('posts', 'user'));
    }

    //Вывод черновиков постов текущего активного пользователя
    public function user_posts_draft(Request $request)
    {
        $user = $request->user();

        $posts = Post::where('user_id',$user->id)->where('publish',0)->orderBy('created_at','desc')->paginate(5);

        return view('posts.index', compact('posts', 'user'));
    }

    //профиль пользователя
    public function profile(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user)
            return redirect('/');

        if ($request->user() && $user->id == $request->user()->id)
        {
            $author = true;
        }
        else
        {
            $author = false;
        }

        $comments_count = $user->comments->count();
        $posts_count = $user->posts->count();
        $posts_publish_count = $user->posts->where('publish', '1')->count();
        $posts_draft_count = $posts_count - $posts_publish_count;
        $latest_posts = $user->posts->where('publish', '1')->take(5);
        $latest_comments = $user->comments->take(5);

        return view('admin.profile',
            compact('user', 'author',
                'comments_count', 'posts_count',
                'posts_publish_count', 'posts_draft_count',
                'latest_posts', 'latest_comments'));
    }
}
