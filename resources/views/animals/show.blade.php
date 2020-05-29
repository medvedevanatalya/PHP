@extends('layouts.app')

@section('content')

    <div class="d-flex align-items-center flex-wrap">
        <h1>
            {{$animal->name}}
{{--            @if($todo->isComplete())--}}
{{--                <span class="badge badge-success">--}}
{{--                    Выполнено--}}
{{--                </span>--}}
{{--            @endif--}}
        </h1>

        <form class="ml-auto" action="{{ route('animals.destroy', $animal) }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="btn-group">
                @can('update', $animal)
                    <a href="{{ route('animals.edit', $animal) }}" class="btn btn-info">
                        Редактировать
                    </a>
                @endcan
                @can('update', $animal)
                        <button class="btn btn-danger">
                            Удалить
                        </button>
                @endcan
            </div>

        </form>
    </div>

    <div class="lead text-muted">
        {{ $animal->user->name }},
        {{ $animal->created_at->diffForHumans( now() ) }}
    </div>

    <div class="mb-3"></div>

    <div class="card card-body">
        <p class="lead mb-0">Вид животного: {{ $animal->animal }}</p>
        <p class="lead mb-0">Порода: {{ $animal->breed }}</p>
        <p class="lead mb-0">Пол: {{ $animal->gender }}</p>
        <p class="lead mb-0">Возраст: {{ $animal->age }} г. </p>
        <p class="lead mb-0">Описание: {{ $animal->description }}</p>
        <p class="lead mb-0">Дополнительная информация: {{ $animal->additional_info }}</p>
    </div>
@endsection
