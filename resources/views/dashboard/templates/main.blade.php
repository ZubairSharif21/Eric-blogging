@include('dashboard.templates.head')

@include('dashboard.templates.navbar')

<div class="flex min-h-screen overflow-hidden bg-gray-100 pt-16">
    {{-- @include('dashboard.templates.sidebar') --}}
    <livewire:dashboard.sidebar />
    <livewire:dashboard.content-section />
</div>
<div class="fixed bottom-0 z-50 w-full">
    @if (Auth::check() && App\Models\User::find(Auth::user()->id)->email_verified_at == null)
        <div class="bg-yellow-200 px-4 py-2 text-yellow-500">
            Please confirm your email address. Check spam folder if you don't see it in your inbox. Or <form
                action="{{ route('verification.send') }}" method="post" class="inline">@csrf <button type="submit"
                    class="inline border-0 font-bold hover:underline">Resend</button></form>
            verification email.
        </div>
    @endif
</div>
@include('dashboard.templates.footer')
