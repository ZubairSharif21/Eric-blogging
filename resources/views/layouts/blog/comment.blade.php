<section id="commentSection" class="not-format mt-5">
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-lg font-bold text-gray-900 dark:text-white lg:text-2xl">Discussion
            ({{ $singlePost->comments->count() }})</h2>
    </div>
    <livewire:post.comments :post="$singlePost" />


    @foreach ($comments as $comment)
        <div class="pb-6">
            <article id="comment{{ $comment->id }}" x-data="{ comment: {{ $comment }}, open: false, reply: false, highlighted: false, editMode: false }"
                x-on:highlighted-toggled-{{ $comment->id }}.window="highlighted = $event.detail.highlighted; setTimeout(()=> {
                highlighted = false;
                }, 3000)"
                x-bind:class="{
                    'bg-gray-200': highlighted,
                }"
                class="{{ $loop->iteration > 1 ? 'border-t border-t-gray-200 border border-transparent dark:border-gray-700' : '' }} scroll-mt-24 rounded-lg p-6 text-base transition-[background_500ms_ease] dark:bg-gray-900">
                <footer x-show="!editMode" class="relative mb-2 flex items-center justify-between">

                    <div class="flex flex-col items-start sm:flex-row sm:items-center">
                        <p class="mr-3 inline-flex items-center text-sm font-semibold text-gray-900 dark:text-white">
                            <img class="mr-2 h-6 w-6 rounded-full"
                                src="{{ $comment->user->details ? ($comment->user->details->profile_pic ? (env('APP_ENV') === 'production' ? env('AWS_URL') . $comment->user->details->profile_pic : asset('images/' . $comment->user->details->profile_pic)) : asset('img/user_photo.png')) : asset('img/user_photo.png') }}"
                                alt="{{ $comment->user->name }}">{{ $comment->user->name }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                datetime="{{ $comment->updated_at->format('Y-m-d') }}"
                                title="{{ $comment->updated_at->format('F jS, Y') }}">{{ $comment->updated_at->format('M. j, Y') }}</time>
                            @if ($comment->created_at != $comment->updated_at)
                                <span class="ml-1 text-sm text-gray-600 dark:text-gray-400 sm:ml-2">(edited)</span>
                            @endif
                        </p>
                    </div>
                    <button x-show="!editMode" id="dropdownComment{{ $comment->id }}Button" @click="open = !open"
                        class="inline-flex items-center rounded-lg bg-white p-2 text-center text-sm font-medium text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-50 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        type="button">
                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 16 3">
                            <path
                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                        </svg>
                        <span class="sr-only">Comment settings</span>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownComment{{ $comment->id }}" x-show="open" @click.away="open = false" x-cloak
                        class="absolute right-0 top-1/2 z-10 w-36 divide-y divide-gray-100 rounded bg-white shadow dark:divide-gray-600 dark:bg-gray-700">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownMenuIconHorizontalButton">
                            @can('edit', $comment)
                                <li>
                                    <a x-on:click.prevent="editMode = true"
                                        class="block px-4 py-2 hover:cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a x-on:click.prevent="window.dispatchEvent(new CustomEvent('show-modal', { detail: { commentData: comment } }))"
                                        class="block px-4 py-2 hover:cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                </li>
                            @else
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                </li>
                            @endcan

                        </ul>
                    </div>
                </footer>
                <p x-show="!editMode">{{ $comment->content }}</p>
                <div x-show="!editMode" class="mt-4 flex items-center space-x-4">
                    <button type="button" x-on:click="reply = !reply"
                        class="flex items-center text-sm font-medium text-gray-500 hover:underline dark:text-gray-400">
                        <svg class="mr-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z" />
                        </svg>
                        Reply
                    </button>
                </div>
                @auth
                    <div class="mt-5">
                        <livewire:post.replies :comment="$comment" :post="$singlePost" />
                    </div>
                @endauth
            </article>

            @foreach ($replies as $c)
                @if ($c->parent_id == $comment->id)
                    <article id="comment{{ $c->id }}" x-data="{ c: {{ $c }}, open: false, reply: false, highlighted: false, editMode: false }"
                        x-on:highlighted-toggled-{{ $c->id }}.window="highlighted = $event.detail.highlighted; setTimeout(()=> {
                            highlighted = false;
                            }, 3000)"
                        x-bind:class="{
                            'bg-gray-200': highlighted,
                        }"
                        class="ml-6 scroll-mt-24 rounded-lg p-6 text-base dark:bg-gray-900 lg:ml-12">
                        <div class="mb-2 flex items-center gap-2 text-sm"><svg
                                class="h-4 w-4 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M14.5 8H11V6.1c0-.9-.9-1.4-1.5-.9L4.4 9.7a1.2 1.2 0 0 0 0 1.8l5 4.4c.7.6 1.6 0 1.6-.8v-2h2a3 3 0 0 1 3 3V19a5.6 5.6 0 0 0-1.5-11Z" />
                            </svg> Reply to
                            <a href="#comment{{ $c->mention_id }}"
                                x-on:click="$dispatch('highlighted-toggled-{{ $c->mention_id }}', { highlighted: true });">
                                {{ $users->where('id', $oriComments->where('id', $c->mention_id)->value('user_id'))->value('name') }}</a>
                        </div>
                        <footer x-show="!editMode" class="relative mb-2 flex items-center justify-between">
                            <div class="flex flex-col items-start sm:flex-row sm:items-center">
                                <p
                                    class="mr-3 inline-flex items-center text-sm font-semibold text-gray-900 dark:text-white">
                                    <img class="mr-2 h-6 w-6 rounded-full"
                                        src="{{ $c->user->details ? ($c->user->details->profile_pic ? (env('APP_ENV') === 'production' ? env('AWS_URL') . $c->user->details->profile_pic : asset('images/' . $c->user->details->profile_pic)) : asset('img/user_photo.png')) : asset('img/user_photo.png') }}"
                                        alt="{{ $c->user->name }}">{{ $c->user->name }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                        datetime="{{ $c->updated_at->format('Y-m-d') }}"
                                        title="{{ $c->updated_at->format('F jS, Y') }}">{{ $c->updated_at->format('M. j, Y') }}</time>
                                    @if ($c->created_at != $c->updated_at)
                                        <span
                                            class="ml-1 text-sm text-gray-600 dark:text-gray-400 sm:ml-2">(edited)</span>
                                    @endif
                                </p>
                            </div>
                            <button x-show="!editMode" id="dropdownComment{{ $c->id }}Button"
                                @click="open = !open"
                                class="inline-flex items-center rounded-lg bg-white p-2 text-center text-sm font-medium text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-50 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                                <span class="sr-only">Comment settings</span>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownComment{{ $c->id }}" x-show="open" @click.away="open = false"
                                x-cloak
                                class="absolute right-0 top-1/2 z-10 w-36 divide-y divide-gray-100 rounded bg-white shadow dark:divide-gray-600 dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconHorizontalButton">
                                    @can('edit', $c)
                                        <li>
                                            <a x-on:click.prevent="editMode = true"
                                                class="block px-4 py-2 hover:cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                        </li>
                                        <li>
                                            <a x-on:click.prevent="window.dispatchEvent(new CustomEvent('show-modal', { detail: { commentData: c } }))"
                                                class="block px-4 py-2 hover:cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                        </li>
                                    @endcan
                                </ul>
                            </div>
                        </footer>
                        <p x-show="!editMode">{{ $c->content }}</p>
                        <div x-show="!editMode" class="mt-4 flex items-center space-x-4">
                            <button type="button" @click="reply = !reply"
                                class="flex items-center text-sm font-medium text-gray-500 hover:underline dark:text-gray-400">
                                <svg class="mr-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z" />
                                </svg>
                                Reply
                            </button>
                        </div>
                        @auth
                            <div class="mt-5">
                                <livewire:post.extra-replies :comment="$comment" :c="$c" :post="$singlePost" />
                            </div>
                        @endauth
                    </article>
                @endif
            @endforeach
        </div>
    @endforeach

    <div x-data="{
        showModal: false,
        commentData: { post: '' },
        allComments: [],
        fetchComments: function() {
            fetch('/api/comments')
                .then(response => response.json())
                .then(data => {
                    this.allComments = data;
                });
        },
        getComments: function(commentId) {
            let result = [];
    
            const findNestedComments = (parentId) => {
                let nestedComments = this.allComments.filter(comment => comment.mention_id === parentId && comment.id !== parentId);
                nestedComments.forEach(nestedComment => {
                    result.push(nestedComment);
                    findNestedComments(nestedComment.id); // Recursively call to find nested comments
                });
            };
    
            findNestedComments(commentId);
    
            return result;
        }
    }" x-show="showModal" x-init="fetchComments()"
        x-on:show-modal.window="showModal = true; commentData = $event.detail.commentData" x-cloak>
        <div
            class="fixed inset-0 z-50 flex h-screen max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black bg-opacity-50">
            <div class="relative max-h-full w-full max-w-md p-4">
                <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                    <button type="button" @click="showModal = false"
                        class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 text-center md:p-5">
                        <svg class="mx-auto mb-4 h-12 w-12 text-gray-400 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <div>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want
                                to
                                delete
                                this comment?</h3>
                            <p class="mb-3 rounded bg-red-400 p-2 text-red-700">Replies to this comment, will also
                                deleted. This action <b>cannot be undone.</b></p>
                            <div
                                class="mb-7 grid w-full grid-cols-[max-content_max-content_1fr] grid-rows-[repeat(3,max-content)] text-left font-sans text-slate-500">
                                <p class="px-5">ID</p>
                                <p>:</p>
                                <p class="indent-2" x-text="commentData.id"></p>
                                <p class="px-5">Contain Replies</p>
                                <p>:</p>
                                <p class="indent-2" x-text="getComments(commentData.id).length"></p>
                                <p class="px-5">Comment Content</p>
                                <p>:</p>
                                <p class="line-clamp-1 indent-2" x-text="commentData.content"></p>
                            </div>
                            <form x-bind:action="'/dashboard/comments/' + commentData.id" method="post"
                                class="inline">
                                @method('delete')
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                    Yes, I'm sure
                                </button>
                            </form>
                            <button type="button" @click="showModal = false"
                                class="ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">No,
                                cancel</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
