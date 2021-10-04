@extends('layout.app')

@section('title', 'Animal CRUD')

@section('header', 'Animal lists')

@section('contents')
    <a type="button" class="btn btn-primary" href="/new">Add new animal</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Animal name</th>
                <th scope="col">Animal Photo</th>
                <th scope="col">Animal Legs</th>
                <th scope="col">Animal Sound</th>
                <th scope="col">Animal description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animals as $animal)
                <tr>
                    <th scope="row">{{ $loop->index + 1 + ($animals->currentPage() - 1) * 5 }}</th>
                    <td>{{ $animal->name }}</td>
                    <td>
                        <img class="img-fluid" src="{{ $animal->foto }}">
                    </td>
                    <td>{{ $animal->jumlah_kaki }}</td>
                    <td>{{ $animal->suara }}</td>
                    <td>{{ Str::limit($animal->description, 100) }}</td>
                    <td>
                        <form action="/{{ $animal->id }}/delete" method="POST">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @csrf
                                <a type="button" class="btn btn-success" href="/{{ $animal->id }}/detail">Details</a>
                                <a type="button" class="btn btn-primary" href="/{{ $animal->id }}/edit">Edit</a>
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('apakah kamu yakin menghapus data ini ?')">Delete</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $animals->links() }}

@endsection
