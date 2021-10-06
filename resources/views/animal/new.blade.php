@extends('layout.app')

@section('title', 'Animal CRUD')

@section('header', 'Add new animal')

@section('contents')
    <form action="{{ route('save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Animal name</label>
            <input type="text" class="form-control  @error('name') is-valid @enderror" id="name" name="name">
            @error('name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="usia" class="form-label">Animal Age</label>
            <input type="number" class="form-control @error('usia') is-invalid @enderror " id="usia" name="usia">
            @error('usia')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3 input-group">
            <label for="inputGroupFile02" class="form-label">Animal Photo</label>
            <div class="mb-3 input-group">
                <input name="foto" type="file" class="form-control @error('foto') is-invalid @enderror "
                    id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            @error('foto')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Number of Feet</label>
            @foreach ($animalEnumJumlahKaki as $item)
                <div class="form-check">
                    <input value="{{ $item }}" class="form-check-input" type="radio" id="{{ $item }}"
                        name="jumlah_kaki">
                    <label class="form-check-label" for="{{ $item }}">
                        {{ $item }}
                    </label>
                </div>
            @endforeach
            @error('jumlah_kaki')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Animal Voice</label>
            @foreach ($animalEnumSuara as $item)
                <div class="form-check">
                    <input value="{{ $item }}" class="form-check-input" type="radio" id="{{ $item }}"
                        name="suara">
                    <label class="form-check-label" for="{{ $item }}">
                        {{ $item }}
                    </label>
                </div>
            @endforeach
            @error('suara')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Animal description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                rows="10"></textarea>
            @error('description')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a type="button" class="btn btn-success" href="/">Back</a>
    </form>
@endsection
