<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Eric Blogs - Exploring the World' }}</title>
    <meta name="description" content="Eric Blogs - Your ultimate travel companion. Discover breathtaking destinations, travel tips, and inspiring stories from around the globe.">
    {{-- favicon --}}
    <style>
        .fixed-size {
            width: 220px;
            height: 220px;
            object-fit: cover; /* Ensures the image maintains proportions without distortion */
        }
        header#navbar{
            background:#ffff
        }
        /* Default (Desktop) */
/* Carousel styling */
.carousel img {
    width: 100%;
    height: 500px; /* Set the height for desktop */
    object-fit: cover; /* Ensure the image covers the container without distortion */
    position: relative;
}

.carousel-caption {
    position: absolute;
    bottom: 20%;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    color: #fff;
    background: rgba(0, 0, 0, 0.5); /* Add a semi-transparent black background */
    padding: 15px 30px;
    border-radius: 8px;
    max-width: 60%;
}

.carousel-caption h3 {
    font-size: 2rem;
    font-weight: bold;
}

.carousel-caption p {
    font-size: 1rem;
}

/* Adjustments for smaller screens */
@media (max-width: 768px) {
    .carousel img {
        height: 400px;
    }

    .carousel-caption {
        bottom: 10%;
        max-width: 80%;
    }

    .carousel-caption h3 {
        font-size: 1.5rem;
    }

    .carousel-caption p {
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .carousel img {
        height: 300px;
    }

    .carousel-caption h3 {
        font-size: 1.2rem;
    }

    .carousel-caption p {
        font-size: 0.8rem;
    }
}

    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @if (env('APP_ENV') == 'production')
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-1FJB860RY7"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-1FJB860RY7', {
                'cookie_domain': 'localhost:8000',
                'cookie_flags': 'SameSite=None;Secure'
            });
        </script>
    @endif --}}
    @livewireStyles
</head>
