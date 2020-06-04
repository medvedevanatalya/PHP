@extends('layouts.app')

@section('header')
        <h1>{{ $post->title }}</h1>
        @if($post->isPublish())
            <span class="badge badge-success">
                Опубликован
            </span>
        @endif
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-8">
            <p class="lead">
                by
                <a href="{{ route('user.profile', $post->user->id) }}">
                    {{ $post->user->name }}
                </a>
            </p>
            <hr>

            <p>
                Дата создания поста: {{ $post->created_at->format('M d,Y \a\t h:i a') }}
            </p>
            <hr>

            <form class="ml-auto" action="{{ route('posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')

                @can('update', $post)
                    <a href="{{ route('posts.toggle', $post) }}" class="btn {{ $post->publish ? 'btn-success' : 'btn-secondary' }}">
                        {{ Str::of(($post->publish ? '' : 'не ') .'опубликовано')->lower()->ucfirst() }}
                    </a>
                @endcan

                <div class="btn-group">
                    @can('update', $post)
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-info">
                            Редактировать
                        </a>
                    @endcan
                    @can('delete', $post)
                        <button class="btn btn-danger">
                            Удалить
                        </button>
                        <hr>
                    @endcan
                </div>
            </form>
            <hr>

            <p class="lead">
                {{ $post->body }}
            </p>
            <hr>

            Тэги:
            <div class="list-inline-item">
                <a href="#" class="btn-info m-2">
                    {{ $post->tags()->pluck('tag')->implode(' ') }}
                </a>
            </div>
            <hr>

            @if($post->publish)
                <div class="card my-4">
                    <h5 class="card-header">
                        Ваш комментарий:
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <textarea
                                    class="form-control"
                                    rows="3"
                                    name="comment"
                                placeholder="Введите Ваш комментарий..."></textarea>
                            </div>

                            <button class="btn btn-success">
                                Отправить
                            </button>
                        </form>
                    </div>
                </div>

                @forelse($comments as $comment)
                        <div class="list-group pb-2">
                            <div class="list-group-item">
                                <div class="float-right">
                                    @if($comment->user->id == $user->id)
                                        <form class="ml-auto" action="{{ route('comments.destroy', $comment) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger border-right">
                                                <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 00-1 1v1a1 1 0 001 1H3v9a2 2 0 002 2h6a2 2 0 002-2V4h.5a1 1 0 001-1V2a1 1 0 00-1-1H10a1 1 0 00-1-1H7a1 1 0 00-1 1H2.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM8 5a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 018 5zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>

                                <h3>
                                    @ {{ $comment->user->name }}
                                </h3>

                                <p>
                                    {{ $comment->created_at->format('M d,Y \a\t h:i a') }}
                                </p>
                            </div>

                            <div class="list-group-item">
                                <p>
                                    {{ $comment->comment }}
                                </p>
                            </div>
                        </div>
                @empty
                    <div class="list-group-item">
                        <p>
                            Здесть пока нет ни одного комментария, но вы можете быть первым :)
                        </p>
                    </div>
                @endforelse
            @endif
        </div>
    </div>

@endsection
