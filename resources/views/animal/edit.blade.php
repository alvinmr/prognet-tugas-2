@extends('layout.app')

@section('title', 'Animal CRUD')

@section('header', 'Edit animal')

@section('contents')
    <form action="/{{ $animal->id }}/saveedit" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Animal name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $animal->name }}">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="usia" class="form-label">Animal Age</label>
            <input type="number" class="form-control" id="usia" name="usia" value="{{ $animal->usia }}">
            @error('usia')
                {{ $message }}
            @enderror
        </div>

        <div>
            <img src="{{ asset($animal->foto) }}" class="img-thumbnail img-fluid " alt="">
        </div>
        <div class="mb-3 input-group">
            <label for="inputGroupFile02" class="form-label">Animal Photo</label>
            <div class="mb-3 input-group">
                <input name="foto" type="file" class="form-control" id="inputGroupFile02" value="lalal">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            @error('foto')
                {{ $message }}
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Number of Feet</label>
            @foreach ($animal_options_jumlah_kaki as $item)
                <div class="form-check">
                    <input value="{{ $item }}" {{ $item == $animal->jumlah_kaki ? 'checked' : '' }}
                        class="form-check-input" type="radio" id="{{ $item }}" name="jumlah_kaki">
                    <label class="form-check-label" for="{{ $item }}">
                        {{ $item }}
                    </label>
                </div>
            @endforeach
            @error('jumlah_kaki')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Animal Voice</label>
            @foreach ($animal_options_suara as $item)
                <div class="form-check">
                    <input value="{{ $item }}" {{ $item == $animal->suara ? 'checked' : '' }}
                        class="form-check-input" type="radio" id="{{ $item }}" name="suara">
                    <label class="form-check-label" for="{{ $item }}">
                        {{ $item }}
                    </label>
                </div>
            @endforeach
            @error('suara')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Animal description</label>
            <textarea class="form-control" id="description" name="description"
                rows="10">{{ $animal->description }}</textarea>
            @error('description')
                {{ $message }}
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a type="button" class="btn btn-success" href="/">Back</a>
    </form>
@endsection
