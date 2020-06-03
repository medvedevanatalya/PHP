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
                by <a href="#">{{ $post->user->name }}</a>
            </p>
            <hr>
            <p>Дата создания поста: {{ $post->created_at->format('M d,Y \a\t h:i a') }}</p>
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
                    @can('update', $post)
                        <button class="btn btn-danger">
                            Удалить
                        </button>
                        <hr>
                    @endcan
                </div>
            </form>

{{--            <div class="list-inline-item">--}}
{{--                @forelse($tags as $tag)--}}
{{--                    <a href="#" class="btn-info">#tag</a>--}}
{{--                    <a href="#" class="btn-info">#tags</a>--}}
{{--                    <a href="#" class="btn-info">#ggg</a>--}}
{{--                @empty--}}

{{--                @endforelse--}}
{{--            </div>--}}

            <p class="lead">{{ $post->body }}</p>
            <hr>

            <div class="card my-4">
                <h5 class="card-header">Ваш комментарий:</h5>
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
                        <button class="btn btn-success">Отправить</button>
                    </form>
                </div>
            </div>
            @forelse($comments as $comment)
                    <div class="list-group pb-2">
                        <div class="list-group-item">
                            <h3>@ {{ $comment->user->name }}</h3>
                            <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
                        </div>
                        <div class="list-group-item">
                            <p>{{ $comment->comment }}</p>
                        </div>
                    </div>

            @empty
                <div class="list-group-item">
                    <p>Здесть пока нет ни одного комментария, но вы можете быть первым :)</p>
                </div>
            @endforelse
        </div>
    </div>

@endsection
