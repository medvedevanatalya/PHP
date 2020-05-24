@if($errors->any())
    <ul style="color: red;">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('animals.add') }}" method="POST">
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
        <label for="gender">Пол:</label>
        <input type="text" class="form-control" id="gender" name="gender">
    </div>
    <div class="form-group">
        <label for="age">Возраст:</label>
        <input type="text" class="form-control" id="age" name="age">
    </div>
    <button>Добавить нового питомца</button>
</form>

<table border="1">
    <thead>
        <tr>
            <th>Кличка</th>
            <th>Животное</th>
            <th>Порода</th>
            <th>Пол</th>
            <th>Возраст</th>
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
