@extends('layouts.app')

@section('title', 'À propos')

@section('content')
<div class="container mt-5">
    <a href="{{ route('home')}}"><span class="btn btn-outline-dark"><i class='bi bi-arrow-left rounded-circle'></i> ← </span></a>

    <h1 class="pt-4">À propos</h1>
    <div class="mt-3 border p-3 rounded bg-light">
        <p class="mt-3">
            Je m’appelle Mohamed Lamarane Diallo, étudiant en Développement d’Applications et Administration (D2A) à l’Université Alioune Diop de Bambey (UADB). Passionné par les technologies du web 💻 et les systèmes informatiques 🖥️, je développe des compétences solides en programmation (JavaScript ⚡, PHP 🐘, Java ☕, C 🔢), en administration des systèmes (Linux 🐧, Windows Server 🪟) ainsi qu’en réseaux et cloud computing ☁️🔐.

            Mon objectif est de devenir Développeur Full-Stack 🚀, capable de concevoir et gérer aussi bien la partie front-end 🎨 que la partie back-end ⚙️ des applications. Je m’intéresse également à la sécurité informatique 🔒 et à l’optimisation des performances ⚡ des projets que je réalise.

            En parallèle de mes études 🎓, je participe activement aux activités du club informatique UTC 🤝, où je contribue à des projets collaboratifs 💡, à l’organisation de webinaires 🎤 et à la mise en place d’initiatives innovantes autour du numérique 🌍.
        </p>
    </div>
    <div class="mt-3 border p-3 rounded bg-light">
        <p class="mt-3"> 🔑 Compétences principales : </p>
        <ul class="list-group list-group-flush text-start ">
            <li class="m-3">🌐 Développement Web (HTML, CSS, JavaScript, PHP, Laravel, Spring Boot)</li>
            <li class="m-3">☕ Programmation orientée objet (Java, JavaFx, C)</li>
            <li class="m-3">🐧 Administration Linux & 🪟 Windows</li>
            <li class="m-3">☁️ Réseaux et Cloud Computing (Docker, sécurité du cloud)</li>
            <li class="m-3">🤝 Gestion de projets collaboratifs et veille technologique</li>  
        </ul>
    </div>
    <div class="mt-3 border p-3 rounded bg-light p-3">
        <p>🌍 Ouvert aux nouvelles opportunités✨, je cherche à évoluer dans un environnement stimulant où je pourrai mettre en pratique mes compétences et continuer à apprendre 📚.</p>  
        <p>📫 N’hésitez pas à me contacter pour toute collaboration ou opportunité professionnelle ! <a href="{{ route('contact') }}">ici</a></p>
    </div>
</p>
</div>
@endsection
