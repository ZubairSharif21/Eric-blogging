@extends('layouts.blog.main')

@section('content')
    @if (session()->has('successUpdate'))
        <div x-data="{ show: true }" x-show="show" x-effect="setTimeout(() => show = false, 3000)"
            class="fixed left-0 top-[90px] z-[10] flex w-full justify-center">
            <div id="alert-success-update"
                class="mx-4 flex w-1/2 items-center rounded-lg bg-green-100 px-4 py-5 text-green-800 dark:bg-gray-800 dark:text-green-400">
                <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('successUpdate') }}
                </div>
                <button type="button" @click="show = false"
                    class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-green-50 p-1.5 text-green-500 hover:bg-green-200 focus:ring-2 focus:ring-green-400 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    @elseif(session()->has('loginError'))
        <div x-data="{ show: true }" x-show="show" x-effect="setTimeout(() => show = false, 3000)"
            class="fixed left-0 top-[90px] z-[101] flex w-full justify-center">
            <div id="alert-success-update"
                class="mx-4 flex w-1/2 items-center rounded-lg bg-red-50 px-4 py-5 text-red-800 dark:bg-gray-800 dark:text-green-400">
                <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('loginError') }}
                </div>
                <button type="button" @click="show = false"
                    class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 p-1.5 text-red-500 hover:bg-red-200 focus:ring-2 focus:ring-red-400"
                    aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    <main class="pb-16 antialiased dark:bg-gray-900 lg:pb-24">
        <div class="mx-auto flex max-w-screen-xl justify-between px-4">
            <article class="mx-auto w-full max-w-3xl">
                <header class="not-format mb-4 lg:mb-6">
                    <address class="mb-6 flex items-center not-italic">
                        <div class="mr-3 inline-flex items-center text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 h-16 w-16 rounded-full"
                                src="{{ $singlePost->user->details ? ($singlePost->user->details->profile_pic ? env('AWS_URL') . $singlePost->user->details->profile_pic : asset('img/user_photo.png')) : asset('img/user_photo.png') }}"
                                alt="{{ $singlePost->user->name }}">
                            <div>
                                <a href="#" rel="author" class="text-xl text-gray-900 dark:text-white">By
                                    <span class="indent-1 font-bold">{{ $singlePost->user->name }}</span></a>
                                <p class="text-base text-gray-500 dark:text-gray-400">
                                    {{ $singlePost->user->details->tagline ?? '' }}</p>
                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                                        datetime="{{ Carbon\Carbon::parse($singlePost->published_at)->format('Y-m-d') }}"
                                        title="{{ Carbon\Carbon::parse($singlePost->published_at)->format('F jS, Y') }}">Published
                                        on {{ Carbon\Carbon::parse($singlePost->published_at)->format('M. j, Y') }}</time>
                                </p>
                            </div>
                        </div>
                    </address>
                    <a href="{{ route('blog.category', ['category' => $singlePost->category->slug]) }}">
                        <span
                            class="inline-flex items-center gap-1 rounded bg-primary-100 px-2.5 py-1 text-primary-800 dark:bg-primary-200 dark:text-primary-800">

                            {!! $singlePost->category->icon !!}
                            <span class="text-xs font-medium">{{ $singlePost->category->name }}</span>
                        </span>
                    </a>
                    <h1 class="mb-1 mt-2 text-3xl font-extrabold leading-tight text-gray-900 dark:text-white lg:text-4xl">
                        {{ $singlePost->title }}</h1>
                    <div>
                        <ul class="mb-1 flex flex-wrap gap-1">
                            @foreach ($singlePost->tags->sortBy('id')->unique() as $tag)
                            <li><a href="{{ route('blog.tag', ['tag' => $tag->slug]) }}"
                                class='{{ $tag->tagScheme->class }} inline-flex w-full cursor-pointer items-center justify-center rounded border px-2.5 py-0.5'><span
                                            class='text-center text-xs font-medium'>
                                            {{ $tag->name }}
                                        </span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </header>
                @include('layouts.blog.content')

                @include('layouts.blog.comment')
            </article>
        </div>
    </main>
@endsection
