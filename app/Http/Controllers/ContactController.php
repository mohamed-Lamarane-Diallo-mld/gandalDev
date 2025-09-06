<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    // Afficher le formulaire
    public function index()
    {
        return view('contact');
    }

    // Soumettre le formulaire
    public function submit(Request $request)
    {
        // Validation
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
        try{
             // Envoyer le mail
            Mail::to('mohamedlamarane.diallo@uadb.edu.sn')->send(new ContactMail($data));

            // Indiquer que l'envoi a réussi
            $valid = true;
        }catch(\Exception $e){
            // Indiquer que l'envoi a échoué
            $valid = false;
        }
       

        // Retourner la vue avec la variable $valid
        return view('contact', compact('valid', 'data'));
    }
}
