<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $singlePost->summary }}">
    {{-- favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="manifest" href="/img/site.webmanifest">
    <link rel="mask-icon" href="/img/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/img/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css"
        integrity="sha512-NVt7pmp5f+3eWRPO1h4A1gCf4opn4r5z2wS1mi7AaVcTzE9wDJ6RzMqSygjDzYHLp+mAJ2/qzXXDHar6IQwddQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @if (env('APP_ENV') == 'production')
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-1FJB860RY7"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-1FJB860RY7', {
                'cookie_domain': 'blog.bellawan.my.id',
                'cookie_flags': 'SameSite=None;Secure'
            });
        </script>
    @endif
    @livewireStyles
</head>
