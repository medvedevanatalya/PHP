<?php
$update = isset($animal);
?>

@extends('layouts.app')

@section('content')

    <h2 class="mb-3">{{ $update ? "Редактировать карту: {$animal->name}" : 'Новая карта животного'}}</h2>

    <div class="card card-body mb-5">
        <form action="{{ $update ? route('animals.update', $animal) : route('animals.store') }}" method="POST" class="table">
            @csrf
            @if($update)
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="name">Кличка<span class="text-danger">*</span></label>
                <input type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       id="name"
                       name="name"
                       placeholder="Кличка..."
                       value="{{ old('name') ?? ( $animal->name ?? '') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="animal">Животное<span class="text-danger">*</span></label>
                <input type="text"
                       class="form-control @error('animal') is-invalid @enderror"
                       id="animal"
                       name="animal"
                       placeholder="Животное..."
                       value="{{ old('animal') ?? ( $animal->animal ?? '') }}">
                @error('animal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="breed">Порода</label>
                <input type="text"
                       class="form-control"
                       id="breed"
                       name="breed"
                placeholder="Порода..."
                value="{{ old('breed') ?? ($animal->breed ?? '') }}">
            </div>

            <div class="form-group">
                <label>Пол<span class="text-danger">*</span></label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio"
                           id="gender_m"
                           name="gender"
                           class="custom-control-input"
                           value="Мужской"
                           @if( (old('gender') ?? ($animal->gender ?? 'Женский') == 'Мужской' )) checked @endif>
                    <label class="custom-control-label" for="gender_m">Мужской</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio"
                           id="gender_w"
                           name="gender"
                           class="custom-control-input"
                           value="Женский"
                           @if((old('gender') ?? ($animal->gender ?? 'Мужской') == 'Женский' )) checked @endif>
                    <label class="custom-control-label" for="gender_w">Женский</label>
                </div>
            </div>

            <div class="form-group">
                <label for="age">Возраст:</label>
                <input type="number"
                       class="form-control"
                       id="age"
                       name="age"
                       placeholder="Возраст..."
                       value="{{ old('age') ?? ($animal->age ?? '') }}">
            </div>

            <div class="form-group">
                <label for="description">Описание:</label>
                <textarea placeholder="Описание..."
                          class="form-control"
                          id="description"
                          name="description">{{ old('description') ?? ($animal->description ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label for="additional_info">Дополнительная информация:</label>
                <textarea placeholder="Дополнительная информация..."
                          class="form-control"
                          id="additional_info"
                          name="additional_info">{{ old('additional_info') ?? ($animal->additional_info ?? '') }}</textarea>
            </div>
            <button class="btn btn-success">{{ $update ? 'Обновить карту животного' : 'Добавить новую карту животного' }}</button>
        </form>
    </div>

@endsection
