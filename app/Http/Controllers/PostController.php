<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        //все опубликованные посты
        $posts = Post::where('publish', 1)->orderBy('created_at', 'desc')->paginate(2);

        return view('posts.index', compact('user', 'posts'));
    }

    public function create()
    {
        $this->authorize('create', Post::class);

        $tags = Tag::pluck('tag', 'id')->all();

        return view('posts.form', compact('tags'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $data = $this->validated($request);
        /** @var HasMany $posts */
        $posts = auth()->user()->posts();

        $newPost = $posts->create($data);

        $tag['tag'] = $request->input('tag');
        $newPost->tags()->create($tag);

        return redirect()->route('posts.show', $newPost);
    }

    public function show(Post $post)
    {
        $this->authorize('view', $post);

        $user = auth()->user();

        $comments = $post->comments->sortByDesc('created_at');

        return view('posts.show', compact('post', 'comments', 'user'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.form', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $data = $this->validated($request, $post);

        $post->update($data);

        $tag['tag'] = $request->input('tag');
        $post->tags()->update($tag);

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('user.all-posts');
    }

    public function toggle(Post $post)
    {
        $this->authorize('update', $post);

        $post->publish = !$post->publish;
        $post->save();

        return redirect()->route('posts.show', $post);
    }

    protected function validated(Request $request, Post $post = null)
    {
        $rules = [
            'title' => 'required|min:5|max:100|unique:posts',
            'slug' => 'nullable',
            'publish' => 'boolean',
            'body' => 'required'
        ];

        if($post)
            $rules['title'] .= ',title,' . $post->id;

        return $request->validate($rules);
    }
}
