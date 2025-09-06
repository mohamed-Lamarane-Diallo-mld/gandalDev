@extends('layouts.app')

@section('title', 'Services')

@section('content')
<div class="container mt-5">
    <a href="{{ route('home')}}"><span class="btn btn-outline-dark"><i class='bi bi-arrow-left rounded-circle'></i> ← </span></a>
    <h1>Listes de nos Projets</h1>
    <p class="mt-3">Voici quelques exemples de projets que nous avons réalisés pour nos clients :</p>

    <div class="d-flex flex-wrap justify-content-center gap-4">
        <x-projets image="/images/logo0.png" titre="Projet 1" github="https://github.com/mohamed-Lamarane-Diallo-mld/AutoGestion"/>
        <x-projets image="/images/logo1.png" titre="Projet 2" github="https://github.com/mohamed-Lamarane-Diallo-mld/AutoGestion"/>
         <x-projets image="/images/logo2.svg" titre="Projet 1" github="https://github.com/mohamed-Lamarane-Diallo-mld/AutoGestion"/>
        <x-projets image="/images/logo3.svg" titre="Projet 2" github="https://github.com/mohamed-Lamarane-Diallo-mld/AutoGestion"/>
    </div>
    
</div>
@endsection
