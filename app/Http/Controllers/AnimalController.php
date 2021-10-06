<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::where('is_delete', '=', 0)->orderBy('name')->paginate(5);
        Paginator::useBootstrap();
        return view('animal.list', compact('animals'));
    }

    public function newanimal()
    {
        $animalEnumJumlahKaki = Animal::getEnumKey('jumlah_kaki');
        $animalEnumSuara = Animal::getEnumKey('suara');
        return view('animal.new', compact('animalEnumJumlahKaki', 'animalEnumSuara'));
    }

    public function savenewanimal(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'foto' => 'required|image',
            'usia' => 'required',
            'jumlah_kaki' => 'required|numeric',
            'suara' => 'required',
            'description' => 'required',
        ]);
        $foto = $request->file('foto');
        $nameFile = date('Ymdhis') . '.' . $foto->extension();
        $path_foto = $foto->storeAs('foto', $nameFile);
        Animal::create([
            'name' => $request->name,
            'usia' => $request->usia,
            'foto' => $path_foto,
            'jumlah_kaki' => $request->jumlah_kaki,
            'suara' => $request->suara,
            'description' => $request->description,
        ]);
        return redirect('/');
    }

    public function animaldetail($id)
    {
        $animalEnumJumlahKaki = Animal::getEnumKey('jumlah_kaki');
        $animalEnumSuara = Animal::getEnumKey('suara');
        $animal = Animal::find($id);
        return view('animal.detail', compact('animal', 'animalEnumJumlahKaki', 'animalEnumSuara'));
    }

    public function animaledit($id)
    {
        $animalEnumJumlahKaki = Animal::getEnumKey('jumlah_kaki');
        $animalEnumSuara = Animal::getEnumKey('suara');
        $animal = Animal::find($id);
        return view('animal.edit', compact('animal', 'animalEnumJumlahKaki', 'animalEnumSuara'));
    }

    public function saveedit(Request $request, $id)
    {
        $request->validate([
            'foto' => 'image',
            'jumlah_kaki' => 'numeric',
        ]);

        $animal = Animal::find($id);
        if ($request->hasFile('foto') && $animal->foto) {
            Storage::delete($animal->foto);
            $nameFile = date('Ymdhis') . '.' . $request->foto->extension();
            $animal->foto = $request->foto->storeAs('foto', $nameFile);
        }
        $animal->name = $request->name;
        $animal->usia = $request->usia;
        $animal->description = $request->description;
        $animal->save();
        return redirect('/');
    }

    public function deleteanimal($id)
    {
        $animal = Animal::find($id);
        $animal->is_delete = 1;
        $animal->save();
        return redirect('/');
    }
}