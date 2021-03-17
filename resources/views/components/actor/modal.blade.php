<div class="form-container mx-14">
    <!-- EDIT MODAL -->

    <button
        class="modal-open mb-5 border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
        Edit {{ $title }}
    </button>

    <!--Modal-->
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

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
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
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
                    <input type="text" id="name" name="name" value="{{ old('name') ?? $name }}" required><br />

                    <label for="age">Age:</label><br>
                    <input type="number" id="age" name="age" value="{{ old('age') ?? $age }}" required><br />

                    <label for="description">Description:</label><br />
                    <textarea id="description" name="description" cols="30" rows="5"
                        required>{{ old('description') ?? $description }}</textarea>

                    <div class="flex justify-end pt-2">
                        <button type="submit"
                            class="mb-5 border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                            Submit changes
                        </button>
                        <button
                            class="modal-close mb-5 ml-3 border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- END OF EDIT-MODAL --}}
</div>
