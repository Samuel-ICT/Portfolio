<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorieController extends Controller
{
    // Functie voor het weergeven van alle categorieën
    public function index()
    {
        $data = Category::all();
        return view('admin.categorie.index', compact('data'));
    }

    // Functie voor het weergeven van het formulier voor het toevoegen van een categorie
    public function toevoegen()
    {
        return view('admin.categorie.toevoegen');
    }

    // Functie voor het opslaan van een nieuwe categorie
    public function opslaan(Request $request)
    {
        // Validatie van de invoervelden
        $request->validate([
            'naam' => ['required', 'string'],
            'slug' => ['required', 'string'],
        ]);

        // Aanmaken van een nieuwe categorie
        $categorie = new Category([
            'naam' => $request->get('naam'),
            'slug' => Str::slug($request->get('slug')),
        ]);

        // Opslaan van de nieuwe categorie
        $categorie->save();

        // Doorsturen naar de categorieënlijst met een succesbericht
        return redirect('admin/categorie')->with('message', 'Categorie succesvol toegevoegd');
    }

    // Functie voor het verwijderen van een categorie
    public function verwijderen($id)
    {
        $data = Category::find($id);
        $data->delete();

        // Doorsturen naar de categorieënlijst met een succesbericht
        return redirect('admin/categorie')->with('message', 'Categorie succesvol verwijderd');
    }

    // Functie voor het weergeven van het bewerkformulier voor een categorie
    public function bewerken($id)
    {
        $data = Category::find($id);
        return view('admin.categorie.bewerken', ['data' => $data]);
    }

    // Functie voor het bijwerken van een categorie
    public function updaten(Request $request, $id)
    {
        // Validatie van de invoervelden
        $request->validate([
            'naam' => ['required', 'string'],
            'slug' => ['required', 'string'],
        ]);

        // Zoeken naar de categorie in de database
        $data = Category::find($id);

        // Bijwerken van de categoriegegevens
        $data->naam = $request->get('naam');
        $data->slug = $request->get('slug');
        $data->save();

        // Doorsturen naar de categorieënlijst met een succesbericht
        return redirect('admin/categorie')->with('message', 'Categorie succesvol geüpdatet');
    }
}