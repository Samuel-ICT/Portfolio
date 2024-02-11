<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Product;

use App\Models\Kart;

use Illuminate\Support\Facades\Auth;

use Illuminate\Pagination\Paginator;


class HomeController extends Controller
{
    // Functie om te bepalen waar de gebruiker wordt doorgestuurd op basis van het gebruikerstype
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            // Als het gebruikerstype 1 is, stuur de gebruiker naar de admin homepagina
            return view('admin.home');
        } else {
            // Anders, laad productgegevens en stuur de gebruiker naar de reguliere homepage
            $product = Product::all();
            $trending = Product::where('trending', 1)->get();
            $nieuw =  Product::orderBy('created_at', 'desc')->take(8)->get();
            return view('home.homepage', compact('product', 'trending', 'nieuw'));
        }
    }

    // Functie voor het weergeven van de reguliere homepage
    public function index()
    {
        $product = Product::all();
        $trending = Product::where('trending', 1)->get();
        $nieuw =  Product::orderBy('created_at', 'desc')->take(8)->get();
        return view('home.homepage', compact('product', 'trending', 'nieuw'));
    }

    // Functies voor het weergeven van verschillende pagina's
    public function over_ons()
    {
        return view('home.overons');
    }

    public function privacy()
    {
        return view('home.privacy');
    }

    public function voorwaarden()
    {
        return view('home.voorwaarden');
    }

    public function contact()
    {
        return view('home.contact');
    }

    // Functie voor het opslaan van contactformulierinformatie
    public function opslaan(Request $request)
    {
        $contact = new Contact([
            'email' => $request->get('email'),
            'onderwerp' => $request->get('onderwerp'),
            'bericht' => $request->get('bericht'),
        ]);
        $contact->save();
        return redirect('/contact')->with('message', 'Uw bericht is succesvol verstuurd, wij zullen zo snel mogelijk contact met u opnemen');
    }

    // Functie voor het weergeven van alle producten
    public function alle_producten()
    {
        $producten = Product::all();
        return view('home.producten', ['producten' => $producten]);
    }

    // Functies voor het weergeven van producten op basis van categorieën
    public function heren()
    {
        $heren = Product::where('categorie', 'heren')->paginate(20);
        return view('home.heren', compact('heren'));
    }

    public function dames()
    {
        $dames = Product::where('categorie', 'dames')->paginate(20);
        return view('home.dames', compact('dames'));
    }

    public function kids()
    {
        $kids = Product::where('categorie', 'kids')->paginate(20);
        return view('home.kids', compact('kids'));
    }

    // Functie voor het weergeven van individueel product op basis van slug
    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('home.product', compact('product'));
    }

    // Functie voor het toevoegen van een product aan de winkelwagen
    public function kart(Request $request, $id)
    {
        if (Auth::id()) {
            $gebruiker = Auth::user();
            $product = Product::find($id);

            $kart = new Kart([
                'naam' => $gebruiker->name,
                'email' => $gebruiker->email,
                'telefoon_nummer' => $gebruiker->phone_number,
                'adres' => $gebruiker->address,
                'gebruikers_id' => $gebruiker->id,
                'product_naam' => $product->naam,
                'foto' => $product->foto,
                'product_id' => $product->id,
                'aantal' => $request->aantal
            ]);

            if ($product->korting_prijs != null) {
                $kart->prijs = $product->korting_prijs * $request->aantal;
            } else {
                $kart->prijs = $product->prijs * $request->aantal;
            }

            $kart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    // Functie voor het weergeven van de winkelwagenoverzichtspagina
    public function kart_overzicht()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $kart = Kart::where('gebruikers_id', '=', $id)->get();
            return view('home.kartoverzicht', compact('kart'));
        } else {
            return redirect('login');
        }
    }

    // Functie voor het verwijderen van een product uit de winkelwagen
    public function verwijder_product($id)
    {
        $kart = Kart::find($id);
        $kart->delete();
        return redirect()->back();
    }
}
