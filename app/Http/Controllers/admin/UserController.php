<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        // Haal alle gebruikers op uit de database
        $users = User::all();

        // Retourneer de weergave met de lijst van gebruikers
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Verwijder een gebruiker op basis van de gebruikers-ID.
     *
     * @param  int $userId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verwijderen($userId)
    {
        // Zoek de gebruiker op basis van de meegegeven gebruikers-ID
        $user = User::find($userId);

        // Controleer of de gebruiker gevonden is
        if (!$user) {
            // Geef een foutmelding en leid de gebruiker terug naar de lijst van gebruikers
            return redirect('admin/users')->with('error', 'Gebruiker niet gevonden');
        }

        try {
            // Probeer de gevonden gebruiker te verwijderen
            $user->delete();

            // Als verwijderen gelukt is, geef een succesmelding en leid de gebruiker terug naar de lijst van gebruikers
            return redirect('admin/users')->with('message', 'Gebruiker succesvol verwijderd');
        } catch (\Exception $e) {
            // Als er een fout optreedt tijdens het verwijderen, geef een foutmelding en leid de gebruiker terug naar de lijst van gebruikers
            return redirect('admin/users')->with('error', 'Er is een fout opgetreden bij het verwijderen van de gebruiker');
        }
    }
}
