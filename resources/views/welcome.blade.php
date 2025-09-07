@extends('layouts.app')

@section('title', 'Accueil Portfolio')

@section('content')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
    }

    .profile-image-container {
        width: 200px;
        height: 200px;
        margin: 0 auto;
        border-radius: 50%;
        overflow: hidden;
        position: relative;
        /* Changé pour correspondre à la couleur verte du logo */
        border: 5px solid #2196F3;
        /* Changé pour une ombre plus subtile et proche du logo */
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .profile-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .card {
        border-radius: 15px;
        background-color: #ffffff;
    }

    /* Changé pour la couleur bleue du logo */
    .h4.text-success {
        color: #2196F3 !important;
    }

    .highlight-text {
        /* Changé pour un fond plus proche du bleu du logo */
        background-color: #E3F2FD;
        padding: 2px 8px;
        border-radius: 5px;
        /* Changé pour la couleur bleue du logo */
        color: #2196F3;
    }

    .social-icons .social-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #f0f0f0;
        color: #333;
        font-size: 1.2rem;
        margin-right: 10px;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .social-icons .social-icon:hover {
        /* Changé pour la couleur verte du logo */
        background-color: #2196F3;
        color: #fff;
        transform: translateY(-3px);
    }

    .download-cv-btn {
        /* Changé pour la couleur verte du logo */
        background-color: #4CAF50;
        border-color: #4CAF50;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .download-cv-btn:hover {
        /* Changé pour un vert plus foncé au survol */
        background-color: #388E3C;
        border-color: #388E3C;
    }
</style>
<div class="container-fluid bg-light d-flex align-items-center justify-content-center min-vh-100 mt-4">
    <div class="card shadow-lg p-4" style="max-width: 900px; width: 100%;">
        <div class="row g-4 align-items-center">
            <div class="col-md-4 text-center">
                <div class="profile-image-container mb-3">
                    <img src="/images/moi.png" alt="Mohamed Lamarane diallo" class="img-fluid rounded-circle profile-img">
                </div>
            </div>
            <div class="col-md-8">
                <p class="mb-1 text-muted">Hello, Myself</p>
                <h1 class="display-4 fw-bold mb-2">Mohamed lamarane Diallo</h1>
                <h2 class="h4 text-success mb-3">And I'm a <span id="job-title" class="highlight-text">Ai Developer</span></h2>
                <p class="text-secondary">
                    Je suis un développeur passionné par le développement web full-stack et les technologies de l’information. 
                    Je possède des compétences en JavaScript, PHP, Java, ainsi qu’en administration Linux et Windows. 
                    Je suis également impliqué dans des projets collaboratifs et des activités de clubs informatiques, 
                    où je contribue activement et partage mes connaissances.

                </p>
                
                <div class="social-icons mb-4">
                    <a href="https://www.linkedin.com/in/mohamed-lamarane-diallo-9434162a3/" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://github.com/mohamed-Lamarane-Diallo-mld" class="social-icon"><i class="fab fa-github"></i></a>
                    <a href="https://www.facebook.com/lama.lodia?locale=fr_FR" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                </div>
        
                <a href="{{ asset('CV-Mohamed Lamarane DALLO.pdf') }}" download="CV-Mohamed Lamarane DALLO.pdf" class="btn btn-primary">
                    Télécharger mon CV
                </a>
            </div>
        </div>
    </div>
</div>  
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const jobTitles = ["Blockchain Developer", "Web Developer", "UI/UX Designer", "Software Engineer"];
        let currentJobIndex = 0;
        const jobTitleElement = document.getElementById('job-title');

        function animateJobTitle() {
            jobTitleElement.style.opacity = 0;
            setTimeout(() => {
                currentJobIndex = (currentJobIndex + 1) % jobTitles.length;
                jobTitleElement.textContent = jobTitles[currentJobIndex];
                jobTitleElement.style.opacity = 1;
            }, 500);
        }

        setInterval(animateJobTitle, 3000);

        const downloadCvButton = document.querySelector('.download-cv-btn');
        downloadCvButton.addEventListener('click', () => {
            alert('Downloading CV... (This is a placeholder action)');
        });
    });
</script>
@endsection
