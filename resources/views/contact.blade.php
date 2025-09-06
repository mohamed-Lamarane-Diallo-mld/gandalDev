@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div class="container mt-5">
        <a href="{{ route('home')}}">
            <span class="btn btn-outline-dark">
                <i class='bi bi-arrow-left rounded-circle'></i> ←
            </span>
        </a>
        <div class="text-center">
            <h1>Contactez-nous </h1>
            <img src="/gif/tele.gif" alt="..." class="img-fluid" style="max-height: 200px;">
        </div>
        <form class="mt-3" method="POST"  action="{{ url('/contact') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" placeholder="Votre nom" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse Email</label>
                <input type="email" class="form-control" id="email" placeholder="Votre email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="4" placeholder="Votre message" name="message" aria-valuetext="{{ old('message') }}"></textarea>
                @error('message')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" name="send">Envoyer</button>
        </form><br>
        @if (isset($valid))
            @if ($valid)
                <x-alert type="success" class="mt-3" :message="'succès !'"/>
            @else
                <x-alert type="danger" class="mt-3" :message="'Erreur lors de l\'envoi du message ,tout les champs sont requisent'"/>
            @endif
        @endif
    </div>

@endsection
