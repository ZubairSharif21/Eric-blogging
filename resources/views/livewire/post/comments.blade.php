<form wire:submit="save" class="mb-6">
    @csrf
    @auth
        <div class="mb-5 flex items-center gap-4">
            <img class="h-8 w-8 rounded-full"
                src="{{ Auth::user()->details ? (Auth::user()->details->profile_pic ? (env('APP_ENV') === 'production' ? env('AWS_URL') . Auth::user()->details->profile_pic : asset('images/' . Auth::user()->details->profile_pic)) : asset('img/user_photo.png')) : asset('img/user_photo.png') }}"
                alt="{{ Auth::user()->name }}" />
            <span class="text-sm text-gray-700">comment as <b>{{ Auth::user()->name }}</b></span>
        </div>
    @endauth
    <div
        class="{{ Auth::check() ? 'bg-white focus-within:ring-2 focus-within:ring-blue-400' : 'bg-gray-100' }} {{ $errors->has('content') ? 'border-pink-500' : 'border-gray-200' }} mb-4 rounded-lg rounded-t-lg border px-4 py-2 shadow-inner dark:border-gray-700 dark:bg-gray-800">
        <label for="content" class="sr-only">Your comment</label>
        <textarea id="content" rows="6" wire:model="content"
            class="{{ Auth::check() ? 'bg-white' : 'bg-gray-100' }} {{ $errors->has('content') ? 'text-pink-700' : 'text-gray-900' }} w-full resize-none border-0 px-0 text-sm focus:ring-0 dark:bg-gray-800 dark:text-white dark:placeholder-gray-400"
            placeholder="Write a comment..." {{ Auth::check() ? '' : 'disabled' }}></textarea>
    </div>
    @error('content')
        <div class="text-sm text-red-500">
            {{ $message }}
        </div>
    @enderror
    <div class="flex w-full justify-end">
        @auth
            <button type="submit" wire:loading.attr="disabled" wire.target="content"
                wire:loading.class="hover:cursor-not-allowed"
                class="inline-flex cursor-pointer items-center rounded-lg bg-blue-500 px-4 py-2.5 text-center text-xs font-medium text-white hover:bg-blue-600 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900">
                <div role="status" wire:loading wire:target="content" class="flex items-center gap-2">
                    <svg aria-hidden="true" class="inline h-3 w-3 animate-spin fill-blue-600 text-white dark:text-gray-600"
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
                <span wire:target="content" wire:loading.class="hidden opacity-0">Post comment</span>
            </button>
        @endauth
        @guest
            <button type="button" wire:loading.attr="disabled"
                x-on:click="window.dispatchEvent(new CustomEvent('show-modal-login', { detail: { userData: {}, details: {} } }))"
                class="inline-flex cursor-pointer items-center rounded-lg bg-gray-500 px-4 py-2.5 text-center text-xs font-medium text-white hover:bg-gray-600 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="me-2 h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                </svg>

                Login
            </button>
        @endguest
    </div>
</form>

@if ($scrollToElementId)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const element = document.getElementById('{{ $scrollToElementId }}');
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    </script>
@endif
