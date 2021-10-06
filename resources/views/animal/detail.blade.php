@extends('layout.app')

@section('title', 'Animal CRUD')

@section('header', 'Animal details')

@section('contents')
    <div class="mb-3">
        <label for="name" class="form-label">Animal name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $animal->name }}" readonly>
    </div>
    <div class="mb-3">
        <label for="usia" class="form-label">Animal Age</label>
        <input type="number" class="form-control" id="usia" name="usia" value="{{ $animal->usia }}" readonly>
    </div>

    <div class="mb-3 ">
        <p>Animal Photo</p>
        <img src="{{ asset($animal->foto) }}" class="img-fluid">
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Number of Feet</label>
        @foreach ($animalEnumJumlahKaki as $item)
            <div class="form-check">
                <input disabled value="{{ $item }}" {{ $item == $animal->jumlah_kaki ? 'checked' : '' }}
                    class="form-check-input" type="radio" id="{{ $item }}" name="jumlah_kaki">
                <label class="form-check-label" for="{{ $item }}">
                    {{ $item }}
                </label>
            </div>
        @endforeach
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Animal Voice</label>
        @foreach ($animalEnumSuara as $item)
            <div class="form-check">
                <input disabled value="{{ $item }}" {{ $item == $animal->suara ? 'checked' : '' }}
                    class="form-check-input" type="radio" id="{{ $item }}" name="suara">
                <label class="form-check-label" for="{{ $item }}">
                    {{ $item }}
                </label>
            </div>
        @endforeach
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Animal description</label>
        <textarea class="form-control" id="description" name="description" rows="10"
            readonly>{{ $animal->description }}</textarea>
    </div>
    <a type="button" class="btn btn-success" href="/">Back</a>
@endsection
