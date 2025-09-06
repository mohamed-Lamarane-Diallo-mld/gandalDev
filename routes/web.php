<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// --------------------------------

// Route de la page d'accueil

Route::get('/', function () {
    return redirect()->route('home');   // Redirection de la racine vers /welcome c'est a dire la page d'accueil c'est important pour le SEO
})->name('welcome');

Route::get('/welcome', function () {    // Page d'accueil 
    $name = "Mohamed lamarane diallo";
    return view('welcome',compact('name')); 
})->name('home');

// --------------------------------

// Route de la page about

Route::get('/about', function () {
    return view('about');
})->name('about');

// --------------------------------

// Route de la page projets
// avec controller

Route::get('/projets', [App\Http\Controllers\projets::class, 'index'])->name('projets');

// --------------------------------

// Route de la page contact

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

Route::post('/contact',[App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');

// --------------------------------
