@extends('layouts.app')

@section('content')

    <div class="d-flex align-items-center mb-3">
{{--        <h1>{{ $user->name }}</h1>--}}
        <a href="{{ route('animals.create') }}" class="ml-auto btn btn-success">
            Добавить карту нового животного
        </a>
    </div>

        @forelse($animals as $animal)

            @if($loop->first)
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th scope="col">Кличка</th>
                            <th scope="col">Животное</th>
                            <th scope="col">Пол</th>
                            <th scope="col">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
            @endif
                        <tr>
                            <td class="p-2 text-center">{{ $animal->id }}</td>
                            <td class="p-2">
                                <a href="{{ route('animals.show', $animal) }}"
                                   class="d-block p-2 w-100">
                                    {{ $animal->name }}
                                </a>
                            </td>
                            <td class="p-2">{{ $animal->animal }}</td>
                            <td class="p-2">{{ $animal->gender }}</td>
                            <td>
                                <form class="ml-auto" action="{{ route('animals.destroy', $animal) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <div class="btn-group btn-group-sm">
                                        @can('update', $animal)
                                            <a class="btn btn-info" href="{{ route('animals.edit', $animal) }}">
                                                Редактировать
                                            </a>
                                        @endcan
                                        @can('delete', $animal)
                                             <button class="btn btn-danger">
                                                 Удалить
                                             </button>
                                        @endcan
                                    </div>
                                </form>
                            </td>
                        </tr>

            @if($loop->last)
                    </tbody>
                </table>
            @endif

            @empty
                <div class="alert alert-secondary">
                    У Вас пока нет ни одной карты животного :(
                </div>

        @endforelse

    {{ $animals->links() }}
@endsection
