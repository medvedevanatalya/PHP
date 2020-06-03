@extends('layouts.app')

@section('header')
        <h1>Добро пожаловать, {{$user->name}}</h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1 class="my-4">All posts</h1>

            @forelse($posts as $post)

                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">
                            <a href="{{ route('posts.show', $post) }}">
                                {{ $post->title }}
                            </a>
                            <form class="ml-auto" action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <div class="btn-group btn-group-sm">
                                    @can('update', $post)
                                        @if($post->publish == '1')
                                            <a class="btn btn-info" href="{{ route('posts.edit', $post) }}">
                                                Редактировать пост
                                            </a>
                                        @else
                                            <a class="btn btn-info" href="{{ route('posts.edit', $post) }}">
                                                Редактировать черновик
                                            </a>
                                        @endif
                                    @endcan

                                    @can('delete', $post)
                                        <button class="btn btn-danger">
                                            Удалить
                                        </button>
                                    @endcan
                                </div>
                            </form>
                        </h2>
                        <p class="card-text">{{ Str::limit($post->body, 500, '...') }}</p>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">
                            Читать полностью...
                        </a>
                    </div>

                    <div class="card-footer text-muted">

                        <p>Дата создания поста: {{ $post->created_at->format('M d,Y \a\t h:i a') }}</p>

                        <p>Автор:
                            <a href="{{ route('posts.index') }}">
                                {{ $post->user->name }}
                            </a>
                        </p>

                    </div>
                </div>

            @empty
                <div class="alert alert-secondary">
                    Пока нет ни одного поста :(
                    Но Вы можете это исправить, создав первый пост :)
                </div>

            @endforelse

        </div>
    </div>

    {{ $posts->links() }}

@endsection
