<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playground</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{-- Body saya inject style agar simpel, tidak direkomendasikan diterapkan di kodingan asli --}}

<body class="flex min-h-screen w-full items-center justify-center">

    {{-- Container Utama, berikan width dan height yang sesuai. Saya beri display grid agar mudah diatur bagian gambar dan komentar --}}
    {{-- Berikan juga overflow hidden untuk menghindari komponen yang melebihi container menjadi terlihat tidak rapi --}}
    <div class="grid h-[80vh] w-3/4 grid-cols-2 gap-6 overflow-hidden rounded-lg bg-gray-100 shadow-xl">
        {{-- Bagian kiri (gambar) --}}
        <div class="relative">
            <img class="h-full object-cover"
                src="https://images.unsplash.com/photo-1710432157519-e939ba5dfa1c?q=80&w=1624&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Unsplash">
        </div>

        {{-- Bagian kanan (komentar). Berikan overflow scroll pada komponen ini agar sesuai dengan kebutuhan kamu. Penting untuk mendefinisikan height pada container agar perilaku ini berhasil --}}
        <div class="overflow-y-scroll py-6 pr-6">

            {{-- Bagian header comment --}}
            <div class="sticky top-0 bg-white p-4 shadow-lg">
                <h1>Header</h1>
            </div>

            {{-- Bagian comment --}}
            <div>
                @for ($i = 0; $i < 10; $i++)
                    <div class="my-2 rounded-lg bg-blue-300 p-4">
                        <p class="line-clamp-3">

                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima illo consequuntur, qui enim
                            nihil reiciendis debitis magnam dolores, quos vel cum voluptate. Error facere sed eos,
                            facilis
                            iusto ex nihil iste enim vero consequatur quasi! Ducimus molestias sint placeat accusantium
                            quam? Modi corrupti reiciendis aut quos dicta libero, sed ut.
                        </p>
                    </div>
                @endfor
            </div>

            {{-- Bagian input comment --}}
            <div class="sticky bottom-0 w-full">
                <textarea id="comments" class="w-full resize-none rounded-lg border border-gray-400 pt-6 shadow-lg" rows="2"></textarea>
                <label for="comments"
                    class="absolute inset-0 left-2 top-2 text-sm font-bold text-gray-400">Comments</label>
            </div>
        </div>
    </div>

</body>

</html>
