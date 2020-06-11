@extends('layouts.app')

@section('header')
        <h3>Добро пожаловать, {{ $user->name }}</h3>
@endsection

@section('content')
    <h4 class="my-4">Здесь вы можете посмореть все опубликованные посты</h4>

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

                            <hr>
                        </h2>
                        <p class="card-text">{{ Str::limit($post->body, 500, '...') }}</p>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">
                            Читать полностью...
                        </a>
                    </div>

                    <div class="card-footer text-muted">
                        Тэги:
                        <div class="list-inline-item">
                            <a href="#" class="btn-info m-2">
                                {{ $post->tags()->pluck('tag')->implode(' ') }}
                            </a>
                        </div>
                        <hr>

                        <p>Дата создания поста: {{ $post->created_at->format('M d,Y \a\t h:i a') }}</p>

                        <p>Автор:
                            <a href="{{ route('user.profile', $post->user->id) }}">
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


    {{ $posts->links() }}

@endsection
