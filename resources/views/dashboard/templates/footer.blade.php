{{-- <script type="module">
    const btn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('default-sidebar');
    const textMenu = document.querySelectorAll(`[id="textMenu"]`);
    const contentSection = document.getElementById('contentSection');

    btn.addEventListener('click', function() {
        sidebar.classList.toggle('w-64');
        sidebar.classList.toggle('w-16');
        textMenu.forEach(txtMenu => {
            txtMenu.classList.toggle('w-0');
            txtMenu.classList.toggle('overflow-hidden');
            //   console.log(element.textContent);
        });
        contentSection.classList.toggle('sm:ml-64');
        contentSection.classList.toggle('sm:ml-16');
    });
</script> --}}
@if (Request::is('dashboard/posts/create') || Request::is('dashboard/posts/*/edit'))
    <script type="module">
        const fp = flatpickr("#published_at", {
            altInput: true,
            enableTime: true,
            enableSeconds: true,
            time_24hr: true,
            dateFormat: "Y-m-d H:i:S",
            onChange: function(selectedDates, dateStr, instance) {
                this.value = dateStr;
            },
        });

        const btnClear = document.getElementById('btnClear');

        btnClear.addEventListener('click', function() {
            fp.clear();
        })
    </script>
    @if (Request::is('dashboard/posts/create'))
        <script>
            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');

            title.addEventListener('change', function() {
                fetch('/dashboard/posts/checkSlug?title=' + title.value)
                    .then(response => response.json())
                    .then(data => slug.value = data.slug)

            });
        </script>
        <script>
            let postData;
            const jsonData = `{!! old('content', '') !!}`;
            try {
                postData = JSON.parse(atob(jsonData));
            } catch (e) {
                // Handle the case when the JSON data is not in the correct format
                postData = {}; // Assign an empty object as the default value for postData
            }
        </script>
        <script type="module" src="/js/editor-new.js"></script>
    @endif

    @if (Request::is('dashboard/posts/*/edit'))
        <script>
            let postData;
            const jsonData = `{!! old('content', base64_encode($post->content)) !!}`;
            try {
                postData = JSON.parse(atob(jsonData));
            } catch (e) {
                // Handle the case when the JSON data is not in the correct format
                postData = {}; // Assign an empty object as the default value for postData
            }
        </script>
        <script type="module" src="/js/editor.js"></script>
    @endif


@endif

@if (Request::is('dashboard/categories/create') || Request::is('dashboard/categories/*/edit'))
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/categories/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)

        });
    </script>
@endif

@if (Request::is('dashboard/tags/create') || Request::is('dashboard/tags/*/edit'))
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/tags/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)

        });
    </script>
@endif

@if (!Request::is('dashboard/users/*'))
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endif
@livewireScripts
</body>

</html>
