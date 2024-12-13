<div x-show="openNotificationDropdown" x-cloak @click.outside="openNotificationDropdown = false"
    class="absolute right-2 top-10 z-50 my-4 w-4/5 list-none divide-y divide-gray-100 overflow-hidden rounded bg-white text-base shadow-lg dark:divide-gray-600 dark:bg-gray-700 sm:right-10 sm:max-w-sm"
    id="notification-dropdown">
    <div
        class="block bg-gray-50 px-4 py-2 text-center text-base font-medium text-gray-700 dark:bg-gray-700 dark:text-gray-400">
        Notifications
    </div>
    <div>
        @forelse ($notifications as $notification)
            <a href="#" wire:click.prevent="redirectToNotification({{ $notification }})"
                class="flex border-b px-4 py-3 hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-600">
                <div class="flex-shrink-0">
                    <img class="h-11 w-11 rounded-full"
                        src="{{ App\Models\User::find($notification->data['user_id'])->details ? (App\Models\User::find($notification->data['user_id'])->details->profile_pic ? (env('APP_ENV') === 'production' ? env('AWS_URL') . App\Models\User::find($notification->data['user_id'])->details->profile_pic : asset('images/' . App\Models\User::find($notification->data['user_id'])->details->profile_pic)) : asset('img/user_photo.png')) : asset('img/user_photo.png') }}"
                        alt="{{ App\Models\User::find($notification->data['user_id'])->name }}">
                    <div
                        class="absolute -mt-5 ml-6 flex h-5 w-5 items-center justify-center rounded-full border border-white bg-green-400 dark:border-gray-700">
                        <svg class="h-2 w-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z" />
                        </svg>
                    </div>
                </div>
                <div class="w-full pl-3">
                    <div class="mb-1.5 text-sm font-normal text-gray-500 dark:text-gray-400">
                        <p class="line-clamp-2">
                            <span
                                class="font-semibold text-gray-900 dark:text-white">{{ App\Models\User::find($notification->data['user_id'])->name }}
                                <span class="font-normal">
                                    mentioned you in a comment:
                                </span>
                            </span>
                            <span class="me-2 font-medium text-primary-700 dark:text-primary-500">
                                {{ '@' . $user->username }}</span><span>{{ $notification->data['comment_content'] }}</span>
                        </p>
                    </div>
                    <div class="text-xs font-medium text-primary-700 dark:text-primary-400">
                        {{ $notification->created_at->diffForHumans() }}
                    </div>
                </div>
            </a>
        @empty
            <div class="flex flex-col items-center gap-2 bg-gray-100 px-10 py-10 text-center text-sm text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="h-6 w-6 text-gray-400">
                    <path fill-rule="evenodd"
                        d="M6.912 3a3 3 0 0 0-2.868 2.118l-2.411 7.838a3 3 0 0 0-.133.882V18a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0 0 17.088 3H6.912Zm13.823 9.75-2.213-7.191A1.5 1.5 0 0 0 17.088 4.5H6.912a1.5 1.5 0 0 0-1.434 1.059L3.265 12.75H6.11a3 3 0 0 1 2.684 1.658l.256.513a1.5 1.5 0 0 0 1.342.829h3.218a1.5 1.5 0 0 0 1.342-.83l.256-.512a3 3 0 0 1 2.684-1.658h2.844Z"
                        clip-rule="evenodd" />
                </svg>
                <span>

                    All clear capt! No new notifications
                </span>
            </div>
        @endforelse

    </div>
    <a href="{{ route('notifications') }}" wire:navigate
        class="block bg-gray-50 py-2 text-center text-base font-medium text-gray-900 hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:hover:underline">
        <div class="inline-flex items-center text-gray-400 hover:text-gray-700">
            <svg aria-hidden="true" class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                <path fill-rule="evenodd"
                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                    clip-rule="evenodd"></path>
            </svg>
            View all
        </div>
    </a>
</div>
