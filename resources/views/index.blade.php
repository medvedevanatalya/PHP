@extends('layout')

@section('content')

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <div class="card card-body mb-5">
        <form action="{{ route('animals.add') }}" method="POST" class="table">
            @csrf
            <div class="form-group">
                <label for="name">Кличка: </label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="animal">Животное:</label>
                <input type="text" class="form-control" id="animal" name="animal">
            </div>
            <div class="form-group">
                <label for="breed">Порода:</label>
                <input type="text" class="form-control" id="breed" name="breed">
            </div>
            <div class="form-group">
                <label>Пол: </label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="gender_m" name="gender" class="custom-control-input" value="Мужской">
                    <label class="custom-control-label" for="gender_m">Мужской</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="gender_w" name="gender" class="custom-control-input" value="Женский">
                    <label class="custom-control-label" for="gender_w">Женский</label>
                </div>
            </div>
            <div class="form-group">
                <label for="age">Возраст:</label>
                <input type="text" class="form-control" id="age" name="age">
            </div>
            <button class="btn btn-success">Добавить нового питомца</button>
        </form>
    </div>


    <div class="card card-body mb-5">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Кличка</th>
                <th scope="col">Животное</th>
                <th scope="col">Порода</th>
                <th scope="col">Пол</th>
                <th scope="col">Возраст</th>
            </tr>
        </thead>
        <tbody>
        @foreach($animals as $animal)
            <tr>
                <td>{{$animal->name}}</td>
                <td>{{$animal->animal}}</td>
                <td>{{$animal->breed}}</td>
                <td>{{$animal->gender}}</td>
                <td>{{$animal->age}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>
@endsection
