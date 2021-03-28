@if ($errors->any())
    <div class="flex">
        <div role="alert" class="mx-auto">
            <div class="bg-imdb-red-dark text-white font-bold rounded-t px-4 py-2">
                Invalid input
            </div>
            <div class="border border-t-0 border-imdb-red-dark rounded-b bg-imdb-red px-4 py-3 text-white font-bold">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
@if (session('message'))
    <div class="flex">
        <div class="mx-auto bg-imdb-blue border-t-2 border-b-2 border-imdb-blue-dark text-white px-4 py-3" role="alert">
            <p class="font-bold">{{ session('message') }}</p>
        </div>
    </div>
@endif
