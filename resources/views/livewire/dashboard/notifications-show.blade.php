<div x-data="{ activeTab: 'tabAll', checkedStar: $wire.isFavorite, isArchived: $wire.isArchived, isDeleted: $wire.isDeleted }"
    class="min-h-96 mb-10 mt-5 w-full overflow-hidden rounded-lg border bg-gray-50 text-gray-500 shadow-xl" x-cloak>

    {{-- Header --}}
    <div class="mt-2 flex w-full gap-10 border-b px-5 pb-5 pt-3">
        {{-- Navigate back --}}
        <a href="{{ route('notifications') }}" wire:navigate class="group relative z-0 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="relative z-[1] h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            <div
                class="absolute bottom-1/2 left-1/2 z-[1] h-10 w-10 -translate-x-1/2 translate-y-1/2 rounded-full transition-[background-color_500ms_ease-in] group-hover:bg-gray-400 group-hover:bg-opacity-50 group-focus:bg-gray-400 group-focus:bg-opacity-50">
            </div>
        </a>

        {{-- Header Menu --}}
        <div class="flex gap-4">
            {{-- Favorite button --}}
            <div wire:click.stop class="flex h-full w-full items-center justify-center">
                <label wire:click="markAsFavorite" for="favoriteNotificatons{{ $notification->id }}"
                    class="relative cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" :fill="checkedStar ? 'currentColor' : '#f3f4f6'"
                        viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="peer relative z-[1] h-5 w-5"
                        :class="{
                            'text-yellow-300': checkedStar,
                            'text-gray-500 group-hover:text-gray-600': !checkedStar
                        }">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                    </svg>
                    <div
                        class="absolute bottom-1/2 left-1/2 z-0 h-10 w-10 -translate-x-1/2 translate-y-1/2 rounded-full transition-[background-color_500ms_ease-in] peer-hover:bg-gray-400 peer-hover:bg-opacity-50 peer-focus:bg-gray-400 peer-focus:bg-opacity-50">
                    </div>
                </label>
                <input type="checkbox" x-model="checkedStar" wire:model="isFavorite" name="favoriteNotificatons"
                    id="favoriteNotificatons{{ $notification->id }}" class="sr-only">
            </div>
            {{-- Mark as Unread --}}
            <button wire:click="markAsUnread" class="relative">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="peer relative z-[1] h-5 w-5 text-gray-500 hover:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                </svg>


                <div
                    class="absolute bottom-1/2 left-1/2 z-0 h-10 w-10 -translate-x-1/2 translate-y-1/2 rounded-full transition-[background-color_500ms_ease-in] peer-hover:bg-gray-400 peer-hover:bg-opacity-50 peer-focus:bg-gray-400 peer-focus:bg-opacity-50">
                </div>
            </button>
            {{-- Archive button --}}
            {{-- Move to Archive --}}
            <button x-show="isArchived === false" wire:click="moveToArchive" class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="peer relative z-[1] h-5 w-5 text-gray-500 hover:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>
                <div
                    class="absolute bottom-1/2 left-1/2 z-0 h-10 w-10 -translate-x-1/2 translate-y-1/2 rounded-full transition-[background-color_500ms_ease-in] peer-hover:bg-gray-400 peer-hover:bg-opacity-50 peer-focus:bg-gray-400 peer-focus:bg-opacity-50">
                </div>
            </button>
            {{-- Move From Archive --}}
            <button x-show="isArchived === true" wire:click="moveFromArchive" class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="peer relative z-[1] h-5 w-5 text-gray-500 hover:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>

                <div
                    class="absolute bottom-1/2 left-1/2 z-0 h-10 w-10 -translate-x-1/2 translate-y-1/2 rounded-full transition-[background-color_500ms_ease-in] peer-hover:bg-gray-400 peer-hover:bg-opacity-50 peer-focus:bg-gray-400 peer-focus:bg-opacity-50">
                </div>
            </button>

            {{-- Move To Trash --}}
            <button x-show="isDeleted === false" wire:click="moveToTrash" class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="peer relative z-[1] h-5 w-5 text-gray-500 hover:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
                <div
                    class="absolute bottom-1/2 left-1/2 z-0 h-10 w-10 -translate-x-1/2 translate-y-1/2 rounded-full transition-[background-color_500ms_ease-in] peer-hover:bg-gray-400 peer-hover:bg-opacity-50 peer-focus:bg-gray-400 peer-focus:bg-opacity-50">
                </div>
            </button>
            {{-- Move from Trash --}}
            <button x-show="isDeleted === true" wire:click="moveFromTrash" class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="peer relative z-[1] h-5 w-5 text-gray-500 hover:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>

                <div
                    class="absolute bottom-1/2 left-1/2 z-0 h-10 w-10 -translate-x-1/2 translate-y-1/2 rounded-full transition-[background-color_500ms_ease-in] peer-hover:bg-gray-400 peer-hover:bg-opacity-50 peer-focus:bg-gray-400 peer-focus:bg-opacity-50">
                </div>
            </button>

        </div>

    </div>
    {{-- Main Content --}}
    <div class="bg-white px-4 pt-4">
        {{-- Header Content --}}
        <div class="flex justify-between">

            {{-- Left --}}
            <div class="flex gap-4">
                <img class="h-11 w-11 rounded-full"
                    src="{{ App\Models\User::find($notification->data['user_id'])->details ? (App\Models\User::find($notification->data['user_id'])->details->profile_pic ? (env('APP_ENV') === 'production' ? env('AWS_URL') . App\Models\User::find($notification->data['user_id'])->details->profile_pic : asset('images/' . App\Models\User::find($notification->data['user_id'])->details->profile_pic)) : asset('img/user_photo.png')) : asset('img/user_photo.png') }}"
                    alt="{{ App\Models\User::find($notification->data['user_id'])->name }}">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="font-bold">{{ App\Models\User::find($notification->data['user_id'])->name }}</span>
                        <span class="text-sm font-normal">
                            {{ '<' . App\Models\User::find($notification->data['user_id'])->email . '>' }}
                        </span>
                    </div>
                    <span>to me</span>
                </div>
            </div>
            {{-- Right --}}
            <div class="flex gap-2 text-sm">
                @if ($notification->created_at->diffInDays() == 0)
                    <span>{{ $notification->created_at->format('H:i') }}</span>
                @else
                    <span>{{ $notification->created_at->format('F j, Y, H:i') }}</span>
                @endif
                <span>{{ '(' . $notification->created_at->diffForHumans() . ')' }}</span>
            </div>
        </div>
        {{-- Content --}}
        <div class="flex flex-col items-center justify-center py-10">
            You have received new comments on post
            <a href="{{ route('singlePost', ['year' => Carbon\Carbon::parse(App\Models\Post::where('id', $notification->data['post_id'])->firstOrFail()->published_at)->format('Y'), 'slug' => App\Models\Post::where('id', $notification->data['post_id'])->firstOrFail()->slug . '#comment' . $notification->data['comment_id_reply']]) }}"
                target="_blank"
                class="text-blue-500 underline hover:no-underline">{{ App\Models\Post::where('id', $notification->data['post_id'])->first()->title }}</a>
            <div class="mt-3 min-w-[50%] max-w-[75%] overflow-hidden rounded-lg border bg-gray-200 text-sm">
                <div class="px-4 py-2">
                    Your comment
                </div>
                <div class="bg-gray-300 px-4 py-2">
                    <span
                        class="line-clamp-1">{{ App\Models\Comment::findOrFail($notification->data['comment_id'])->content }}</span>
                </div>
            </div>
            <div class="my-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" transform="rotate(90)"
                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <div class="min-w-[50%] max-w-[75%] rounded-lg border bg-gray-200">
                <div class="px-4 py-2">
                    {{ App\Models\User::find($notification->data['user_id'])->name . ' reply' }}
                </div>
                <div class="bg-white px-4 py-2">
                    {{ $notification->data['comment_content'] }}
                </div>
            </div>
        </div>
    </div>

</div>
