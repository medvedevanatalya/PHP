<?php
$update = isset($todo);
?>

@extends('layouts.app')

@section('content')

    <h2 class="mb-3">{{ $update ? 'Редактировать' {{$todo->title}} : 'Новая задача'}}</h2>

    <div class="card card-body">

        <form action="{{ $update ? route('todos.update', $todo) : route('todos.store') }}" method="POST">
            @csrf
            @if($update)
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="title">Заголовок<span class="text-danger">*</span></label>
                <input class="form-control @error('title') is-invalid @enderror"
                       type="text"
                       name="title"
                       id="title"
                       placeholder="Заголовок..."
                       value="{{ old('title') ?? ( $todo->title ?? '') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Описание</label>
                <textarea  placeholder="Описание..."
                           class="form-control"
                           name="description"
                           id="description">{{ old('description') ?? ($todo->description ?? '') }}</textarea>
            </div>

            <div class="form-group custom-control custom-checkbox">
                <input type="hidden" name="done" value="0">
                <input value="1"
                       type="checkbox"
                       class="custom-control-input"
                       name="done"
                       id="done"
                @if((old('done') ?? ($todo->done ?? false)) == '1') checked @endif>
                <label for="done" class="custom-control-label">Выполнено?</label>
            </div>

            <button type="reset"
                    class="btn btn-outline-secondary"
                    onclick="event.preventDefault(); window.history.back()">
                Отмена миссии!!!
            </button>
            <button class="btn btn-success">{{ $update ? 'Обновить' : 'Добавить' }}</button>

        </form>

    </div>


@endsection
