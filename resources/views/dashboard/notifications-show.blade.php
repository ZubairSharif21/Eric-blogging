@extends('dashboard.templates.main')

@section('content')
    <div class="px-4">
        <div class="mb-4 rounded-md bg-white p-6 shadow">
            <h1 class="flex items-center gap-2 text-2xl font-bold text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="h-6 w-6 flex-shrink-0 text-gray-400 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                    <path fill-rule="evenodd"
                        d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z"
                        clip-rule="evenodd" />
                </svg>
                Notification
            </h1>
            <span class="text-sm text-gray-400">List all of your notification including all interactions in this
                website</span>
        </div>
        <livewire:dashboard.notifications-show :notification="$notification" />

    </div>
@endsection
