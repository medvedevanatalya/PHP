<?php
$update = isset($post);
?>

@extends('layouts.app')

@section('header')
    <h2 class="mb-3">{{ $update ? "Редактировать \"{$post->title}\"" : 'Новый пост'}}</h2>
@endsection

@section('content')


    <div class="card card-body">

        <form action="{{ $update ? route('posts.update', $post) : route('posts.store') }}" method="POST">
            @csrf
            @if($update)
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="title">Заголовок поста<span class="text-danger">*</span></label>
                <input class="form-control @error('title') is-invalid @enderror"
                       type="text"
                       name="title"
                       id="title"
                       placeholder="Заголовок поста..."
                       value="{{ old('title') ?? ( $post->title ?? '') }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="body">Текст поста<span class="text-danger">*</span></label>
                <textarea  placeholder="Текст поста..."
                           class="form-control @error('body') is-invalid @enderror"
                           name="body"
                           id="body">{{ old('post') ?? ( $post->body ?? '' ) }}</textarea>
                @error('post')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group custom-control custom-checkbox">
                <input type="hidden" name="publish" value="0">
                <input value="1"
                       type="checkbox"
                       class="custom-control-input"
                       name="publish"
                       id="publish"
                       @if((old('publish') ?? ($post->publish ?? false)) == '1') checked @endif>
                <label for="publish" class="custom-control-label">Опубликовать?</label>
            </div>

            <div class="form-group">
                <label for="tag">Тэг</label>
                <input class="form-control @error('tag') is-invalid @enderror"
                       type="text"
                       name="tag"
                       id="tag">
                @error('tag')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">
                {{ $update ? 'Обновить' : 'Добавить' }}
            </button>

        </form>
    </div>
@endsection
