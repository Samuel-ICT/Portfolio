<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class ProductController extends Controller
{
    // Functie voor het weergeven van alle producten en trending producten
    public function index()
    {
        $product = Product::all();
        $trending = Product::where('trending', 1)->get();
        return view('admin.product.index', compact('product', 'trending'));
    }

    // Functie voor het weergeven van het formulier voor het toevoegen van een product
    public function toevoegen()
    {
        $categorie = Category::all();
        return view('admin.product.toevoegen', compact('categorie'));
    }

    // Functie voor het opslaan van een nieuw product
    public function opslaan(Request $request)
    {
        // Validatie van de invoervelden
        $request->validate([
            'naam' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'merk' => ['required', 'string'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'categorie' => ['required', 'string'],
            'hoeveelheid' => ['required', 'integer'],
            'prijs' => ['required', 'integer'],
            "korting_prijs" => ['nullable'],
            'trending' => ['nullable'],
            'beschrijving' => ['required', 'string'],
        ]);

        // Aanmaken van een nieuw product
        $product = new Product([
            'naam' => $request->get('naam'),
            'slug' => $request->get('slug'),
            'merk' => $request->get('merk'),
            'beschrijving' => $request->get('beschrijving'),
            'categorie' => $request->get('categorie'),
            'hoeveelheid' => $request->get('hoeveelheid'),
            'prijs' => $request->get('prijs'),
            'korting_prijs' => $request->get('korting_prijs'),
            'trending' => $request->has('trending') && $request->input('trending') === 'on' ? 1 : 0,
        ]);

        // Opslaan van de nieuwe foto (indien aanwezig)
        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                $foto = $request->file('foto');
                $fotonaam = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move('product', $fotonaam);
                $product->foto = $fotonaam;
            } else {
                return redirect()->back()->withErrors(['message' => 'Ongeldige foto.']);
            }
        }

        // Opslaan van het nieuwe product
        $product->save();

        // Doorsturen naar de productlijst met een succesbericht
        return redirect('admin/product')->with('message', 'Product succesvol toegevoegd');
    }

    // Functie voor het weergeven van het bewerkformulier voor een product
    public function bewerken($id)
    {
        $product = Product::find($id);
        $categorie = Category::all();
        return view('admin.product.bewerken', ['product' => $product, 'categorie' => $categorie]);
    }

    // Functie voor het verwijderen van een product
    public function verwijderen($id)
    {
        $product = Product::find($id);
        $product->delete();

        // Doorsturen naar de productlijst met een succesbericht
        return redirect('admin/product')->with('message', 'Product succesvol verwijderd');
    }

    // Functie voor het bijwerken van een product
    public function updaten(Request $request, $id)
    {
        // Validatie van de invoervelden
        $request->validate([
            'naam' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'merk' => ['required', 'string'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'categorie' => ['required', 'string'],
            'hoeveelheid' => ['required', 'integer'],
            'prijs' => ['required', 'integer'],
            "korting_prijs" => ['nullable'],
            'trending' => ['nullable'],
            'beschrijving' => ['required', 'string'],
        ]);

        // Zoeken naar het te bewerken product in de database
        $product = Product::find($id);

        // Bijwerken van de productgegevens
        $product->naam = $request->get('naam');
        $product->slug = $request->get('slug');
        $product->merk = $request->get('merk');
        $product->categorie = $request->get('categorie');
        $product->hoeveelheid = $request->get('hoeveelheid');
        $product->prijs = $request->get('prijs');
        $product->korting_prijs = $request->get('korting_prijs');
        $product->trending = $request->has('trending') ? 1 : 0;
        $product->beschrijving = $request->get('beschrijving');

        // Opslaan van de bijgewerkte foto (indien aanwezig)
        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                $foto = $request->file('foto');
                $fotonaam = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move('product', $fotonaam);
                $product->foto = $fotonaam;
            } else {
                return redirect()->back()->withErrors(['message' => 'Ongeldige foto.']);
            }
        }

        // Opslaan van het bijgewerkte product
        $product->save();

        // Doorsturen naar de productlijst met een succesbericht
        return redirect('admin/product')->with('message', 'Product succesvol geüpdatet');
    }
}