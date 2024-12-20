<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
    <title>Dashboard | Eric Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @if (Request::is('dashboard/posts/*'))
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endif
    @livewireStyles
</head>

<body>
