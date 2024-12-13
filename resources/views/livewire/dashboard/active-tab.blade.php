    <tr wire:click.once="redirectToNotification({{ $notification }})"
        class="group relative cursor-pointer border hover:z-[2] hover:shadow-lg" x-data="{ checkedStar: {{ $notification->isFavorite ? $notification->isFavorite : 'false' }}, checkedSelect: false, isDeleted: $wire.isDeleted, isArchived: $wire.isArchived, read_at: $wire.read_at }"
        :class="{
            'bg-blue-100': checkedSelect,
            '{{ $notification->read_at ? 'bg-gray-200' : 'bg-gray-50' }}': !
                checkedSelect
        }">
        {{-- Check Box Select --}}
        <td class="">
            <div class="relative hidden h-full w-full items-center justify-center sm:flex">
                <input disabled wire:click.stop x-model="checkedSelect" type="checkbox" name="selectedNotifications"
                    class="group-hover:border-gray-600/85 peer relative z-[1] h-4 w-4 cursor-not-allowed rounded border border-gray-400/80 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                <div
                    class="absolute bottom-1/2 left-1/2 z-0 h-10 w-10 -translate-x-1/2 translate-y-1/2 rounded-full transition-[background-color_500ms_ease-in] peer-hover:bg-gray-400 peer-hover:bg-opacity-50 peer-focus:bg-gray-400 peer-focus:bg-opacity-50">
                </div>
            </div>

        </td>
        {{-- Check Box Favorite --}}
        <td>
            <div wire:click.stop class="flex h-full w-full items-center justify-center">
                <label for="favoriteNotificatons{{ $notification->id }}" class="relative cursor-pointer"
                    wire:click="markAsFavorite">
                    <svg xmlns="http://www.w3.org/2000/svg" :fill="checkedStar ? 'currentColor' : '#f3f4f6'"
                        viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="peer relative z-[1] h-6 w-6"
                        :class="{
                            'text-yellow-300': checkedStar,
                            'text-gray-400 group-hover:text-gray-600': !
                                checkedStar
                        }">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                    </svg>
                    <div
                        class="absolute bottom-1/2 left-1/2 z-0 h-10 w-10 -translate-x-1/2 translate-y-1/2 rounded-full transition-[background-color_500ms_ease-in] peer-hover:bg-gray-400 peer-hover:bg-opacity-50 peer-focus:bg-gray-400 peer-focus:bg-opacity-50">
                    </div>
                </label>
                <input type="checkbox" x-model="checkedStar" wire:model="isFavorite" name="favoriteNotificatons"
                    :disabled="isDeleted || isArchived" id="favoriteNotificatons{{ $notification->id }}"
                    class="sr-only">
            </div>
        </td>
        {{-- Info Notification --}}
        <td>
            <div class="flex h-full w-full gap-2 px-4">
                <a wire:click.prevent class="flex py-3">
                    <div class="hidden flex-shrink-0 sm:block">
                        <img class="h-8 w-8 rounded-full"
                            src="{{ App\Models\User::find($notification->data['user_id'])->details ? (App\Models\User::find($notification->data['user_id'])->details->profile_pic ? (env('APP_ENV') === 'production' ? env('AWS_URL') . App\Models\User::find($notification->data['user_id'])->details->profile_pic : asset('images/' . App\Models\User::find($notification->data['user_id'])->details->profile_pic)) : asset('img/user_photo.png')) : asset('img/user_photo.png') }}"
                            alt="{{ App\Models\User::find($notification->data['user_id'])->name }}">

                    </div>
                    <div class="w-full pl-3">
                        <div
                            class="mb-1.5 flex items-center text-sm font-normal text-gray-500 dark:text-gray-400 sm:block">
                            <div class="mr-1 inline-block">
                                <div
                                    class="hidden h-5 w-5 items-center justify-center rounded-full border border-white bg-green-400 dark:border-gray-700 sm:flex">
                                    <svg class="h-2 w-2 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                        <path
                                            d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z" />
                                    </svg>
                                </div>
                            </div>
                            <span
                                class="{{ $notification->read_at ? 'text-gray-500' : 'text-gray-700' }} font-semibold dark:text-white">{{ App\Models\User::find($notification->data['user_id'])->name }}</span>
                            <div class="hidden sm:block">
                                Mentioned you in a comment
                            </div>

                        </div>
                    </div>
                </a>
            </div>
        </td>

        {{-- Content Notification --}}
        <td>
            <div class="px-4">
                <span class="{{ $notification->read_at ? '' : 'font-bold' }} line-clamp-1 text-base">
                    {{ $notification->data['comment_content'] }}
                </span>
                <div class="line-clamp-1 text-sm italic">
                    <span>Comment on post :</span> <span
                        class="{{ $notification->read_at ? '' : 'font-bold' }}">{{ App\Models\Post::where('id', $notification->data['post_id'])->firstOrFail()->title }}</span>
                </div>
            </div>
        </td>

        {{-- Date and Action --}}
        <td class="relative">
            <div
                class="hidden justify-center text-xs font-medium text-primary-700 group-hover:hidden dark:text-primary-400 sm:flex">
                {{ $notification->created_at->diffForHumans() }}
            </div>
            <div
                class="flex justify-center text-xs font-medium text-primary-700 group-hover:hidden dark:text-primary-400 sm:hidden">
                {{ Carbon\Carbon::parse($notification->created_at)->format('j M') }}
            </div>

            {{-- Actions --}}
            <div wire:click.stop class="absolute right-4 top-1/2 hidden -translate-y-1/2 gap-4 group-hover:flex">
                {{-- Mark as Unread --}}
                <button x-show="read_at !== null" wire:click="markAsUnread" class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="peer relative z-[1] h-5 w-5 text-gray-500 hover:text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>


                    <div
                        class="absolute bottom-1/2 left-1/2 z-0 h-10 w-10 -translate-x-1/2 translate-y-1/2 rounded-full transition-[background-color_500ms_ease-in] peer-hover:bg-gray-400 peer-hover:bg-opacity-50 peer-focus:bg-gray-400 peer-focus:bg-opacity-50">
                    </div>
                </button>
                {{-- Mark as Unread --}}
                <button x-show="read_at === null" wire:click="markAsRead" class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="peer relative z-[1] h-5 w-5 text-gray-500 hover:text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
                    </svg>

                    <div
                        class="absolute bottom-1/2 left-1/2 z-0 h-10 w-10 -translate-x-1/2 translate-y-1/2 rounded-full transition-[background-color_500ms_ease-in] peer-hover:bg-gray-400 peer-hover:bg-opacity-50 peer-focus:bg-gray-400 peer-focus:bg-opacity-50">
                    </div>
                </button>
                {{-- Move to Archive --}}
                <button x-show="isArchived === false && isDeleted === false" class="relative"
                    wire:click="moveToArchive">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="peer relative z-[1] h-5 w-5 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>

                    <div
                        class="absolute bottom-1/2 left-1/2 z-0 h-10 w-10 -translate-x-1/2 translate-y-1/2 rounded-full transition-[background-color_500ms_ease-in] peer-hover:bg-gray-400 peer-hover:bg-opacity-50 peer-focus:bg-gray-400 peer-focus:bg-opacity-50">
                    </div>
                </button>
                {{-- Move From Archive --}}
                <button x-show="isArchived === true && isDeleted === false" wire:click="moveFromArchive"
                    class="relative">
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
                <button x-show="isDeleted === false" class="relative" wire:click="moveToTrash">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="peer relative z-[1] h-5 w-5 text-gray-600">
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
        </td>

    </tr>
