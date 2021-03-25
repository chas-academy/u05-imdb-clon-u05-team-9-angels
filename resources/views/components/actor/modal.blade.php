<div class="form-container">
    <!-- EDIT MODAL -->

    <button class="modal-open btn-purpure">
        Edit {{ $title }}
    </button>

    <!--Modal-->
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-imdb-black w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div
                class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Edit {{ $title }}</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <form method="POST" action="/actors/{{ $id }}">
                    @method('PUT')
                    @csrf

                    <label for="name">Name:</label><br />
                    <input type="text" class="bg-imdb-card" id="name" name="name" value="{{ old('name') ?? $name }}"
                        required><br />

                    <label for="description">Description:</label><br />
                    <textarea class="bg-imdb-card" id="description" name="description" cols="30" rows="5"
                        required>{{ old('description') ?? $description }}</textarea>

                    <div class="flex gap-x-3 justify-end pt-2">
                        <button type="submit" class="btn-green">
                            Submit changes
                        </button>
                        <button class="modal-close btn-red">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- END OF EDIT-MODAL --}}
</div>
