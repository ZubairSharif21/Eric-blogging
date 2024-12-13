<!-- Dropdown menu -->
<div x-show="openQuickAdd" x-cloak
    class="absolute right-2 top-10 z-50 my-4 max-w-sm list-none divide-y divide-gray-100 overflow-hidden rounded bg-white text-base shadow-lg dark:divide-gray-600 dark:bg-gray-700 sm:right-14"
    @click.outside="openQuickAdd = false" id="apps-dropdown">
    <div
        class="block bg-gray-50 px-4 py-2 text-center text-base font-medium text-gray-700 dark:bg-gray-700 dark:text-gray-400">
        Apps
    </div>
    <div class="grid grid-cols-3 gap-4 p-4">
        @can('create post')
            <a href="{{ route('posts.create') }}"
                class="group block rounded-lg p-4 text-center hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg aria-hidden="true"
                    class="mx-auto mb-2 h-5 w-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                        clip-rule="evenodd"></path>
                </svg>
                <div class="text-sm font-medium text-gray-900 dark:text-white">Posts</div>
            </a>
        @endcan
        @can('create category')
            <a href="{{ route('categories.create') }}"
                class="group block rounded-lg p-4 text-center hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg aria-hidden="true"
                    class="mx-auto mb-2 h-5 w-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                    </path>
                    <path
                        d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                    </path>
                </svg>
                <div class="text-sm font-medium text-gray-900 dark:text-white">Category</div>
            </a>
        @endcan
        @can('create tag')
            <a href="{{ route('tags.create') }}"
                class="group block rounded-lg p-4 text-center hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="mx-auto mb-2 h-5 w-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400">
                    <path fill-rule="evenodd"
                        d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                        clip-rule="evenodd" />
                </svg>
                <div class="text-sm font-medium text-gray-900 dark:text-white">Tags</div>
            </a>
        @endcan
        @can('create user')
            <a href="{{ route('users.create') }}"
                class="group block rounded-lg p-4 text-center hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="mx-auto mb-2 h-5 w-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400">
                    <path
                        d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                </svg>
                <div class="text-sm font-medium text-gray-900 dark:text-white">Users</div>
            </a>
        @endcan
        <a href="{{ route('users.show', Auth::user()) }}"
            class="group block rounded-lg p-4 text-center hover:bg-gray-100 dark:hover:bg-gray-600">
            <svg class="mx-auto mb-2 h-5 w-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
            </svg>
            <div class="text-sm font-medium text-gray-900 dark:text-white">Profile</div>
        </a>
        <form action="/logout" method="post">
            @csrf
            <button type="submit"
                class="group block rounded-lg p-4 text-center hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg class="mx-auto mb-2 h-5 w-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" />
                </svg>
                <div class="text-sm font-medium text-gray-900 dark:text-white">Logout</div>
            </button>
        </form>
    </div>
</div>
