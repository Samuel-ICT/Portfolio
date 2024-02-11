<?php

namespace App\Http\Controllers\admin;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function berichten()
    {
        // Haal alle contactberichten op uit de database
        $berichten = Contact::all();

        // Retourneer de weergave met de lijst van contactberichten
        return view('admin.contact.index', ['berichten' => $berichten]);
    }

    /**
     * Verwijder een contactbericht op basis van het bericht-ID.
     *
     * @param  int $berichtId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verwijderen($berichtId)
    {
        // Zoek het contactbericht op basis van het meegegeven bericht-ID
        $bericht = Contact::find($berichtId);

        // Controleer of het bericht gevonden is
        if (!$bericht) {
            // Geef een foutmelding en leid de gebruiker terug naar de lijst van contactberichten
            return redirect('admin/contact')->with('error', 'Contactbericht niet gevonden');
        }

        try {
            // Probeer het gevonden contactbericht te verwijderen
            $bericht->delete();

            // Als verwijderen gelukt is, geef een succesmelding en leid de gebruiker terug naar de lijst van contactberichten
            return redirect('admin/contact')->with('message', 'Contactbericht succesvol verwijderd');
        } catch (\Exception $e) {
            // Als er een fout optreedt tijdens het verwijderen, geef een foutmelding en leid de gebruiker terug naar de lijst van contactberichten
            return redirect('admin/contact')->with('error', 'Er is een fout opgetreden bij het verwijderen van het contactbericht');
        }
    }

}
