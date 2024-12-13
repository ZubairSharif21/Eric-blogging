<div x-data="{
    showModalLogin: false,
    activeTab: 'tabHeader',
    userData: {},
    details: {},
    openModalLogin(selectedTab) {
        this.showModalLogin = true;
        document.body.style.overflow = 'hidden';
        this.activeTab = selectedTab;
    },
    closeModalLogin() {
        this.showModalLogin = false;
        document.body.style.overflow = 'auto';
    }
}" x-show="showModalLogin"
    x-on:show-modal-login.window="openModalLogin(selectedTab = $event.detail.selectedTab); userData = $event.detail.userData; details = $event.detail.details"
    x-cloak class="fixed left-0 top-0 z-[99] h-screen w-full overflow-y-scroll">
    {{-- Backdrop --}}
    <div x-show="showModalLogin" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="absolute inset-0 z-[99] h-fit min-h-screen w-full bg-[rgba(0,0,0,0.5)]">

        {{-- Modal --}}
        <div x-show="showModalLogin" x-data x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90" x-cloak
            class="relative left-1/2 z-[100] my-20 flex w-3/4 -translate-x-1/2 flex-col rounded-xl bg-zinc-50 py-4 sm:w-1/3"
            @click.outside="closeModalLogin">
            {{-- Modal Header --}}
            <div class="relative mx-6 mb-5 flex justify-between">
                <h2 class="text-2xl font-bold text-gray-700">Please Login</h2>
                {{-- Close Button --}}
                <div class="relative">
                    <button type="button" @click="closeModalLogin"
                        class="rounded-lg p-2 focus:ring-2 focus:ring-blue-300 active:bg-zinc-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="relative h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

            </div>

            {{-- Modal Content --}}
            <div class="flex w-full justify-center">
                <img class="mb-4 h-[57px]" src="{{ asset('img/logo.png') }}" alt="Logo" height="57">
            </div>
            <main class="mx-auto mb-10 w-3/4 rounded-none">
                <h1 class="font-inter mb-3 text-center text-3xl">Please Log in</h1>
                <form wire:submit.prevent="login">
                    @csrf
                    <div class="group relative z-0 mb-5 w-full">
                        <input type="email" wire:model="email" autocomplete="off"
                            class="@error('email') invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500 @enderror peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                            id="email" placeholder=" " autofocus required value="{{ old('email') }}">
                        <label for="email"
                            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4 dark:text-gray-400 peer-focus:dark:text-blue-500">Email
                            address</label>
                        @error('email')
                            <div class="text-pink-600">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="group relative z-0 mb-5 w-full" x-data="{ showPassword: false }">
                        <input x-ref="passwordInput" type="password" x-bind:type="showPassword ? 'text' : 'password'"
                            wire:model="password"
                            class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                            id="password" placeholder=" " required>
                        <button type="button" title="Show Password"
                            x-on:click="showPassword = !showPassword; $nextTick(() => $refs.passwordInput.focus())"
                            @click.prevent tabindex="-1" class="absolute right-3 top-1/2 -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="h-6 w-6"
                                :class="{ 'text-blue-500': showPassword, 'text-gray-300': !showPassword }">
                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                <path fill-rule="evenodd"
                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </button>
                        <label for="password"
                            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4 dark:text-gray-400 peer-focus:dark:text-blue-500">Password</label>
                    </div>
                    <div class="flex w-full justify-end">
                        <button
                            class="w-full rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                            type="submit" tabindex="0">Log in</button>
                    </div>
                </form>
                <small class="mt-3 block text-center text-gray-600">Not registered? <a href="/register"
                        class="text-blue-500 underline hover:text-blue-700 hover:no-underline">Register
                        Now!</a></small>
            </main>
        </div>
    </div>

</div>
