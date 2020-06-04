@extends('layouts.app')

@section('header')
    <h1>
        Добро пожаловать в профиль, {{ $user->name }}
    </h1>
@endsection

@section('content')

    <div>
        <ul class="list-group">
            <li class="list-group-item">
                Зарегистрированы от {{ $user->created_at->format('M d, Y a\t h:i a') }}
            </li>
            <li class="list-group-item panel-body">
                <table class="table-padding">
                    <style>
                        .table-padding td{
                            padding: 3px 8px;
                        }
                    </style>
                    <tr>
                        <td>Всего постов: </td>
                        <td>{{ $posts_count }}</td>
                        @if($author && $posts_count)
                            <td>
                                <a href="{{ route('user.all-posts') }}">Показать все</a>
                            </td>
                        @endif
                    </tr>
                    <tr>
                        <td>Опубликованных постов: </td>
                        <td>{{ $posts_publish_count }}</td>
                        @if($posts_publish_count)
                            <td>
                                <a href="{{ route('user.publish-posts', $user->id) }}">
                                    Показать опубликованные
                                </a>
                            </td>
                        @endif
                    </tr>
                    <tr>
                        <td>Не опубликованных постов: </td>
                        <td>{{$posts_draft_count}}</td>
                        @if($author && $posts_draft_count)
                            <td>
                                <a href="{{ route('user.drafts') }}">
                                    Показать не опубликованные
                                </a>
                            </td>
                        @endif
                    </tr>
                </table>
            </li>
            <li class="list-group-item">
                Всего комментариев: {{ $comments_count }}
            </li>
        </ul>
    </div>
    <hr>
    <hr>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Последние посты</h3>
        </div>
        <div class="panel-body">
            @forelse($latest_posts as $latest_post)
                <p>
                    <strong>
                        <a href="{{ route('posts.show', $latest_post->id) }}">
                            {{ $latest_post->title }}
                        </a>
                    </strong>
                </p>
            @empty
                <p>У автора {{ $user->name }} нет еще постов</p>
            @endforelse
        </div>
    </div>
    <hr>
    <hr>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Последние комментарии</h3>
        </div>
        <div class="list-group">
            @forelse($latest_comments as $latest_comment)
                <div class="list-group-item">
                    <p>{{ $latest_comment->comment }}</p>
                    <p>От {{ $latest_comment->created_at->format('M d,Y \a\t h:i a') }}</p>
                    <p>Пост
                        <a href="{{ route('posts.show', $latest_comment->post->id) }}">
                            {{ $latest_comment->post->title }}
                        </a>
                    </p>
                </div>
            @empty
                <div class=list-group-item">
                <p>У автора нет комментариев. Последние 5 комментариев будут выведены здесь</p>
        </div>
            @endforelse
        </div>
    </div>

@endsection
