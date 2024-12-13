<div x-data="{ activeTab: new URLSearchParams(location.search).get('activeTab') ?? 'tabAll' }"
    class="min-h-96 mb-10 mt-5 w-full overflow-hidden rounded-lg border bg-gray-50 text-gray-500 shadow-xl">

    <div class="flex w-full justify-between px-5 py-3">
        <div>
            <input disabled type="checkbox"
                class="peer relative z-[1] h-4 w-4 cursor-not-allowed rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
        </div>
    </div>

    {{-- Navigation --}}
    <div class="flex w-full flex-nowrap justify-start">
        <button @click="activeTab = 'tabAll'"
            class="relative flex w-full items-center gap-4 px-8 py-4 text-sm font-bold hover:bg-gray-100"
            :class="{ 'text-blue-500': activeTab === 'tabAll' }">
            <svg x-show="activeTab === 'tabAll'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                fill="currentColor" class="h-4 w-4">
                <path fill-rule="evenodd"
                    d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z"
                    clip-rule="evenodd" />
            </svg>
            <svg x-show="activeTab !== 'tabAll'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>

            <div class="absolute bottom-0 left-1/2 h-0.5 w-5/6 -translate-x-1/2 rounded"
                :class="{ 'bg-blue-500': activeTab === 'tabAll' }">
            </div>

            All Notifications
        </button>
        <button @click="activeTab = 'tabFavorite'"
            class="relative flex w-full items-center gap-4 px-8 py-4 text-sm font-bold hover:bg-gray-100"
            :class="{ 'text-blue-500': activeTab === 'tabFavorite' }">
            <svg xmlns="http://www.w3.org/2000/svg" :fill="activeTab === 'tabFavorite' ? 'currentColor' : 'none'"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
            </svg>
            <div class="absolute bottom-0 left-1/2 h-0.5 w-5/6 -translate-x-1/2 rounded"
                :class="{ 'bg-blue-500': activeTab === 'tabFavorite' }">
            </div>

            Favorite
        </button>
        <button @click="activeTab = 'tabUnread'"
            class="relative flex w-full items-center gap-4 px-8 py-4 text-sm font-bold hover:bg-gray-100"
            :class="{ 'text-blue-500': activeTab === 'tabUnread' }">
            <svg x-show="activeTab !== 'tabUnread'" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>
            <svg x-show="activeTab === 'tabUnread'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                fill="currentColor" class="h-4 w-4">
                <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                <path
                    d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
            </svg>

            <div class="absolute bottom-0 left-1/2 h-0.5 w-5/6 -translate-x-1/2 rounded"
                :class="{ 'bg-blue-500': activeTab === 'tabUnread' }">
            </div>
            All Unread
        </button>
        <button @click="activeTab = 'tabArchive'"
            class="relative flex w-full items-center gap-4 px-8 py-4 text-sm font-bold hover:bg-gray-100"
            :class="{ 'text-blue-500': activeTab === 'tabArchive' }">
            <svg x-show="activeTab === 'tabArchive'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                fill="currentColor" class="h-4 w-4">
                <path
                    d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                <path fill-rule="evenodd"
                    d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z"
                    clip-rule="evenodd" />
            </svg>
            <svg x-show="activeTab !== 'tabArchive'" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
            </svg>
            <div class="absolute bottom-0 left-1/2 h-0.5 w-5/6 -translate-x-1/2 rounded"
                :class="{ 'bg-blue-500': activeTab === 'tabArchive' }">
            </div>
            Archived
        </button>
        <button @click="activeTab = 'tabTrash'"
            class="relative flex w-full items-center gap-4 px-8 py-4 text-sm font-bold hover:bg-gray-100"
            :class="{ 'text-blue-500': activeTab === 'tabTrash' }">
            <svg x-show="activeTab === 'tabTrash'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                fill="currentColor" class="h-4 w-4">
                <path fill-rule="evenodd"
                    d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                    clip-rule="evenodd" />
            </svg>
            <svg x-show="activeTab !== 'tabTrash'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>


            <div class="absolute bottom-0 left-1/2 h-0.5 w-5/6 -translate-x-1/2 rounded"
                :class="{ 'bg-blue-500': activeTab === 'tabTrash' }">
            </div>
            Trash Bin
        </button>
    </div>

    {{-- Row Table --}}
    <div class="w-full">
        <table class="w-full border-collapse">
            <colgroup>
                <col class="w-[5%]">
                <col class="w-[5%]">
                <col class="w-[30%]">
                <col class="w-[50%]">
                <col class="w-[10%]">
                {{-- <col class="w-[5%] bg-slate-700">
                <col class="w-[5%] bg-blue-500">
                <col class="w-[30%] bg-red-400">
                <col class="w-[50%] bg-yellow-400">
                <col class="w-[10%] bg-green-500"> --}}
            </colgroup>

            {{-- Notifications Table --}}
            <template x-if="activeTab === 'tabAll'">
                <tbody>
                    @forelse ($notifications as $notification)
                        <livewire:dashboard.active-tab :$notification />
                    @empty
                        <template x-if="activeTab === 'tabAll'">
                            <div class="absolute flex w-full items-center justify-center py-20">No Notifications</div>
                        </template>
                    @endforelse
                </tbody>
            </template>
            <template x-if="activeTab === 'tabFavorite'">
                <tbody>
                    @forelse ($favorites as $notification)
                        <livewire:dashboard.active-tab :$notification />
                    @empty
                        <template x-if="activeTab === 'tabFavorite'">
                            <div class="absolute flex w-full items-center justify-center py-20">No Favorite</div>
                        </template>
                    @endforelse
                </tbody>
            </template>
            <template x-if="activeTab === 'tabUnread'">
                <tbody>
                    @forelse ($unreads as $notification)
                        <livewire:dashboard.active-tab :$notification />
                    @empty
                        <template x-if="activeTab === 'tabUnread'">
                            <div class="absolute flex w-full items-center justify-center py-20">No Unread Notificatios
                            </div>
                        </template>
                    @endforelse
                </tbody>
            </template>
            <template x-if="activeTab === 'tabArchive'">
                <tbody>
                    @forelse ($archives as $notification)
                        <livewire:dashboard.active-tab :$notification />
                    @empty
                        <template x-if="activeTab === 'tabArchive'">
                            <div class="absolute flex w-full items-center justify-center py-20">No Archived
                                Notification
                            </div>
                        </template>
                    @endforelse
                </tbody>
            </template>
            <template x-if="activeTab === 'tabTrash'">
                <tbody>
                    @forelse ($deletes as $notification)
                        <livewire:dashboard.active-tab :$notification />
                    @empty
                        <template x-if="activeTab === 'tabTrash'">
                            <div class="absolute flex w-full items-center justify-center py-20">No Deleted Notification
                            </div>
                        </template>
                    @endforelse
                </tbody>
            </template>
        </table>
    </div>

</div>
