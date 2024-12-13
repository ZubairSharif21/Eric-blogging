<form wire:submit="save" method="post" class="mt-10 w-full">
    @csrf
    <div class="group relative z-0 mb-5 w-full">
        <input type="text" name="name" wire:model.live="name"
            class="@error('name') invalid:border-pink-500 invalid:text-pink-600
            focus:invalid:border-pink-500 focus:invalid:ring-pink-500 @enderror peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
            id="name" placeholder=" " required autofocus value="{{ old('name') }}">
        @if ($name && !$errors->has('name'))
            <label for="name" title="Name is Valid"" @click.prevent
                class="absolute -right-3 top-1/2 -translate-y-1/2 translate-x-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 text-green-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </label>
        @endif
        <label for="name"
            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4 dark:text-gray-400 peer-focus:dark:text-blue-500">Name</label>
        @error('name')
            <div class="line-clamp-2 text-xs text-pink-600 sm:text-sm">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="group relative z-0 mb-5 w-full">
        <input type="text" name="username" wire:model.live="username"
            class="@error('username') invalid:border-pink-500 invalid:text-pink-600
            focus:invalid:border-pink-500 focus:invalid:ring-pink-500 @enderror peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
            id="username" placeholder=" " required value="{{ old('username') }}">
        @if ($username && !$errors->has('username'))
            <label for="username" title="Username is Valid"" @click.prevent
                class="absolute -right-3 top-1/2 -translate-y-1/2 translate-x-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 text-green-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </label>
        @endif
        <label for="username"
            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4 dark:text-gray-400 peer-focus:dark:text-blue-500">Username</label>
        @error('username')
            <div class="text-xs text-pink-600 sm:text-sm">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="group relative z-0 mb-5 w-full">
        <input type="email" name="email" wire:model.live="email"
            class="@error('email') invalid:border-pink-500 invalid:text-pink-600
            focus:invalid:border-pink-500 focus:invalid:ring-pink-500 @enderror peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
            id="email" placeholder=" " required value="{{ old('email') }}">
        @if ($email && !$errors->has('email'))
            <label for="email" title="Email is Valid"" @click.prevent
                class="absolute -right-3 top-1/2 -translate-y-1/2 translate-x-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 text-green-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </label>
        @endif
        <label for="email"
            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4 dark:text-gray-400 peer-focus:dark:text-blue-500">Email</label>
        @error('email')
            <div class="text-xs text-pink-600 sm:text-sm">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="group relative z-0 mb-5 w-full" x-data="{ showPassword: false }">
        <input x-ref="passwordInput" type="password" x-bind:type="showPassword ? 'text' : 'password'" name="password"
            wire:model.live="password"
            class="@error('password') invalid:border-pink-500 invalid:text-pink-600
            focus:invalid:border-pink-500 focus:invalid:ring-pink-500 @enderror peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
            id="password" placeholder=" " required>
        @if ($password && !$errors->has('password'))
            <label for="password" title="Password is Valid"" @click.prevent
                class="absolute -right-3 top-1/4 -translate-y-1/2 translate-x-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 text-green-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </label>
        @endif
        <button type="button" title="Show Password"
            x-on:click="showPassword = !showPassword; $nextTick(() => $refs.passwordInput.focus())" @click.prevent
            class="absolute right-3 top-1/4 -translate-y-1/2" tabindex="-1" x-cloak>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"
                :class="{ 'text-blue-500': showPassword, 'text-gray-300': !showPassword }">
                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                <path fill-rule="evenodd"
                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                    clip-rule="evenodd" />
            </svg>

        </button>
        <label for="password"
            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4 dark:text-gray-400 peer-focus:dark:text-blue-500">Password</label>
        <div>
            <ul class="grid w-full grid-cols-2 grid-rows-2 text-sm">
                <li class="{{ $password && strlen($password) >= 6 ? 'text-green-500' : 'text-gray-300' }}">6 characters
                </li>
                <li class="{{ $password && preg_match('/\d/', $password) ? 'text-green-500' : 'text-gray-300' }}">1
                    number</li>
                <li class="{{ $password && preg_match('/[A-Z]/', $password) ? 'text-green-500' : 'text-gray-300' }}">1
                    uppercase letter</li>
                <li class="{{ $password && preg_match('/[a-z]/', $password) ? 'text-green-500' : 'text-gray-300' }}">1
                    lowercase letter</li>
            </ul>
        </div>

    </div>
    <div class="group relative z-0 mb-5 w-full" x-data="{ showPassword: false }">
        <input x-ref="passwordInput" type="password" x-bind:type="showPassword ? 'text' : 'password'"
            name="password_confirmation" wire:model.live="password_confirmation"
            class="@error('password_confirmation') invalid:border-pink-500 invalid:text-pink-600
            focus:invalid:border-pink-500 focus:invalid:ring-pink-500 @enderror peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
            id="password_confirmation" placeholder=" " required>
        @if ($password_confirmation && !$errors->has('password_confirmation'))
            <label for="password_confirmation" title="Password is Valid"" @click.prevent
                class="absolute -right-3 top-1/2 -translate-y-1/2 translate-x-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 text-green-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </label>
        @endif
        <button type="button" title="Show Password"
            x-on:click="showPassword = !showPassword; $nextTick(() => $refs.passwordInput.focus())" @click.prevent
            class="{{ $errors->has('password_confirmation') ? 'top-1/4' : 'top-1/2' }} absolute right-3 -translate-y-1/2"
            tabindex="-1" x-cloak>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"
                :class="{ 'text-blue-500': showPassword, 'text-gray-300': !showPassword }">
                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                <path fill-rule="evenodd"
                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                    clip-rule="evenodd" />
            </svg>

        </button>
        <label for="password_confirmation"
            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4 dark:text-gray-400 peer-focus:dark:text-blue-500">Confirm
            Password</label>
        @error('password_confirmation')
            <div class="text-xs text-pink-600 sm:text-sm">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="flex w-full flex-col">
        <button wire:loading.attr="disabled" wire:target="save" wire:loading.class="cursor-not-allowed"
            class="inline-block w-full flex-none rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
            type="submit" tabindex="0">
            <div role="status" wire:loading wire:target="save" class="flex items-center gap-2">
                <svg aria-hidden="true"
                    class="inline h-3 w-3 animate-spin fill-blue-600 text-white dark:text-gray-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span>Loading...</span>
            </div>
            <span wire:loading.class="opacity-0 hidden" wire:target="save">Register</span>
        </button>
    </div>
    <div class="w-full text-sm text-green-500" wire:target="save" wire:loading.delay.longest>Please
        wait a
        moment,
        we're tailoring your preferences ...</div>
</form>
